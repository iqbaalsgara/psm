<?php

namespace App\Http\Controllers;

use App\format_nomor;
use App\perusahaan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    //

    public function index()
    {
        $perusahaan = perusahaan::orderBy('created_at', 'desc')->get();
        $users = User::with('role')->get();
        return view('perusahaan.index', ['perusahaan' => $perusahaan, 'users' => $users]);
    }

    public function show($id)
    {
        $perusahaan = perusahaan::findOrFail($id);
        return response()->json(['success' => 'Perusahaan get by ID', 'data' => $perusahaan], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_perusahaan' => 'required',
            'singkatan' => 'required',
            'no_fax' => 'required',
            'no_telp' => 'required',
            'singkatan' => 'required',
            'alamat_perusahaan' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            //'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'bank' => 'required',
            'aninvoice' => 'required',
            'stempel' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'kop_surat' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validator error'], 404);
        }

        //if ($request->hasFile('logo')) {
        //    $fileLogo = $request->file('logo');
        //    $fileLogoWithExt = $request->file('logo')->getClientOriginalName();
        //    $fileLogoname = pathinfo($fileLogoWithExt, PATHINFO_FILENAME);
        //    $extensionLogo = $request->file('logo')->getClientOriginalExtension();
        //    $fileNameLogoSimpan = $fileLogoname.'_'.time().'.'.$extensionLogo;
        //    $pathLogo = Storage::disk('public')->put($fileNameLogoSimpan,file_get_contents($fileLogo));
        //} else {
        //    return response()->json(['error' => 'Invalid logo'], 404);
        //}

        if ($request->hasFile('stempel')) {
            $filestempel = $request->file('stempel');
            $filestempelWithExt = $request->file('stempel')->getClientOriginalName();
            $filestempelname = pathinfo($filestempelWithExt, PATHINFO_FILENAME);
            $extensionstempel = $request->file('stempel')->getClientOriginalExtension();
            $fileNamestempelSimpan = $filestempelname.'_'.time().'.'.$extensionstempel;
            $pathstempel = Storage::disk('public')->put($fileNamestempelSimpan,file_get_contents($filestempel));
        } else {
            return response()->json(['error' => 'Invalid Stempel'], 404);
        }

        if ($request->hasFile('kop_surat')) {
            $filekop_surat = $request->file('kop_surat');
            $filekop_suratWithExt = $request->file('kop_surat')->getClientOriginalName();
            $filekop_suratname = pathinfo($filekop_suratWithExt, PATHINFO_FILENAME);
            $extensionkop_surat = $request->file('kop_surat')->getClientOriginalExtension();
            $fileNamekop_suratSimpan = $filekop_suratname.'_'.time().'.'.$extensionkop_surat;
            $pathkop_surat = Storage::disk('public')->put($fileNamekop_suratSimpan,file_get_contents($filekop_surat));
        } else {
            $fileNamekop_suratSimpan = null;
        }

        try {
            perusahaan::create([
                'nama_perusahaan' => $request->nama_perusahaan,
                'singkatan' => $request->singkatan,
                'no_telp' => $request->no_telp,
                'no_fax' => $request->no_fax,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                //'logo' => $fileNameLogoSimpan,
                'stempel' => $fileNamestempelSimpan,
                'bank' => $request->bank,
                'aninvoice' => $request->aninvoice,
                'kop_surat' => $fileNamekop_suratSimpan,
                'user_id' => $request->user,
            ]);
            return response()->json(['success' => 'Perusahaan successfully created'], 200);
        } catch  (QueryException $e) {
            return response()->json(['error' => 'error creating', 'err' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request)
    {
        $perusahaan = perusahaan::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            //'nama_perusahaan' => 'required',
            //'singkatan' => 'required',
            //'no_telp' => 'required',
            //'no_fax' => 'required',
            //'alamat_perusahaan' => 'required',
            //'provinsi' => 'required',
            //'kota' => 'required',
            //'kecamatan' => 'required',
            //'bank' => 'required',

            'nama_perusahaan' => 'required',
            'singkatan' => 'required',
            'no_fax' => 'required',
            'no_telp' => 'required',
            'singkatan' => 'required',
            'alamat_perusahaan' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            //'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'bank' => 'required',
            'aninvoice' => 'required',
            'stempel' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'kop_surat' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validation error'], 200);
        }

        //if ($request->hasFile('logo')) {
        //    $file = $request->file('logo');
        //    $filenameWithExt = $request->file('logo')->getClientOriginalName();
        //    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //    $extension = $request->file('logo')->getClientOriginalExtension();
        //    $filenameSimpan = $filename.'_'.time().'.'.$extension;
        //    $path = Storage::disk('public')->put($filenameSimpan,file_get_contents($file));
        //    $logo_lama = $perusahaan->logo;
        //    Storage::delete("public/".$logo_lama);
        //} else {
        //    $filenameSimpan = $perusahaan->logo;
        //}

        if ($request->hasFile('stempel')) {
            $filestempel = $request->file('stempel');
            $filestempelWithExt = $request->file('stempel')->getClientOriginalName();
            $filestempelname = pathinfo($filestempelWithExt, PATHINFO_FILENAME);
            $extensionstempel = $request->file('stempel')->getClientOriginalExtension();
            $fileNamestempelSimpan = $filestempelname.'_'.time().'.'.$extensionstempel;
            $pathstempel = Storage::disk('public')->put($fileNamestempelSimpan,file_get_contents($filestempel));
            $stempel_lama = $perusahaan->stempel;
            Storage::delete("public/".$stempel_lama);
        } else {
            $fileNamestempelSimpan = $perusahaan->stempel;
        }

        if ($request->hasFile('kop_surat')) {
            $filekop_surat = $request->file('kop_surat');
            $filekop_suratWithExt = $request->file('kop_surat')->getClientOriginalName();
            $filekop_suratname = pathinfo($filekop_suratWithExt, PATHINFO_FILENAME);
            $extensionkop_surat = $request->file('kop_surat')->getClientOriginalExtension();
            $fileNamekop_suratSimpan = $filekop_suratname.'_'.time().'.'.$extensionkop_surat;
            $pathkop_surat = Storage::disk('public')->put($fileNamekop_suratSimpan,file_get_contents($filekop_surat));
            $kop_surat_lama = $perusahaan->kop_surat;
            Storage::delete("public/".$kop_surat_lama);
        } else {
            $fileNamekop_suratSimpan = $perusahaan->kop_surat;
        }

        

        $perusahaan->nama_perusahaan = $request->nama_perusahaan;
        $perusahaan->singkatan = $request->singkatan;
        $perusahaan->no_telp = $request->no_telp;
        $perusahaan->no_fax = $request->no_fax;
        $perusahaan->alamat_perusahaan = $request->alamat_perusahaan;
        $perusahaan->provinsi = $request->provinsi;
        $perusahaan->kota = $request->kota;
        $perusahaan->kecamatan = $request->kecamatan;
        //$perusahaan->logo = $filenameSimpan;
        $perusahaan->bank = $request->bank;
        $perusahaan->aninvoice = $request->aninvoice;
        $perusahaan->stempel = $fileNamestempelSimpan;
        $perusahaan->kop_surat = $fileNamekop_suratSimpan;
        $perusahaan->user_id = $request->user;
        $perusahaan->save();

        return response()->json(['success' => 'Perusahaan successfully Update'], 200);
    }

    public function delete(Request $request, $id)
    {
        $perusahaan = perusahaan::findOrFail($id);
        //$logo_lama = $perusahaan->logo;
        $stempel_lama = $perusahaan->stempel;
        $kop_surat_lama = $perusahaan->kop_surat;
        //Storage::delete("public/".$logo_lama);
        Storage::delete("public/".$stempel_lama);
        Storage::delete("public/".$kop_surat_lama);
        $perusahaan->delete();

        return response()->json(['success' => 'Perusahaan successfully Delete'], 200);
    }
}
