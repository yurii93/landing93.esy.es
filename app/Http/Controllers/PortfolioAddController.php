<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Intervention\Image\Facades\Image;
use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioAddController extends Controller
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
                'filter' => 'required|max:255',
                'images' => 'required'
            ],$messages);

            if($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }



            if($request->hasFile('images')) {

                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img', $input['images']);

                $image = Image::make(public_path().'/assets/img/'.$input['images'])->resize(276,205);

                $image->save(public_path().'/assets/img/'.$input['images'],100);

            }

            $page = new Portfolio();

            $page->fill($input);

            if($page->save()) {

                return redirect('admin')->with('status', 'Работа добавлена');

            }
        }

        if(view()->exists('admin.portfolios_add')) {

            $data = [
                'title' => 'Новая работа'
            ];

            return view('admin.portfolios_add', $data);

        }

        abort(404);

    }
}
