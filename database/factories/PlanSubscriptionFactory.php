<?php

use Mrlinnth\Lasinkyay\Models\Plan;
use Mrlinnth\Lasinkyay\Models\PlanSubscription;
use Mrlinnth\Lasinkyay\Tests\Models\User;

$factory->define(PlanSubscription::class, function (Faker\Generator $faker) {
    return [
        'subscribable_id' => factory(User::class)->create()->id,
        'subscribable_type' => User::class,
        'plan_id' => factory(Plan::class)->create()->id,
        'name' => $faker->word,
    ];
});
