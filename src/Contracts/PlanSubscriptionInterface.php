<?php

namespace Mrlinnth\Lasinkyay\Contracts;

interface PlanSubscriptionInterface
{
    public function subscribable();
    public function plan();
    public function usage();
    public function getStatusAttribute();
    public function isActive();
    public function onTrial();
    public function isCanceled();
    public function isEnded();
    public function isPending();
    public function renew();
    public function approve();
    public function cancel($immediately);
    public function changePlan($plan);
}
