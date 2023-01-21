<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    

    public function index()
    {
        return "Show news list";
    }

    public function show(int $id)
    {
        return "Show news #ID " . $id;
    }
}
