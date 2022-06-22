<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Clients\UpdateRequest;
use App\Http\Requests\Backend\Clients\StoreRequest;
use App\Models\Client;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create-or-update');
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
                $image = Storage::disk('public')->putFile('clients', $request->file('image'));
            }
            
            $validated = $request->validated();
            $validated['image'] = $image;
            
            $create = Client::create($validated);

            DB::commit();
            return redirect(route('admin.clients.index'))
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
        $clients = Client::find($id);
        return view('admin.clients.create-or-update', compact("clients"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $find = Client::findOrFail($id);
        DB::beginTransaction();
        try {
            
            if (isset($request['image']))
            {
                $image = Storage::disk('public')->putFile('clients', $request->file('image'));
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
            return redirect(route('admin.clients.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Client berhasil di update")
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
        $current = Client::findOrFail($id);
        DB::beginTransaction();
        try {
            $delete = $current->delete();
            // if($delete){
            //     Storage::disk('public')->delete($currentCarosal->image);
            // }

            DB::commit();
            return redirect(route('admin.clients.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Client berhasil di hapus")
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
