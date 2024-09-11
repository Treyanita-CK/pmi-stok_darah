<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use App\Models\Calender;

class CalenderController extends Controller
{
    public function __construct()
    {   
        $this->middleware('admin');
    }

    public function getAll()
    {
        $calender = Calender::all();
        return view('/admin/calender', compact('calender'));
    }
    
    public function create()
    {
        return view('admin.calender_create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date'        => 'nullable',
            'time'        => 'nullable',
            'location'    => 'nullable',
            'description' => 'nullable',
        ]);

        $calender               = new Calender();
        $calender->date         = $request->date;
        $calender->time         = $request->time;
        $calender->location     = $request->location;
        $calender->description  = $request->description;
        $calender->save();
    
        return redirect()->route('calender.get')->with('success_store', 'Donor schedule added successfully.');
    }
    
    public function edit($id)
    {
        $calender = Calender::findOrFail($id);
        return view('admin.calender_edit', compact('calender'));
    }
    
    public function update(Request $request, $id)
    {
        $calender = Calender::findOrFail($id);
    
        $validatedData = $request->validate([
            'date'        => 'nullable',
            'time'        => 'nullable',
            'location'    => 'nullable',
            'description' => 'nullable',
        ]);
        
        if ($calender->update($validatedData)) {
            return redirect()->route('calender.get')->with('success_edit', 'Schedule edited successfully');
        } else {
            return redirect()->route('calender.get')->with('error', 'Failed to edit schedule');
        }
    }
    
    public function destroy($id)
    {
        $calender = Calender::findOrFail($id);
        $calender->delete();
    
        return redirect()->route('calender.get')
            ->with('success', 'Schedule deleted successfuly.');
    }
}
