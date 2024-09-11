<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class HubungiController extends Controller
{
    public function hubungi()
    {
        $message = Message::all();
        return view('admin.hubungikami_view', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('hubungi.admin')->with('success_delete', 'Message data deleted successfully');
    }
}
