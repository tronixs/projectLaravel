<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    
    use NewsCatigoryTrait;

    public function index()
    {
        return \view('catigory_news.index', [
            'catigory_news' => $this->getNewsCatigory(),
        ]);
    }

    public function show(int $id)
    {
        return $this->getNewsCatigory($id);
    }
}
