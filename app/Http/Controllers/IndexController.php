<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function __invoke(Request $request): View
    {
        //$news =
        return \view('home.index');
    }
}