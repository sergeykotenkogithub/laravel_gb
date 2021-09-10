<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Arr;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $category = ['sport', 'cinema', 'culture', 'society', 'religion'];

    protected function getNews(): array
    {
        $faker = Factory::create('ru_RU');
        $data = [];
//        $category = ['sport', 'cinema', 'culture', 'society', 'religion'];

        $countNumber = mt_rand(5, 15);

        for ($i = 0; $i < $countNumber; $i++) {
//            $rand_keys = array_rand($category, 1);
            $random = Arr::random($this->category);
//            $random = Arr::random($category);
            $data[] = [
                'id' => $i + 1,
//                'category' => $category[$rand_keys],
                'category' => $random,
                'title' => $faker->jobTitle(),
                'description' => $faker->sentence(3),
                'author' => $faker->name,
                'created_at' => now()
            ];
         }
        return $data;
    }

    protected function getNum($category)
    {
        $aa = $this->getNews();
        $bbb = [];

        foreach ($aa as $g) {

            if($g['category'] == $category) {
                $bbb[] = $g;
            }
        }

        return $bbb;
    }

}
