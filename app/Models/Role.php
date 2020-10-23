<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Auth;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasOne('App\Models\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    public function createByArr($arr)
    {
        $role = $this->first();
        $id = $this->create($arr)->id;

        if(!$role){
            $user = User::find(Auth::id())->update(['role_id' => $id]);
        }

        return true;
    }

}
