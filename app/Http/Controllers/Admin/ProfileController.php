<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Profile\UpdateRequest;
use App\Http\Requests\Backend\Profile\ChangePassRequest;
use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    
    public function index(){
        $users = Auth::guard('admin')->user();
        $user = Admin::find($users->id);
        return view('admin.profile.index', compact("user"));
    }

    public function update(UpdateRequest $request, $id){
        $admin = Admin::find($id);
        
        if (isset($request['profile_photo_path']))
        {
            $image = Storage::disk('public')->putFile('profile', $request->file('profile_photo_path'));
        }
        else
        {
            $image = str_replace('/storage/', '', $admin->profile_photo_path);
        }

        $validated = $request->validated();
        $validated['profile_photo_path'] = $image;

        DB::beginTransaction();
        try {
            $create = $admin->update($validated);

            DB::commit();
            return redirect(route('admin.profile.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Profile {$validated['name']} berhasil di update")
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

    public function changePassword(ChangePassRequest $request, $id){
        
        $admin = Admin::find($id);

        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $validated['password'] = Hash::make($validated['password']);
            $create = $admin->update($validated);

            DB::commit();
            return redirect(route('admin.profile.index'))
                ->with('alert.status', '00')
                ->with('alert.message', "Profile {$admin->name} berhasil di update")
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
