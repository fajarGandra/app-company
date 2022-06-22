<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Article\StoreRequest;
use App\Http\Requests\Backend\Article\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\{Category, Article, Tag};
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::get();
        return view('admin.article.index', compact("article"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();

        return view('admin.article.create-or-update', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = Auth::guard('admin')->user();

        DB::beginTransaction();
        try {
            
            if (isset($request['cover']))
            {
                $cover = Storage::disk('public')->putFile('cover', $request->file('cover'));
            }

            $validated = $request->validated();
            $validated['cover'] = $cover;
            $validated['admin_id'] = $user->id;
            
            $create = Article::create($validated);

            DB::commit();
            return redirect(route('admin.article.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Article berhasil ditambahkan")
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
    public function edit($id){
        $article = Article::find($id);
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.article.create-or-update', compact("article", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $slug){
        $user = Auth::guard('admin')->user();
        $article = Article::whereSlug($slug)->firstOrFail();
            
        DB::beginTransaction();
        try {
            
            if (isset($request['cover']))
            {
                $cover = Storage::disk('public')->putFile('cover', $request->file('cover'));
            }
            else
            {
                $cover = str_replace('/storage/', '', $article->cover);
            }

            $validated = $request->validated();
            $validated['cover'] = $cover;
            
            $update = $article->update($validated);

            DB::commit();
            return redirect(route('admin.article.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Article berhasil diupdate")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', " gagal diedit")
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
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('article.index')->with('success','Data moved to trash');
    }

    public function trash(){
        $article = Article::onlyTrashed()->get();

        return view('article.trash', compact('article'));
    }

    public function restore($id) {
        $article = Article::withTrashed()->findOrFail($id);

        if ($article->trashed()) {
            $article->restore();
            return redirect()->back()->with('success','Data successfully restored');
        }else {
            return redirect()->back()->with('error','Data is not in trash');
        }
    }
    
    public function deletePermanent($id){
        
        $article = Article::withTrashed()->findOrFail($id);

        if (!$article->trashed()) {
        
            return redirect()->back()->with('error','Data is not in trash');
        
        }else {
        
            $article->tags()->detach();
            

            if($article->cover && file_exists(storage_path('app/public/' . $article->cover))){
                \Storage::delete('public/'. $article->cover);
            }

        $article->forceDelete();

        return redirect()->back()->with('success', 'Data deleted successfully');
        }
    }
}
