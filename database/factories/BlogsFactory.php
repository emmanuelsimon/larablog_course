<?php

use Faker\Generator as Faker;

$factory->define(App\Blog::class, function (Faker $faker) {
    $title=$faker->sentence(10);
    $body=$faker->sentence(100);
    $slug=str_slug($title);
    $metaTitle=str_limit($title, 55);
    $metaDescription=str_limit($body, 155);
    return [
        'slug'=>$slug,
        'meta_title'=>$metaTitle,
        'meta_description'=>$metaDescription,
        'title'=>$title,
        'body'=>$body,
    ];
});
