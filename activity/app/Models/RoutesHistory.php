<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class RoutesHistory extends Model
{
    public $timestamps = false;

    public static function boot(){
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    use HasFactory;

    protected $table = 'routes_history';
    protected $guarded = [];


}
