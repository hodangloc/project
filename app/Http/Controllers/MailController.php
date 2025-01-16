<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;

class MailController extends Controller
{
    public function index()
    {   
        if (session()->has('cart')) {
            $product = session()->get('cart');
            $product = json_encode($product, true);
        }

        $data = [
            'subject' => 'Cambo Tutorial Mail',
            'body' => $product
        ];
        try{
            Mail::to('loc3031998@gmail.com')->send(new MailNotify($data)); 
            return response()->json(['Great check your mail box']);
        }
        catch(Exception $th){
            return response()->json(['sorry']);
        }
    }
}
