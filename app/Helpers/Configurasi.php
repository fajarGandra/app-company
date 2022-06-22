<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getMenu() {

    if (!Schema::hasTable('menus')) {
        return false;
    }

    if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();
        // $user = $user->roles->pluck('id');

        // $user->getAllPermissions();
        $role = $user->getAllPermissions();
        $rolesRoot = $role->where('parent_menu', 0)->pluck('id');
        $rolesChilds = $role->where('parent_menu', "!=", 0)->pluck('id');
        // return response()->json($rolesChilds);

        $models = Menu::root()
                // ->with("permission")
                ->whereIn('p.id', $rolesRoot)
                ->orderBy('menus.order_no', 'ASC')
                ->get();


        $getMenu = [];
        $id = '';
        foreach ($models as $key => $object) {
            $models[$key]->childs = Menu::childs($object->id)
            // ->whereIn('r.id', $user)
            ->whereIn('p.id', $rolesChilds)
            ->orderBy('menus.order_no', 'ASC')
            ->get();
        }
    }else{
        $models = array();
    }

    return $models;
}
