<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\EventFestival;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class AdminEventFestivalController extends Controller
{
    public function index(){
        return response()->json(
            EventFestival::all()
        );
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
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
            $destinationPath = public_path().'/Gambar/eventfestival';
            $waktu = time();
            $file->move($destinationPath,$waktu . $fileName);
            $validatedData['gambar'] = $waktu . $fileName;
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200, '...');
        $validatedData['slug']  = SlugService::createSlug(EventFestival::class, 'slug', $request->judul);
        EventFestival::create($validatedData);
        return response()->json($validatedData, 201);
    }

    public function destroy($id)
    {
        EventFestival::destroy($id);
        return response()->json('data berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'deskripsi' => 'required',
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
            $destinationPath = public_path().'/Gambar/eventfestival';
            $waktu = time();
            $file->move($destinationPath,$waktu . $fileName);
            $validatedData['gambar'] = $waktu . $fileName;
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200, '...');
        $validatedData['slug']  = SlugService::createSlug(EventFestival::class, 'slug', $request->judul);
        EventFestival::where('id', $id)->update($validatedData);
        return response()->json([
            'message' => 'Data Berhasil Diubah',
            'new_data' => $validatedData 
        ], 200);
    }
}
