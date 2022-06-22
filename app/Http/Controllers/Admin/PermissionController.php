<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Permission\StoreRequest;
use App\Http\Requests\Backend\Permission\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    //
    public function index(){
        // $permission = Permission::get();
        
        $permission = Permission::MenuPermission()
            ->where('permissions.parent_menu', 0)
            ->get();

        $getMenu = [];
        $id = '';
        foreach ($permission as $key => $object) {
            $permission[$key]->childs_parent = Permission::MenuChilds($object->id)->get();
            $subMenu = Permission::SubMenuPermission()->where('m.parent_id', $object->menu_id)->get();
            foreach($subMenu as $key1 => $sub){
                $subMenu[$key1]->childs = Permission::MenuChilds($sub->id)->get();
            }
            $permission[$key]->subMenu = $subMenu;
        }
        return view('admin.permission.index', compact("permission"));
    }
    //
    public function create(){
        $permissionMenu = Permission::where('parent_menu', 0)->get();
        return view('admin.permission.create-or-update', compact("permissionMenu"));
    }
    //
    public function store(StoreRequest $request){
        DB::beginTransaction();
        try {

            $validated = $request->validated();
            
            $create = Permission::create($validated);

            DB::commit();
            return redirect(route('admin.permissions.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Permission berhasil ditambahkan")
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
    
    public function edit($id){
        $permission = Permission::find($id);
        $role = Role::all();
        $permissionMenu = Permission::MenuPermission()
            ->where('permissions.id', $id)
            ->get();

        $getMenu = [];
        $id = '';
        foreach ($permissionMenu as $key => $object) {
            $permissionMenu[$key]->childs = Permission::MenuChilds($object->id)
            ->get();
        }
        // return response()->json($permissionMenu[0]->childs);
        return view('admin.permission.create-or-update', compact("permission", "role", "permissionMenu"));
    }
    
    //
    public function update(UpdateRequest $request, $id){
        $permission = Permission::whereId($id)->firstOrFail();

        DB::beginTransaction();
        try {

            $validated = $request->validated();
            
            $update = $permission->update($validated);

            DB::commit();
            return redirect(route('admin.permissions.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Permission berhasil di update")
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

    public function destroy(Request $request, $id){
        $permission = Permission::whereId($id)->firstOrFail();
        
        DB::beginTransaction();
        try {
            
            $permission = $permission->delete();

            DB::commit();
            return redirect(route('admin.permissions.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Permission berhasil di hapus")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " Gagal hapus data")
            ;
        }
    }

    public function givePermissionMenu(Request $request, Permission $permission){

        $this->validate($request, [
            'permission' => 'required|unique:App\Models\Permission,name', 
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'name' => $request->permission,
                'parent_menu' => $permission->id,
                'guard_name' => 'admin'
            ];
            
            $create = Permission::create($data);

            DB::commit();
            return redirect()->back()
                ->with('alert.status', '00')
                ->with('alert.message', "Permission berhasil ditambahkan")
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

    public function removePermission(Request $request, Permission $permission){

        DB::beginTransaction();
        try {
            $permission->delete();

            DB::commit();
            return redirect()->back()
                ->with('alert.status', '00')
                ->with('alert.message', "Permission berhasil dihapus")
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

    // public function giveRole(Request $request, Permission $permission){
    //     if($permission->hasRole($request->roles)){
    //         return back()->with('alert.status', '99')->with('alert.message', "Role telah tersedia");
    //     }
    //     $permission->assignRole($request->roles);

    //     return redirect()->back()->withInput()
    //     ->with('alert.status', '00')
    //     ->with('alert.message', "Role berhasil di tambahkan");
    // }

    // public function removeRole(Permission $permission, Role $role){
    //     if($permission->hasRole($role)){
    //         $permission->removeRole($role);
    //         return back()->with('alert.status', '00')->with('alert.message', "Role berhasil di hapus");
    //     }

    //     return redirect()->back()->withInput()
    //     ->with('alert.status', '99')
    //     ->with('alert.message', "Gagal hapus role");
    // }
}
