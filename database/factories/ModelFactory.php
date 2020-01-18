<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Robot::class, function (Faker\Generator $faker) {
  
    $tab = ["published", "unpublished", "draft"];
	$rand = array_rand($tab, 1);  // sort un indice du tableau de manière aléatoire

  $alea =  mt_rand()/ mt_getrandmax();
    return [
        
        // champ name de la table robots
            'name' => $faker->name,
            'category_id' => rand(1,3),
            'user_id' => mt_rand(1,10),
            'description' => $faker->text(rand(5,20)),
            'published_at' => $faker->dateTime(),
            'status' => $tab[$rand],
     		'captor' => ($alea < 0.33)? 'motor' : ($alea < 0.66 )? 'detector' : 'lcd'
     

       
    ];
});


