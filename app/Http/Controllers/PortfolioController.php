<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioController extends Controller
{
    public function execute()
    {

        if(view()->exists('admin.portfolios')) {

            $portfolios = Portfolio::all();

            $portfolios = [
                'title' => 'Портфолио',
                'portfolios' => $portfolios
            ];

            return view('admin.portfolios', $portfolios);
        }

        abort(404);

    }
}
