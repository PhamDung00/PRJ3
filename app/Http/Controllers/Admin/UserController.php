<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user;
    protected $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;

        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = $this->user->latest('id')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all()->groupBy('group_name');
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $dataCreate = $request->all();
        // $dataCreate['password'] = Hash::make($request->password);
        // verify that email and phone number are in use
        $user = User::where("email", $request->email)->first();
        if($user) return to_route('users.create')->with(['error' =>'email in use']);
        $user = User::where("phone", $request->phone)->first();
        if($user) return to_route('users.create')->with(['error' =>'phone in use']);
        User::create(array_merge($request->all(),["img"=>self::uploadImage($request,"users"),
        "password"=>Hash::make($request->password)]));
        return to_route('users.index')->with(['message' =>'create success']);
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
        $user = $this->user->findOrFail($id);
        $roles = Role::all()->groupBy("group");
        return view('admin.user.edit', compact('user', "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        if (!$user) {
            return to_route('users.edit', $id)->with(['error' => 'User not found']);
        }
        $dataUpdate = $request->all();

        // If a new password is provided, hash it
        if ($request->password) {
            $dataUpdate['password'] = Hash::make($request->password);
        } else {
            // Remove password from the data if not provided
            unset($dataUpdate['password']);
        }

        // If a new image is uploaded, handle the image upload
        if ($request->hasFile('img')) {
            $dataUpdate['img'] = self::uploadImage($request, "users");
        } else {
            // Keep the old image if no new image is provided
            unset($dataUpdate['img']);
        }

        // Update the user
        $user->update($dataUpdate);

        return to_route('users.index')->with(['message' => 'Update success']);
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
        $user = User::find($id);
        if (!$user) {
            return to_route('users.index')->with(['error' => 'User not found']);
        }

        // Delete the user image if it exists
        if ($user->img) {
            $imagePath = public_path($user->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the user
        $user->delete();

        return to_route('users.index')->with(['message' => 'User deleted successfully']);
    }
}
