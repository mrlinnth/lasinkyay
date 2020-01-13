<?php

namespace Mrlinnth\Lasinkyay\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class Plan extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "trial_period_days" => $this->trial_period_days,
            "interval" => $this->interval,
            "interval_count" => $this->interval_count,
            "sort_order" => $this->sort_order,
        ];
    }
}
