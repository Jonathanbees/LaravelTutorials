<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Jonathan";
    return view('home.about')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
})->name("home.about");
Route::get('/contact', function () {
    $data1 = "Contact - Online Store";
    $data2 = "Contact";
    $email = "email@email.com";
    $address = "Cra 51 # 1231";
    $number = "629481231";

    return view('home.contact')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("email", $email)
        ->with("address", $address)
        ->with("number", $number);

})->name("home.contact");
