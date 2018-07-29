<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    /**
     * Parse as Carbon date
     */
    protected $dates = ['date_used'];

    protected  $fillable = ['code', 'special_offer_id', 'recipient_id', 'date_used'];

    public function recipient(){
        return $this->belongsTo(Recipient::class);
    }

    public function special_offer(){
        return $this->belongsTo(SpecialOffer::class);
    }
}
