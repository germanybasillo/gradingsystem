<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{   
    public function index(): View{
        if (Auth::check()) {
        return view("page.index");
    }
}
}