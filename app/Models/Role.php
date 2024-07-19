<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'group',
        'guard_name',
    ] ;
    public function permisions(): HasManyThrough
    {
        return $this->hasManyThrough(Permission::class, RoleHasPermissions::class,'role_id','id',"id","permission_id");
    }
}
