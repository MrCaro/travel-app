<?php

namespace App\Http\Controllers;

class PagesViewController extends Controller
{
    public function home() {
        return view('welcome');
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
}
