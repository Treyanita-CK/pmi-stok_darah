<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodDonation;
use App\Models\Message;

class UserController extends Controller
{
    public function donorForm()
    {
        return view('user.formdonor');
    }   

    public function donorFormCreate(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'blood_type'    => 'required|string',
            'gender'        => 'required|string',
            'birth_place'   => 'required|string',
            'birth_date'    => 'required|date',
            'address'       => 'required|string',
            'merried_status'=> 'required|string',
            'job'           => 'required|string',
            'phone'         => 'required|string',
        ]);

        $donor = new BloodDonation();
        $donor->name        = $request->name;
        $donor->blood_type  = $request->blood_type;
        $donor->gender      = $request->gender;
        $donor->birth_place = $request->birth_place;
        $donor->birth_date  = $request->birth_date;
        $donor->address     = $request->address;
        $donor->merried_status = $request->merried_status;
        $donor->job         = $request->job;
        $donor->phone       = $request->phone;

        $donor->save();

        return view('welcome')->with('success_form', 'Form Blood Donor saved successfully');
    }
}
