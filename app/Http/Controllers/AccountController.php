<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class AccountController extends Controller
{
    //
    public function settings()
    {
        return view('account.index');
    }

    public function simpan(Request $request)
    {
        $user = User::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Validation error', 'alert' => 'warning']);
        }

        $check_old_password = Hash::check($request->old_password, $user->password);
        if ($check_old_password) {
            if ($request->hasFile('ttd')) {
                $file = $request->file('ttd');
                $filenameWithExt = $request->file('ttd')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('ttd')->getClientOriginalExtension();
                $filenameSimpan = $filename.'_'.time().'.'.$extension;
                $path = Storage::disk('public')->put($filenameSimpan,file_get_contents($file));
                $ttd_lama = $user->ttd;
                Storage::delete("public/".$ttd_lama);
            } else {
                $filenameSimpan = $user->ttd;
            }
            $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->ttd = $filenameSimpan;
            $user->save();
            return redirect()->back()->with(['message' => 'Success', 'alert' => 'success']);
        } else {
            return redirect()->back()->with(['message' => 'Password lama tidak sama', 'alert' => 'danger']);
        }

    }
}
