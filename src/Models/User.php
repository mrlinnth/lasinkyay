<?php

namespace Mrlinnth\Lasinkyay\Models;

use Illuminate\Database\Eloquent\Model;
use Mrlinnth\Lasinkyay\Contracts\PlanSubscriberInterface;
use Mrlinnth\Lasinkyay\Traits\PlanSubscriber;

class User extends Model implements PlanSubscriberInterface
{
    use PlanSubscriber;
}
