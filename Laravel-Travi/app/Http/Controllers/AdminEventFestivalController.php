<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventFestival;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class AdminEventFestivalController extends Controller
{
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
            $events = EventFestival::get();
            return view('eventfestival.data_event_festival', ['event' => $events]);
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    public function create()
    {
        if($this->checkLogin()){
            return view('eventfestival.add_event_festival');
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    public function store(Request $request)
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
                $destinationPath = public_path().'/Gambar/eventfestival';
                $waktu = time();
                $file->move($destinationPath,$waktu . $fileName);
                $validatedData['gambar'] = $waktu . $fileName;
            }

            $validatedData['slug'] = SlugService::createSlug(EventFestival::class, 'slug', $request->judul);
            $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200);

            EventFestival::create($validatedData);
            return redirect('/admin/event-festival')->with('success', 'Data berhasil disimpan');
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    public function show($id)
    {
        if($this->checkLogin()){
            return view('eventfestival.view_event_festival', ['event' => EventFestival::find($id)]);
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    public function edit($id)
    {
        if($this->checkLogin()){
            return view('eventfestival.edit_event_festival', ['event' => EventFestival::find($id)]);
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

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
                $destinationPath = public_path().'/Gambar/eventfestival';
                $waktu = time();
                $file->move($destinationPath,$waktu . $fileName);
                $validatedData['gambar'] = $waktu . $fileName;
            }
    
            $validatedData['slug'] = SlugService::createSlug(EventFestival::class, 'slug', $request->judul);
            $validatedData['excerpt'] = Str::limit(strip_tags($request->deskripsi), 200);
    
            EventFestival::where('id', $id)
                    ->update($validatedData);
            return redirect('/admin/event-festival')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }

    public function destroy($id)
    {
        if($this->checkLogin()){
            EventFestival::destroy($id);
            return redirect('/admin/event-festival')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/admin/login')->with('failed', 'Silahkan Login');
        }
    }
}
