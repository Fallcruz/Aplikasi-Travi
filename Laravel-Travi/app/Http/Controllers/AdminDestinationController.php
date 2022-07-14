<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class AdminDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkLogin(){
        if(!session()->has('islogin')){
            return false;
        }else{
            return true;
        }
    }
    public function index()
    {
        if($this->checkLogin()){
            $destinations = Destination::get();
            return view('destination.data_destination', ['destination' => $destinations]);
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->checkLogin()){
            return view('destination.add_destination');
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->checkLogin()) {
            $validatedData = $request->validate([
                'judul' => 'required|max:255',
                'lokasi' => 'required|max:255',
                'deskripsi' => 'required',
                'gambar' => 'image|file|max:1024'
            ]);

            $waktu = "";
            $validatedData['gambar'] = "";
            if($file = $request->hasFile('gambar')) {
                $file = $request->file('gambar') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/Gambar/destinations';
                $waktu = time();
                $file->move($destinationPath,$waktu . $fileName);
                $validatedData['gambar'] = $waktu . $fileName;
            }

            $validatedData['slug'] = SlugService::createSlug(Destination::class, 'slug', $request->judul);
            $validatedData['excerpt'] = Str::limit($request->deskripsi, 200);

            Destination::create($validatedData);
            return redirect('/admin/destination')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->checkLogin()){
            return view('destination.view_destination', ['destination' => Destination::find($id)]);
        } else {
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->checkLogin()){
            return view('destination.edit_destination', [
                'destination' => Destination::find($id)
            ]);
        } else {
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkLogin()){
            $validatedData = $request->validate([
                'judul' => 'required|max:255',
                'lokasi' => 'required|max:255',
                'deskripsi' => 'required',
                'gambar' => 'image|file|max:1024'
            ]);

            $waktu = "";
            $validatedData['gambar'] = "";
            if($file = $request->hasFile('gambar')) {
                $file = $request->file('gambar') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/Gambar/destinations';
                $waktu = time();
                $file->move($destinationPath,$waktu . $fileName);
                $validatedData['gambar'] = $waktu . $fileName;
            }

            $validatedData['slug'] = SlugService::createSlug(Destination::class, 'slug', $request->judul);
            $validatedData['excerpt'] = Str::limit($request->deskripsi, 200);

            Destination::where('id', $id)
                    ->update($validatedData);
            return redirect('/admin/destination')->with('success', 'Data berhasil dirubah');
        } else {
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->checkLogin()){
            Destination::destroy($id);
            return redirect('/admin/destination')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }
}
