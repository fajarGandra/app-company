<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Roles\StoreRequest;
use App\Http\Requests\Backend\Roles\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    //
    public function index(){
        $role = Role::get();
        return view('admin.role.index', compact("role"));
    }
    //
    public function create(){
        $permission = Permission::MenuPermission()
                ->get();

        $getMenu = [];
        $id = '';
        foreach ($permission as $key => $object) {
            $permission[$key]->childs = Permission::MenuChilds($object->id)
            ->get();
        }
        return view('admin.role.create-or-update', compact("permission"));
    }
    //
    public function store(StoreRequest $request){
        DB::beginTransaction();
        try {

            $validated = $request->validated();
            
            $create = Role::create($validated);

            DB::commit();
            return redirect(route('admin.roles.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Role berhasil ditambahkan")
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
        $role = Role::find($id);
        $permission = Permission::all();
        $roleHasPermission = $role->permissions->pluck('id')->toArray();
        $list = Permission::MenuPermission()
            ->where("permissions.parent_menu", 0)
            ->where("m.parent_id", 0)
            ->get();

        $getMenu = [];
        $id = '';

        foreach ($list as $key => $object) {
            $list[$key]->childs_parent = Permission::MenuChilds($object->id)->get();
            if($role->hasPermissionTo($object->name)){
                $list[$key]->flag = 1;
            }else{
                $list[$key]->flag = 0;
            }
            $subMenu = Permission::SubMenuPermission()->where('m.parent_id', $object->menu_id)->get();

            foreach($subMenu as $key1 => $sub){
                $subMenu[$key1]->childs = Permission::MenuChilds($sub->id)->get();
            }
            $list[$key]->subMenu = $subMenu;
        }
        // return response()->json($list);
        return view('admin.role.create-or-update', compact("role", "permission", "list"));
    }

    //
    public function update(UpdateRequest $request, $id){
        $role = Role::whereId($id)->firstOrFail();

        DB::beginTransaction();
        try {

            $validated = $request->validated();
            
            $update = $role->update($validated);

            DB::commit();
            return redirect(route('admin.roles.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Role berhasil di update")
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
        $role = Role::whereId($id)->firstOrFail();
        
        DB::beginTransaction();
        try {
            
            $role = $role->delete();

            DB::commit();
            return redirect(route('admin.roles.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Role berhasil di hapus")
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
    
    public function storePermission(Request $request, Role $role){
        // return response()->json($request);
        $role->syncPermissions($request->permission);

        return redirect()->back()->withInput()
        ->with('alert.status', '00')
        ->with('alert.message', "Permission berhasil di tambahkan");
    }

    public function revokePermission(Role $role,Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('alert.status', '00')->with('alert.message', "Permission berhasil di hapus");
        }

        return redirect()->back()->withInput()
        ->with('alert.status', '99')
        ->with('alert.message', "Gagal hapus permission");
    }
}
