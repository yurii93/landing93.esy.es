<?php

namespace App\Http\Controllers;

use App\Client;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;
use DB;
use Mail;

use App\Http\Requests;

class IndexController extends Controller
{

    public function execute(Request $request)
    {

        if($request->isMethod('post')) {

            $messages = [
                'required' => "Поле :attribute обязательно к заполнению",
                'email' => "Поле :attribute должно соответствовать email адресу"
            ];

            $this->validate($request,[
               'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required'
            ], $messages);

            $data = $request->all();

            $result = Mail::send('site.email',['data' => $data], function ($message) use ($data){

                $mail_admin = env('MAIL_ADMIN');

                $message->from($data['email'], $data['name']);
                $message->to($mail_admin, 'Mr.Admin')->subject('Question');
            });

            if($result) {
                return redirect('admin')->with('status', 'Email is send');
            }

        }
        $pages = Page::all();

        $portfolios = Portfolio::all();

        $peoples = People::take(4)->get();

        $services = Service::all();

        $tags = DB::table('portfolios')->distinct()->lists('filter');

        $clients = Client::all();
        
        $menu = array();

        foreach ($pages as $page) {

            $item = array('title' => $page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }

        $item = array('title' => 'Services', 'alias' => 'service');
        array_push($menu, $item);

        $item = array('title' => 'Portfolio', 'alias' => 'portfolio');
        array_push($menu, $item);

        $item = array('title' => 'Clients', 'alias' => 'client');
        array_push($menu, $item);

        $item = array('title' => 'Team', 'alias' => 'team');
        array_push($menu, $item);

        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);


        return view('site.index', ['menu' => $menu,
                                   'pages' => $pages,
                                   'portfolios' => $portfolios,
                                   'services' => $services,
                                   'team' => $peoples,
                                   'clients' => $clients,
                                   'tags' => $tags
                                  ]);
    }
}
