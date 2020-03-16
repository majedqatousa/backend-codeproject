<?php
use Faker\Generator as Faker;
use App\Modle\Lesson;

$factory->define(App\Modle\Step::class,function(Faker $faker){
    return[
        'product_id' => function(){
    		return Product::all()->random();	
    	},
        'customer' => $faker->name,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5)
    ];
    
});