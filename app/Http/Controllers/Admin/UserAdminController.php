<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\StoreRequest;
use App\Http\Requests\Backend\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Log;

class UserAdminController extends Controller
{
    public function index(){
        $admins = Admin::whereNotIn('name', ['admin'])->get();
        return view('admin.admin-user.index', compact("admins"));
    }
    //
    public function create(){
        $title = 'Tambah';
        return view('admin.admin-user.create-or-update', compact("title"));
    }
    //
    public function store(StoreRequest $request){
        DB::beginTransaction();
        try {

            $validated = $request->validated();
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            DB::commit();
            return redirect(route('admin.admin-user.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "User berhasil ditambahkan")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " Gagal menambahkan data")
            ;
        }
    }
    //
    public function show($id){
        $admins = Admin::FindOrFail($id);
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.admin-user.show', compact("admins", "role", "permission"));
    }
    
    public function edit($id){
        $title = 'Edit';
        $users = User::find($id);
        return view('admin.admin-user.create-or-update', compact("users", "title"));
    }
    //
    public function update(UpdateRequest $request, $id){
        $admin = Admin::whereId($id)->firstOrFail();

        DB::beginTransaction();
        try {

            $validated = $request->validated();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if(isset($request->password)){
                $data['password'] = Hash::make($request->password);
            }

            $update = $admin->update($data);

            DB::commit();
            return redirect(route('admin.admin-user.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "User berhasil di update")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " Gagal update data")
            ;
        }
    }

    public function destroy(Admin $admin){
        if($admin->hasRole('admin')){
            return back()->with('alert.status', '99')->with('alert.message', "Roles admin tidak bisa di hapus");
        }
        $admin->delete();
        return redirect()->back()->withInput()
        ->with('alert.status', '00')
        ->with('alert.message', "User berhasil di hapus");
    }
    
    public function assignRole(Request $request, Admin $admin){
        if($admin->hasRole($request->roles)){
            return back()->with('alert.status', '99')->with('alert.message', "Roles telah tersedia");
        }
        $admin->assignRole($request->roles);

        return redirect()->back()->withInput()
        ->with('alert.status', '00')
        ->with('alert.message', "Roles berhasil di tambahkan");
    }

    public function deleteRole(Admin $admin, Role $role){
        if($admin->hasRole($role)){
            $admin->removeRole($role);
            return back()->with('alert.status', '00')->with('alert.message', "Roles berhasil di hapus");
        }

        return redirect()->back()->withInput()
        ->with('alert.status', '99')
        ->with('alert.message', "Gagal hapus roles");
    }
}