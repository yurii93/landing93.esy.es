<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::match(['get', 'post'],'/',['uses' => 'IndexController@execute', 'as' => 'home']);

Route::get('/pages/{alias}',['uses' => 'PageController@execute', 'as' => 'page']);


Route::get('/login',['uses' => 'AuthController@get_login', 'as' => 'get_login']);

Route::post('/login',['uses' => 'AuthController@get_login', 'as' => 'post_login']);

Route::get('/logout',['uses' => 'AuthController@logout', 'as' => 'logout']);



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    //admin
    Route::get('/',function() {

        if(view()->exists('admin.index')) {

            $data = ['title' => 'Панель администратора'];

            return view('admin.index', $data);

        }

    })->name('admin');

    //admin/pages
    Route::group(['prefix'=>'pages'],function() {

        ///admin/pages
        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);

        //admin/pages/add
        Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
        //admin/edit/2
        Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);

    });

    Route::group(['prefix'=>'portfolios'],function() {


        Route::get('/',['uses'=>'PortfolioController@execute','as'=>'portfolio']);


        Route::match(['get','post'],'/add',['uses'=>'PortfolioAddController@execute','as'=>'portfolioAdd']);

        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);

    });

    Route::group(['prefix'=>'services'],function() {


        Route::get('/',['uses'=>'ServiceController@execute','as'=>'services']);


        Route::match(['get','post'],'/add',['uses'=>'ServiceAddController@execute','as'=>'serviceAdd']);

        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServiceEditController@execute','as'=>'serviceEdit']);

    });

    Route::group(['prefix'=>'peoples'],function() {


        Route::get('/',['uses'=>'PeopleController@execute','as'=>'peoples']);
        
        Route::match(['get','post'],'/add',['uses'=>'PeopleAddController@execute','as'=>'peopleAdd']);

        Route::match(['get','post','delete'],'/edit/{people}',['uses'=>'PeopleEditController@execute','as'=>'peopleEdit']);

    });

    Route::group(['prefix'=>'clients'],function() {


        Route::get('/',['uses'=>'ClientController@execute','as'=>'clients']);

        Route::match(['get','post'],'/add',['uses'=>'ClientAddController@execute','as'=>'clientAdd']);

        Route::match(['get','post','delete'],'/edit/{client}',['uses'=>'ClientEditController@execute','as'=>'clientEdit']);

    });

});

