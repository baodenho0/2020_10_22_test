<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function getPermisions($roleId)
    {
        return $this->select(
            'permissions.id',
            'permissions.name',
            'permissions.name',
            'role_id'
        )
            ->leftJoin('permission_role', function ($q) use ($roleId) {
                $q->on('permissions.id', 'permission_role.permission_id')
                    ->where('role_id', $roleId);
            })
            ->orderBy('permissions.id')
            ->get();
    }
}
