<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventFestival;

class EventFestivalController extends Controller
{
    public function index()
    {
        $event = EventFestival::get();
        return view('eventfestival.event_festival', ['list' => $event]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('eventfestival.event_festival_detail', ['event' => EventFestival::find($id)]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
