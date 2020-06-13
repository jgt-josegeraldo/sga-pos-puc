<?php

namespace App\Model\Asset\ModelEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mantenance extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
    
    protected $fillable = [
        'id',
        'note',
        'maintenance_status_id',
        'responsible_id',
        'maintenance_date',
        'asset_id'
    ];
    
    protected $table = 'maintenance';

    public function asset()
    {
        return $this->belongsTo('App\Model\Asset\ModelEloquent\Asset');
    }

    public function responsible()
    {
        return $this->belongsTo('App\Model\User\ModelEloquent\User');
    }

    public function maintenanceStatus()
    {
        return $this->belongsTo('App\Model\Asset\ModelEloquent\MaintenanceStatus');
    }
}
