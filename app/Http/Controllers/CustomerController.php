<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\customer;
use App\detail_customer;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customer = customer::orderBy('created_at','desc')->get();
        return view('customers.index', ['customers' => $customer]);
    }

    public function create(Request $request)
    {
        //customer validator
        $validator = Validator::make($request->all(),[
            'nama_customer' => 'required',
            'no_telp' => 'required',
            'no_fax' => 'required',
            'alamat_lengkap' => 'required',
            'alamat_daerah' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Gagal Validasi'], 404);
        }

        try {
            $customer = customer::create([
                'nama_customer' => $request->nama_customer,
                'no_telp' => $request->no_telp,
                'no_fax' => $request->no_fax,
            ]);
            $customer_id = $customer->id;

            detail_customer::create([
                'customer_id' => $customer_id,
                'alamat_lengkap' => $request->alamat_lengkap,
                'alamat_daerah' => $request->alamat_daerah,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan
            ]);

            $response = [
                'message' => 'Customer created',
            ];
            return response()->json(['success' => 'success', 'response' => $response], 200);
        } catch (QueryException $e) {
            $response = [
                'message' => 'Failed ' . $e->errorInfo
            ];
            return response()->json(['error' => 'Error msg', 'response' => $response], 404);
        }
    }

    public function show($id)
    {
        $customer = customer::findOrFail($id);
        return response()->json(['success' => 'success', 'data' => $customer], 200);
    }

    public function update(Request $request)
    {
        $customer = customer::findOrFail($request->id);
        $validator = Validator::make($request->all(), [
            'nama_customer' => 'required',
            'no_telp' => 'required',
            'no_fax' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validasi error', 'data' => $validator->errors()], 404);
        }

        $customer->nama_customer = $request->nama_customer;
        $customer->no_telp = $request->no_telp;
        $customer->no_fax = $request->no_fax;
        $customer->save();
        return response()->json(['success' => 'Berhasil di Update'], 200);
    }

    public function delete(Request $request,$id)
    {
        $customer = customer::findOrFail($id);
        $detail_customer = detail_customer::where('customer_id',$id)->get();
        foreach ($detail_customer as $key) {
            $detail = detail_customer::find($key->id);
            $detail->delete();
        }
        $customer->delete();
        return response()->json(['success' => 'Berhasil dihapus'], 200);
    }

    public function detail($id)
    {
        $customer_id = customer::findOrFail($id);
        $detail_customer = detail_customer::where('customer_id', $id)->get();
        return response()->json(['success' => 'Behasil mengambil data', 'data' => $detail_customer], 200);
    }

    public function detailAll($id)
    {
        $detail_customer = detail_customer::where('customer_id', $id)->get();
        $customer = customer::findOrFail($id);
        return view('customers/detail/index', ['detail_customers' => $detail_customer, 'customer' => $customer, 'id' => $id]);
    }

    public function detailCreate(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'alamat_lengkap' => 'required',
            'alamat_daerah' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'validator error'], 404);
        }

        try {
            $detail_customer = detail_customer::create([
                'customer_id' => $id,
                'alamat_lengkap' => $request->alamat_lengkap,
                'alamat_daerah' => $request->alamat_daerah,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan
            ]);

            return response()->json(['success' => 'Detail customer created'], 200);
        } catch (QueryException $e) {   
            return response()->json(['error', 'Query Error'], 202);
        }
    }

    public function detailShow(Request $request, $id, $id2)
    {
        $detail_customer = detail_customer::findOrFail($id2);
        return response()->json(['success' => 'Get data by ID', 'data' => $detail_customer ], 200);
    }

    public function detailUpdate(Request $request, $id, $id2)
    {
        $detail_customer = detail_customer::findOrFail($id2);
        $validator = Validator::make($request->all(), [
            'alamat_lengkap' => 'required',
            'alamat_daerah' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validator error'], 200);
        }

        $detail_customer->alamat_lengkap = $request->alamat_lengkap;
        $detail_customer->alamat_daerah = $request->alamat_daerah;
        $detail_customer->provinsi = $request->provinsi;
        $detail_customer->kota = $request->kota;
        $detail_customer->kecamatan = $request->kecamatan;
        $detail_customer->save();
        
        return response()->json(['success' => 'Data Updated'], 200);
    }

    public function detailDelete(Request $request, $id, $id2)
    {
        $detail_customer = detail_customer::findOrFail($id2);
        $detail_customer->delete();

        return response()->json(['success' => 'Detail customer delete'], 200);
    }
}
