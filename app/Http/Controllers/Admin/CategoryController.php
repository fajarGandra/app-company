<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\StoreRequest;
use App\Http\Requests\Backend\Category\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::get();
        return view('admin.category.index', compact("category"));
    }

    public function create(){
        return view('admin.category.create-or-update');
    }

    public function store(StoreRequest $request){

        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $create = Category::create($validated);

            DB::commit();
            return redirect(route('admin.category.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Category {$validated['name']} berhasil ditambahkan")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', "Data gagal ditambahkan")
            ;
        }
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.create-or-update', compact("category"));
    }
    
    public function update(UpdateRequest $request, int $id){
        $category = Category::findOrFail($id);

        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $create = $category->update($validated);

            DB::commit();
            return redirect(route('admin.category.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Category {$validated['name']} berhasil di update")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', "Data gagal diedit")
            ;
        }
    }
}
