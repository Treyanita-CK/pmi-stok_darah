<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      // get all
      public function index()
      {
          $users = User::all();
          return response()->json(['data' => $users]);
      }
  
     // get by id
      public function show($id)
      {
        $users = User::findOrFail($id);
         return response()->json(['data' => $users]);
      }
      
      
      // update
      public function edit(Request $request, $id)
      {
          $users = User::whereId($id)->first();
          return view('edit')->with('users',$users);
  
          return response()->json(['message' => 'Data matched!','users'=>$users],200);
      }
      public function update(Request $request, $id)
      {
        $users   = User::findOrFail($id);
        $users->name      = $request->name;
        $users->username  = $request->username;
        $users->email     = $request->email;
        $users->save();

        return response()->json(['message' => 'Data updated successfully','users'=>$users],201);
      }
  
      // delete
      public function destroy($id)
      {
        //find data
        $users = User::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data deleted successfully','blood_stocks' => $blood_stocks],200);
      }
}
  

