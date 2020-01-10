<?php

namespace Mrlinnth\Lasinkyay\Events;

use Illuminate\Queue\SerializesModels;
use Mrlinnth\Lasinkyay\Models\PlanSubscription;

class SubscriptionCreated
{
    use SerializesModels;

    /**
     * @var \Laraplans\Models\PlanSubscription
     */
    public $subscription;

    /**
     * Create a new event instance.
     *
     * @param  \Laraplans\Models\PlanSubscription  $subscription
     * @return void
     */
    public function __construct(PlanSubscription $subscription)
    {
        $this->subscription = $subscription;
    }
}
