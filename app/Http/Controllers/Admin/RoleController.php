<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Permisson;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::latest('id')->paginate(3);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permisson::all()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function createPermission($request,$role){
        foreach($role->permisions as $permission){
            DB::table('role_has_permissions')->where('permission_id', $permission->id)->where("role_id",$role->id)->delete();
        }
        // $role->permissions()->sync($dataUpdate['permission_ids']);
        foreach(Permission::all() as $permission){
            if(isset($request["permission_ids_".$permission->id]))
                DB::table("role_has_permissions")->insert([
                    "permission_id"=>$permission->id,
                    "role_id"=>$role->id
                ]);
        }
    }
    public function store(Request $request)
    {
        //
        $dataCreate = $request->all();
        $dataCreate['guard_name'] = 'web';
        $role = Role::create($dataCreate);
        self::createPermission($request, $role);
        return to_route('roles.index')->with(['message' =>'create success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permisson::all()->groupBy('group');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        //
        $role = Role::findOrFail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        self::createPermission($request, $role);
        return to_route('roles.index')->with(['message'=> 'edit success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Role::destroy($id);
        return to_route('roles.index')->with(['message'=> 'delete success']);
    }
}
