<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Backend functions or not
    |--------------------------------------------------------------------------
    |
    | Option: true, false.
    | Default: true.
    |
     */

    'backend' => true,

    /*
    |--------------------------------------------------------------------------
    | Number of items to show
    |--------------------------------------------------------------------------
    |
    | Option: integer
    | Default: 20.
    |
     */

    'items_per_page' => 20,

    /*
    |--------------------------------------------------------------------------
    | Positive Words
    |--------------------------------------------------------------------------
    |
    | These words indicates "true" and are used to check if a particular plan
    | feature is enabled.
    |
     */
    'positive_words' => [
        'Y',
        'YES',
        'TRUE',
        'UNLIMITED',
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | If you want to use your own models you will want to update the following
    | array to make sure Laraplans use them.
    |
     */
    'models' => [
        'plan' => 'Mrlinnth\Lasinkyay\Models\Plan',
        'plan_feature' => 'Mrlinnth\Lasinkyay\Models\PlanFeature',
        'plan_subscription' => 'Mrlinnth\Lasinkyay\Models\PlanSubscription',
        'plan_subscription_usage' => 'Mrlinnth\Lasinkyay\Models\PlanSubscriptionUsage',
        'user' => 'Mrlinnth\Lasinkyay\Models\User',
    ],

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | The heart of this package. Here you will specify all features available
    | for your plans.
    |
     */
    'features' => [
        'SAMPLE_SIMPLE_FEATURE',
        'SAMPLE_DEFINED_FEATURE' => [
            'resettable_interval' => 'month',
            'resettable_count' => 2,
        ],
    ],
];
