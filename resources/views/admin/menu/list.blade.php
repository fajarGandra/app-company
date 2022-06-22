@php
    function render_list($menus) {
        $html = '';
        if(is_array($menus)){
            $html .= '<ol class="dd-list">';
            foreach ($menus as $key => $menu) {
                $html .= '<li class="dd-item" data-id="'.$menu['id'].'">';
                    $html .= '<div class="dd-handle"><i class="' . $menu["icon"] . '"></i> ' . $menu["name"] . '</div>';
                    $html .= '<div class="dd-action pull-right">';
                        if($menu['parent_id'] != '0'){
                        $html .= '<a href="'.route('admin.permissions.edit', $menu['permission_id']).'" class="btn btn-info btn-sm" title="Set Permissions"><i class="bi bi-gear me-1"></i></a> &nbsp;';
                        }
                        $html .= '<button type="button" data-id="'.$menu["id"].'" class="btn btn-primary btn-sm btn-add"  data-toggle="tooltip" data-placement="top" title="Add"><i class="bi bi-plus me-1"></i></button> &nbsp;';
                        $html .= '<button type="button" data-id="'.$menu["id"].'" class="btn btn-warning btn-sm btn-edit" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square me-1"></i></button> &nbsp;';
                        $html .= '<button type="button" data-id="'.$menu["id"].'" class="btn btn-danger btn-sm btn-delete" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash me-1"></i></a>';
                    $html .= '</div>';
                    if(isset($menu["children"])){
                        $html .= render_list($menu["children"]);
                    }
                $html .= "</li>";
            }
            $html .= '</ol>';
        }
        return $html;
    }
    echo render_list($model);
@endphp
