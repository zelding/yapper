<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$now = new \DateTime();

$factory->define(App\Entity\BlogPost::class, function (Faker $faker) use ($now) {
    return [
        "title"      => $faker->sentence,
        "summary"    => $faker->sentences(3, true),
        "content"    => $faker->paragraphs(2, true),
        "status"     => 1,
        "user_id"    => mt_rand(1, 2),
        "created_at" => $now->format('Y-m-d H:i:s'),
        "updated_at" => null,
        "deleted_at" => null
    ];
});

// add some random comments from users
$factory->afterMaking(App\Entity\BlogPost::class, function (App\Entity\BlogPost $post, Faker $faker) {

    $post->save();
    $post->refresh(); // if is this a hack then I'm sorry

    $maxUserId = \App\Entity\User::max('id');

    $comment = new \App\Entity\Comment();


    // at this point the userIds should be continous
    $comment->user_id = mt_rand(1, $maxUserId);
    $comment->content = $faker->sentence(8, true);
    $comment->post_id = $post->getAttribute('_id');
    $comment->save();
});