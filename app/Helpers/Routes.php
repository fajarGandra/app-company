<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function routes() {
    if (!Schema::hasTable('routes')) {
        return false;
    }
    $models = DB::table('routes')->leftJoin('permission_has_routes', 'permission_has_routes.route_id', '=', 'routes.id')
                    ->leftJoin('permissions', 'permission_has_routes.permission_id', '=', 'permissions.id')
                    ->orderBy('routes.id')
                    ->select('routes.*', 'permissions.name as permission_name')->get()->toArray();
    $routes = [];
    $id = '';
    foreach ($models as $object) {
        $model = (array) $object;
        if ($id != $model['id']) {
            $id = $model['id'];
            if ($model['permission_name'] != '') {
                $model['permission'][] = $model['permission_name'];
            }
            $routes[$model['id']] = $model;
        } else {
            if ($model['permission_name'] != '') {
                $routes[$model['id']]['permission'][] = $model['permission_name'];
            }
        }
    }
    return $routes;
}
