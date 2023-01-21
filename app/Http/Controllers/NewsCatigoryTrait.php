<?php

declare(strict_types=1);

namespace App\Http\Controllers;


Trait NewsCatigoryTrait
{

    public function getNewsCatigory(int $id = null): array
    {
        $catigory_news = [];
        $quantityNewsCatigory = 10;

        if ($id === null) {
            for($i=1; $i < $quantityNewsCatigory; $i++) {
                $catigory_news[$i] = [
                    'id' => $i,
                    'title' => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format('d-m-y h:i'),
                ];
            }

            return $catigory_news;
        }

        return [
            'id' => $id,
            'title' => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format('d-m-y h:i'),
        ];
    }
}