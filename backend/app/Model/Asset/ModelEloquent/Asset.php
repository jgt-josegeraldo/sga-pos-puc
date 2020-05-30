<?php

namespace App\Model\Asset\ModelEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at', 'acquisition_date'
    ];
    
    protected $fillable = [
        'id',
        'code',
        'name',
        'description',
        'category_id',
        'asset_status_id',
        'acquisition_date'
    ];
    
    protected $table = 'asset';

    public function category()
    {
        return $this->belongsTo('App\Model\Asset\ModelEloquent\Category');
    }

    public function assetStatus()
    {
        return $this->belongsTo('App\Model\Asset\ModelEloquent\AssetStatus');
    }
}
