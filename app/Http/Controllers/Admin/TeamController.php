<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Teams\UpdateRequest;
use App\Http\Requests\Backend\Teams\StoreRequest;
use App\Models\Team;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teams.create-or-update');
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
            
            if (isset($request['image']))
            {
                $image = Storage::disk('public')->putFile('teams', $request->file('image'));
            }
            
            $validated = $request->validated();
            $validated['image'] = $image;
            
            $create = Team::create($validated);

            DB::commit();
            return redirect(route('admin.teams.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Client berhasil di tambahkan")
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
        $teams = Team::find($id);
        return view('admin.teams.create-or-update', compact("teams"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {$find = Team::findOrFail($id);
        DB::beginTransaction();
        try {
            
            if (isset($request['image']))
            {
                $image = Storage::disk('public')->putFile('teams', $request->file('image'));
                Storage::disk('public')->delete($find->image);
        }
            else
            {
                $image = str_replace('/storage/', '', $find->image);
            }
            
            $validated = $request->validated();
            $validated['image'] = $image;
            
            $create = $find->update($validated);

            DB::commit();
            return redirect(route('admin.teams.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Team berhasil di update")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', "Data gagal diupdate")
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
        $current = Team::findOrFail($id);
        DB::beginTransaction();
        try {
            $delete = $current->delete();
            if($delete){
                Storage::disk('public')->delete($current->image);
            }

            DB::commit();
            return redirect(route('admin.teams.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Team berhasil di hapus")
            ;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th);
            return redirect()->back()->withInput()
                ->with('alert.status', '99')
                ->with('alert.message', "Data gagal hapus")
            ;
        }
    }
}
