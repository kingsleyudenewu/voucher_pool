<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherCode extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'code' => $this->code,
            'special_offer_id' => $this->email,
            'recipient_id' => $this->recipient_id,
            'date_used' => $this->date_used,
        ];
    }
}
