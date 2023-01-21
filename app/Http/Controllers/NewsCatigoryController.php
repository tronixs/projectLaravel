<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsCatigoryController extends Controller
{
    use NewsCatigoryTrait;
    public function index()
    {
        return \view('catigory.index', [
            'catigory' => $this->getNewsCatigory(),
        ]);
    }

    public function show(int $id)
    {
        return $this->getNewsCatigory($id);
    }
}