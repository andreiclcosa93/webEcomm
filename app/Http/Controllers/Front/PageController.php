<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //afisare pagina home
    public function homePage()
    {
        return view('front.home')
        ->with('showMenu', true );
    }

    public function shopPage()
    {
        return view('front.shop');
    }

    public function productPage()
    {
        return view('front.product');
    }

    public function contactPage()
    {
        return view('front.contact');
    }

    public function cartPage()
    {
        return view('front.cart');
    }

    public function checkPage()
    {
        return view('front.check');
    }
}
