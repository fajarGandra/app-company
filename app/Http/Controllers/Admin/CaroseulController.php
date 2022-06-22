<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Caroseul\UpdateRequest;
use App\Http\Requests\Backend\Caroseul\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Caroseul;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CaroseulController extends Controller
{
    //
    public function index(){
        $caroseul = Caroseul::all();
        return view('admin.caroseul.index', compact('caroseul'));
    }

    public function create(){
        return view('admin.caroseul.create-or-update');
    }

    public function edit($id){
        $caroseul = Caroseul::find($id);
        return view('admin.caroseul.create-or-update', compact("caroseul"));
    }

    public function store(StoreRequest $request){
        DB::beginTransaction();
        try {
            if (isset($request['image']))
            {
                $image = Storage::disk('public')->putFile('caroseul', $request->file('image'));
            }
            $validated = $request->validated();
            $validated['image'] = $image;

            $create = Caroseul::create($validated);

            DB::commit();
            return redirect(route('admin.caroseul.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Caroseul berhasil di tambahkan")
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

    public function update(UpdateRequest $request, $id){
        $caroseul = Caroseul::find($id);

        if (isset($request['image']))
        {
            $image = Storage::disk('public')->putFile('caroseul', $request->file('image'));
            Storage::disk('public')->delete($caroseul->image);
        }
        else
        {
            $image = str_replace('/storage/', '', $caroseul->image);
        }

        $validated = $request->validated();
        $validated['image'] = $image;

        DB::beginTransaction();
        try {
            $update = $caroseul->update($validated);

            DB::commit();
            return redirect(route('admin.caroseul.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Caroseul berhasil di update")
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

    public function destroy(int $id)
    {
        $currentCarosal = Caroseul::findOrFail($id);
        DB::beginTransaction();
        try {
            $delete = $currentCarosal->delete();
            // if($delete){
            //     Storage::disk('public')->delete($currentCarosal->image);
            // }

            DB::commit();
            return redirect(route('admin.caroseul.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Caroseul berhasil di hapus")
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
