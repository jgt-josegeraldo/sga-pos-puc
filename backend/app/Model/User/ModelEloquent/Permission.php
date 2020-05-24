<?php

namespace App\Model\User\ModelEloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $dates = [
        'deleted_at', 'created_at', 'updated_at'
    ];
    
    protected $fillable = [
        'id',
        'permission_level_id',
        'user_id',
        'module_id'
    ];
    
    protected $table = 'permission';

    public function module()
    {
        return $this->belongsTo('App\Model\User\ModelEloquent\Module');
    }

    public function permissionLevel()
    {
        return $this->belongsTo('App\Model\User\ModelEloquent\PermissionLevel');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User\ModelEloquent\User');
    }
}
