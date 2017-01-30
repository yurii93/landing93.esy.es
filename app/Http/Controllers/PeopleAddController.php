<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Validator;

use Intervention\Image\Facades\Image;

use App\Http\Requests;


class PeopleAddController extends Controller
{
    public function execute(Request $request)
    {

        if($request->isMethod('post')) {

            $input = $request->except('_token');

            $messages = [
                'required' => "Поле :attribute обязательно к заполнению",
            ];

            $validator = Validator::make($input,[
                'name' => 'required|max:255',
                'text' => 'required|max:500',
                'images' => 'required',
                'position' => 'required'
            ],$messages);

            if($validator->fails()) {
                return redirect()->route('peopleAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

                $image = Image::make(public_path().'/assets/img/'.$input['images'])->resize(293,293);

                $image->save(public_path().'/assets/img/'.$input['images'],100);

            }

            $page = new People();

            $page->fill($input);

            if($page->save()) {

                return redirect('admin')->with('status', 'Сотрудник добавлен');

            }
        }

        if(view()->exists('admin.peoples_add')) {

            $data = [
                'title' => 'Новый сотрудник'
            ];

            return view('admin.peoples_add', $data);

        }

        abort(404);
    }
}
