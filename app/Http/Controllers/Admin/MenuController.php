<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Permission;
use DB;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request){
        $query = Menu::get();
        if ($request->wantsJson()) {
            $model = Datatables::of($query)
                ->make(true)->getData(true);
            $response = responseDatatableSuccess(__('messages.read-success'), $model);
            return response()->json($response, 200);
        } else {
            // return view("pages.routes.index");
            $getId = Menu::get();
            return view('admin.menu.index', compact("getId"));
        }
    }

    function list() {
        $MenuTree = json_decode(json_encode(Menu::orderBy("order_no")->get()), true);
        $model = $this->buildTree($MenuTree);
        return view("admin.menu.list", ["model" => $model]);
    }
    
    private function buildTree(array $MenuTree, $parentId = 0)
    {
        $branch = array();

        foreach ($MenuTree as $menu) {
            if ($menu['parent_id'] == $parentId && !is_null($menu['parent_id'])) {
                $children = $this->buildTree($MenuTree, $menu['id']);
                if ($children) {
                    $menu['children'] = $children;
                }
                $branch[] = $menu;
            }
        }

        return $branch;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent)
    {
        $menu = Menu::get();
        $permission = Permission::all();
        return view("admin.menu.create", compact("menu","permission", "parent"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            "url" => "required",
            "permissions" => "required",
        ]);
        $data = $request->only(['name', 'description', 'url', 'order_no', 'icon', 'parent_id']);
        
        if ($data["parent_id"] == "0") {
            $data["order_no"] = $this->getMaxOrderParent() + 1;
            $parent_menu = 0;
        } else {
            $permission_parent = Menu::find($request->parent_id);
            $data["order_no"] = $this->getMaxOrderChild($data["parent_id"]) + 1;
            $parent_menu = $permission_parent->permission_id;
        }

        DB::beginTransaction();
        try {
            $create_permission = Permission::create([
                'name' => $request->permissions,
                'parent_menu' => $parent_menu,
                'guard_name' => 'admin'
            ]);
            
            $data['permission_id'] = $create_permission->id;

            $model = Menu::create($data);
            DB::commit();
            return redirect(route('admin.menu.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Menu berhasil ditambahkan");
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " Gagal menambahkan data")
            ;
        }
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
        $menus = Menu::Detail()->where("menus.id", $id)->first();
        $menu = Menu::get();
        $permission = Permission::all();
        // return response()->json($menus);
        return view("admin.menu.detail", compact("menus", "menu", "permission"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required',
            "url" => "required",
            "permissions" => "required",
        ]);
        $data = $request->only(['name', 'description', 'permission_id', 'url', 'order_no', 'icon', 'parent_id']);

        if ($data["parent_id"] == "0") {
            $data["order_no"] = $this->getMaxOrderParent() + 1;
            $parent_menu = 0;
        } else {
            $permission_parent = Menu::find($request->parent_id);
            $data["order_no"] = $this->getMaxOrderChild($data["parent_id"]) + 1;
            $parent_menu = $permission_parent->permission_id;
        }

        DB::beginTransaction();
        try {
            $permission = Permission::find($menu->permission_id);

            $get_permission = $permission->update([
                'name' => $request->permissions,
                'parent_menu' => $parent_menu
            ]);

            $model = $menu->update($data);
            DB::commit();
            return redirect(route('admin.menu.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Menu berhasil diupdate");
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " Gagal update data")
            ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::whereId($id)->firstOrFail();
        DB::beginTransaction();
        try {
            $menu->delete();
            DB::commit();
            $response = responseSuccess(__('messages.delete-success'), $menu);
            return response()->json($response, 200);
        } catch (\Exception $ex) {
            DB::rollback();
            $response = responseFail(__('messages.delete-fail'), $ex->getMessage());
            return response()->json($response, 500);
        }
    }
    
    private function getMaxOrderParent()
    {
        $max = Menu::where("parent_id", "0")->max("order_no");
        return $max;
    }

    private function getMaxOrderChild($parent_id)
    {
        $max = Menu::where("parent_id", $parent_id)->max("order_no");
        return $max;
    }
    
    public function updateSequence(Request $request)
    {
        $payload = $request->get("sequence");
        DB::beginTransaction();
        try {
            $this->saveSequence($payload);
            DB::commit();
            $response = responseSuccess('Menu berhasil diupdate', []);
            return response()->json($response, 201);
        } catch (\Exception $ex) {
            DB::rollback();
            $response = responseFail(__('messages.create-fail'), $ex->getMessage());
            return response()->json($response, 500);
        }

    }

    private function saveSequence($sequence, $parent_id = 0)
    {
        foreach ($sequence as $key => $value) {
            Menu::where("id", $value["id"])->update(["order_no" => $key + 1, "parent_id" => $parent_id]);
            if (isset($value['children'])) {
                $this->saveSequence($value['children'], $value['id']);
            }
        }
    }
}
