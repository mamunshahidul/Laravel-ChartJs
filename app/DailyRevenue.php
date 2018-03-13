<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyRevenue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date',
        'service_id',
        'service_name',
        'operator_id',
        'operator_name',
        'content_provider_id',
        'content_provider_name',
        'activation_count',
        'activation_revenue',
        'renewal_count',
        'renewal_revenue',
        'total_revenue',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $dates = ['deleted_at'];
}
