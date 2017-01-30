<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\People;

use Intervention\Image\Facades\Image;


use App\Http\Requests;

class PeopleEditController extends Controller
{
    public function execute(People $people ,Request $request)
    {

        if ($request->isMethod('delete')) {

            $people->delete();

            return redirect('admin')->with('status', 'Сотрудник удален');
        }

        if($request->isMethod('post')) {


            $input = $request->except('_token');

            $validator = Validator::make($input,[

                'name' => 'required|max:255',
                'text' => 'required|max:500',
                'position' => 'required|max:255',
            ]);

            if($validator->fails()) {

                return redirect()->route('peopleEdit',['people' => $input['id']])->withErrors($validator);

            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $file->move(public_path().'/assets/img', $file->getClientOriginalName());

                $input['images'] = $file->getClientOriginalName();

                $image = Image::make(public_path().'/assets/img/'.$input['images'])->resize(276,205);

                $image->save(public_path().'/assets/img/'.$input['images'],100);

            } else {

                $input['images'] = $input['old_images'];

            }

            unset($input['old_images']);

            $people->fill($input);

            if($people->update()) {

                return redirect('admin')->with('status', 'Сотрудник обновлен');

            }

        }

        $old = $people->toArray();

        if(view()->exists('admin.peoples_edit')) {

            $data = [
                'title' => 'Редактирование сотрудника - '.$old['name'],
                'data' => $old
            ];

            return view('admin.peoples_edit', $data);
        }
    }
}
