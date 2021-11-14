<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ["coupon_title","coupon_type", "coupon_code",	"discount_type", "calculated_on",
        "discount_value", "require_value", "applie_to", "collection", "data_start", "time_start", "date_end",
        "time_end", "created_at", "updated_at"];
    public $table = "coupons";

}
