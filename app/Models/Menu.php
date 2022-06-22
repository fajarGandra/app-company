<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ["name", "description", "permission_id", "url", "order_no", "icon", "parent_id", "status", "created_by", "updated_by"];

    public function permission()
    {
        return $this->hasOne("App\Models\Permission", "id", "permission_id")
            ->withDefault(["name" => "no Permission"]);
    }

    public function parent()
    {
        return $this->hasOne("App\Models\Menu", "id", "parent_id")
            ->withDefault(["name" => "No Parent"]);
    }

    public function scopeRoot($query)
    {
        return DB::table("menus")
            ->select(
                "menus.id",
                "menus.description",
                "menus.url",
                "menus.name as text",
                "menus.icon",
                "menus.parent_id",
                "menus.order_no",
                "p.id as permission_id",
                "p.name as permission_name",
                DB::raw("(CASE WHEN count(menus.id) = count(childs.id) THEN true ELSE false END) as children")
            )
            ->leftJoin("permissions as p", "menus.permission_id", "=", "p.id")
            ->leftJoin("menus as childs", "menus.id", "=", "childs.parent_id")
            ->where("menus.parent_id", 0)
            ->orderBy("menus.order_no")
            ->groupBy("menus.id", "menus.description", "menus.url", "menus.name", "menus.icon", "menus.parent_id", "menus.order_no", "p.id","p.name");
    }

    public function scopeChilds($query, $parent)
    {
        return DB::table("menus")
            ->select(
                "menus.id",
                "menus.description",
                "menus.url",
                "menus.name as text",
                "menus.icon",
                "menus.parent_id",
                "menus.order_no",
                "p.id as permission_id",
                "p.name as permission_name",
                DB::raw("(CASE WHEN count(menus.id) = count(childs.id) THEN true ELSE false END) as children")
            )
            ->leftJoin("permissions as p", "menus.permission_id", "=", "p.id")
            ->leftJoin("menus as childs", "menus.id", "=", "childs.parent_id")
            ->where("menus.parent_id", $parent)
            ->groupBy("menus.id", "menus.description", "menus.url", "menus.name", "menus.icon", "menus.parent_id", "menus.order_no", "p.id","p.name");
    }

    public function scopeByUser($query, $user_id)
    {
        return DB::table("model_has_roles")
            ->select("menus.id",
                "menus.name as title",
                "menus.description",
                "menus.url as path",
                "menus.parent_id",
                "menus.order_no",
                "menus.icon",
                "role_has_permissions.permission_id",
                "permissions.name as permission_name"
            )
            ->join("users", "model_has_roles.model_id", "=", "users.id")
            ->join("role_has_permissions", "model_has_roles.role_id", "=", "role_has_permissions.role_id")
            ->join("permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->leftJoin("menus", "menus.permission_id", "=", "role_has_permissions.permission_id")
            ->where("users.id", $user_id)
            ->orderBy("menus.order_no", "ASC");
    }

    public function scopeParentNoPermission($query, array $id)
    {
        return $query->select(
            "menus.id",
            "menus.name as title",
            "menus.description",
            "menus.url as path",
            "menus.parent_id",
            "menus.order_no",
            "menus.icon",
            DB::raw("null as permission_id"),
            DB::raw("null as  permission_name")
        )
            ->whereIn('menus.id', $id)
            ->whereNull('permission_id');
    }

    public function scopeDetail($query)
    {
        return DB::table("menus")->leftJoin('permissions', 'permissions.id', '=', 'menus.permission_id')
            ->select('menus.*', 'permissions.name as permission_name');
    }
}
