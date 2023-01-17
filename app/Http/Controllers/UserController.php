<?php

namespace App\Http\Controllers;

use App\role;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $role = Role::where('id','!=', '1')->get();
        return view('users.index', ['users' => $user, 'roles' => $role]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "Gagal validasi"], 404);
        }

        if ($request->hasFile('ttd')) {
            $file = $request->file('ttd');
            $filenameWithExt = $request->file('ttd')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ttd')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = Storage::disk('public')->put($filenameSimpan,file_get_contents($file));
        } else {
            $filenameSimpan = null;
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'ttd' => $filenameSimpan
            ]);
            $response = [
                'message' => 'User created',
                'data' => $user
            ];

            return response()->json(['success' => 'Success', 'response' => $response], 200);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Failed ' . $e->errorInfo
            ];
            return response()->json(['error' => 'Error msg', 'response' => $response], 404);
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $user = User::findOrFail($id);

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

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = $request->role_id;
            $user->ttd = $filenameSimpan;
            $user->save();
            $response = [
                'message' => 'User Updated',
                'data' => $user
            ];

            return response()->json(['success' => 'Success', 'response' => $response], 200);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Failed ' . $e->errorInfo
            ];
            return response()->json(['error' => 'Error msg', 'response' => $response], 404);
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $ttd_lama = $user->ttd;
        Storage::delete("public/".$ttd_lama);
        $user->delete();
        $response = [
            'message' => 'Deleted ' . $user->name
        ];
        return redirect()->back()->with(['response' => $response]);
    }

    public function activated(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $response = [
            'response' => $user->name . ' activated'
        ];
        return redirect()->back()->with(['response' => $response]);
    }

    public function role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;

        $response = [
            'response' => $user->name . ' Updated Role'
        ];
        return redirect()->back()->with(['response' => $response]);
    }

    public function status($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 'aktif') {
            $status = "nonaktif";
        } else {
            $status = "aktif";
        }

        $user->status = $status;
        $user->save();
        return redirect()->back()->with(['message' => $user->name . ' status updated']);
    }
}
