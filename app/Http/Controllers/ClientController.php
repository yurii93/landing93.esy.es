<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use App\Http\Requests;

class ClientController extends Controller
{
    public function execute()
    {

        if(view()->exists('admin.clients')) {

            $clients = Client::all();

            $data = [
                'title' => 'Клиенты',
                'clients' => $clients
            ];

            return view('admin.clients', $data);
        }

        abort(404);
    }
}
