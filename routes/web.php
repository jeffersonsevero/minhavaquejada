<?php

use App\Models\CowboyPass;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {

    $record = CowboyPass::find(1);

    return view('pdf.pass', compact('record'));

});
