<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Validator;

use Intervention\Image\Facades\Image;
use App\Http\Requests;

class ClientAddController extends Controller
{
    public function execute(Request $request)
    {

        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $messages = [
                'required' => "Поле :attribute обязательно к заполнению",
                'mimes' => 'Изображение должно иметь разрешение .png'
            ];

            $validator = Validator::make($input,[
                'name' => 'required|max:255',
                'images' => 'required|mimes:png',
            ],$messages);

            if($validator->fails()) {
                return redirect()->route('clientAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

                $image = Image::make(public_path().'/assets/img/'.$input['images'])->resize(150,30);

                $image->save(public_path().'/assets/img/'.$input['images'],100);

            }

            $client = new Client();

            $client->fill($input);

            if($client->save()) {

                return redirect('admin')->with('status', 'Клиент добавлен');

            }
        }

        if(view()->exists('admin.clients_add')) {

            $data = [
                'title' => 'Новый Клиент'
            ];

            return view('admin.clients_add', $data);

        }

        abort(404);
    }
}
