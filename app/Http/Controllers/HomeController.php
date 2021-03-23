<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Routing\ViewController;

class HomeController extends Controller
{
   public function index(){
   return view('pages.home');

   }
}
