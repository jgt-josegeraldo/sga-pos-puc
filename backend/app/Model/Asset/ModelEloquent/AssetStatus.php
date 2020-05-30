<?php

namespace App\Model\Asset\ModelEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetStatus extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
    
    protected $fillable = [
        'id',
        'description'
    ];
    
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
    
    protected $table = 'asset_status';
}
