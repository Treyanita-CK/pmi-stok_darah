<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MyController extends Controller
{
    public function consumeApi()
    {
        $client = new Client();

        try {
            // ganti URL API dengan URL sesuai routes
            $response = $client->get('http://localhost/api/users');
            $data = $response->getBody()->getContents();
            $users = json_decode($data, true);

            return view('home', ['users' => $users]);
        } catch (\GuzzleHttp\Exception\RequestException $e){
            // pesan error
            return view('error_view');
        }
    }
}
