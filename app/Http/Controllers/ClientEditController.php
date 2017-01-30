<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Validator;

use Intervention\Image\Facades\Image;

use App\Http\Requests;

class ClientEditController extends Controller
{
    public function execute(Client $client ,Request $request)
    {

        if ($request->isMethod('delete')) {

            $client->delete();

            return redirect('admin')->with('status', 'Клиент удален');
        }

        if($request->isMethod('post')) {


            $input = $request->except('_token');

            $validator = Validator::make($input,[

                'name' => 'required|max:255',
            ]);

            if($validator->fails()) {

                return redirect()->route('clientEdit',['people' => $input['id']])->withErrors($validator);

            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $file->move(public_path().'/assets/img', $file->getClientOriginalName());

                $input['images'] = $file->getClientOriginalName();

                $image = Image::make(public_path().'/assets/img/'.$input['images'])->resize(150,30);

                $image->save(public_path().'/assets/img/'.$input['images'],100);

            } else {

                $input['images'] = $input['old_images'];

            }

            unset($input['old_images']);

            $client->fill($input);

            if($client->update()) {

                return redirect('admin')->with('status', 'Клиент обновлен');

            }

        }

        $old = $client->toArray();

        if(view()->exists('admin.clients_edit')) {

            $data = [
                'title' => 'Редактирование клиента - '.$old['name'],
                'data' => $old
            ];

            return view('admin.clients_edit', $data);
        }
    }
}
