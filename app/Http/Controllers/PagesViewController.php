<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class PagesViewController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function destination() {

        if($_GET['destination'] == 'new-york') {
            return view('pages.new-york');
        }

        else if($_GET['destination'] == 'bora-bora'){
            return view('pages.bora-bora');
        }

        else if($_GET['destination'] == 'great-wall'){
            return view('pages.great-wall');
        }

        else if($_GET['destination'] == 'paris'){
            return view('pages.paris');
        }

        else {
            return view('welcome');
        }
    }

    public function book(Request $request) {
        $inputs = $request->all();
        Mail::to('carocarlosj@gmail.com')->send(new ConfirmationEmail());
        return view('pages.confirmation-page')->with($inputs);
    }
}
