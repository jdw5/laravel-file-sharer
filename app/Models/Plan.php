<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    public static function booted()
    {
        static::creating(function (Plan $plan) {
            $plan->slug = Str::slug($plan->name);
        });
    }

    public static function free()
    {
        return static::where('purchasable', false)->first();
    }
}
