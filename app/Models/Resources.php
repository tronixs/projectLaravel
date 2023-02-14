<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Resources extends Model
{
    use HasFactory;

    protected $table = 'resources';

    public function getNews(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}