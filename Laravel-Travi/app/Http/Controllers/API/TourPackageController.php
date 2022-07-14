<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\TourPackage;

use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TourPackageController extends Controller
{
    public function index(){
        return response()->json(
            TourPackage::all()
        );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'nama_paket' => 'required|max:255',
            'email' => 'required|max:255',
            'nomor_telepon' => 'required|max:255',
            'alamat' => 'required',
            'kegiatan_wisata' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required',
            'pelayanan' => 'required',
            'harga' => 'required',
            // max:1024 -> maximal 1mb => harus diberikan |file| sebelum max
            'gambar' => 'image|file|max:1024',
        ]);

        if ($validator->fails()){
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $waktu = "";
        $validatedData['gambar'] = "";
        if($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/Gambar/Tour Package';
            $waktu = time();
            $file->move($destinationPath,$waktu . $fileName);
            $validatedData['gambar'] = $waktu . $fileName;
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200, '...');
        $validatedData['slug']  = SlugService::createSlug(TourPackage::class, 'slug', $request->nama_paket);
        TourPackage::create($validatedData);
        return response()->json($validatedData);
    }
}
