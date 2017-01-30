<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class ServiceEditController extends Controller
{
    public function execute(Service $service ,Request $request)
    {

        if($request->isMethod('delete')) {

            $service->delete();

            return redirect('admin')->with('status', 'Сервис удален');
        }

        if($request->isMethod('post')) {


            $input = $request->except('_token');

            $validator = Validator::make($input,[

                'name' => 'required|max:255',
                'text' => 'required|max:500',
                'icon' => 'required',
            ]);

            if($validator->fails()) {

                return redirect()->route('serviceEdit',['service' => $input['id']])->withErrors($validator);

            }

            $service->fill($input);

            if($service->update()) {

                return redirect('admin')->with('status', 'Сервис обновлен');

            }

        }

        $old = $service->toArray();

        if(view()->exists('admin.services_edit')) {

            $data = [
                'title' => 'Редактирование сервиса - '.$old['name'],
                'data' => $old
            ];

            return view('admin.services_edit', $data);
        }
    }
}
