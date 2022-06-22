<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Tags\StoreRequest;
use App\Http\Requests\Backend\Tags\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use DB;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::get();
        return view('admin.tags.index', compact("tags"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return view('admin.tags.create-or-update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $create = Tag::create($validated);

            DB::commit();
            return redirect(route('admin.tags.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Tags {$validated['name']} berhasil ditambahkan")
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
        $tags = Tag::find($id);
        return view('admin.tags.create-or-update', compact("tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(UpdateRequest $request, int $id){
        $tags = Tag::findOrFail($id);

        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $create = $tags->update($validated);

            DB::commit();
            return redirect(route('admin.tags.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Tags {$validated['name']} berhasil di update")
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
