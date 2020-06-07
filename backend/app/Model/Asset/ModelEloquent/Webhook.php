<?php

namespace App\Model\Asset\ModelEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webhook extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
    
    protected $fillable = [
        'id',
        'link',
        'trigger_id'
    ];
    
    protected $table = 'webhook';

    public function trigger()
    {
        return $this->belongsTo('App\Model\Asset\ModelEloquent\Trigger');
    }
}
