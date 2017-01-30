<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

use App\Http\Requests;

class PeopleController extends Controller
{
    public function execute()
    {

        if(view()->exists('admin.peoples')) {

            $services = People::all();

            $data = [
                'title' => 'Команда',
                'peoples' => $services
            ];

            return view('admin.peoples', $data);
        }

        abort(404);
    }
}
