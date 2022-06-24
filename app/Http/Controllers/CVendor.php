<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CVendor extends Controller
{
    public function __construct() 
	{
		$this->middleware('auth');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::where('deleted',1)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('jalandarat/vendor/detail/'.$row->id_vendor).'" data-toggle="tooltip"  data-id="'.$row->id_vendor.'" class="detail btn btn-info btn-sm">Detail</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_vendor.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editVendor">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_vendor.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteVendor">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        
        return view('vendor.vendor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        Vendor::updateOrCreate(['id_vendor'=> $request->id],
        ['nama_vendor' => $request->nama_vendor, 'created_by'=> $id]);
        return response()->json(['success'=>'Berhasil Menambahkan Data.']);
                
        /* $tambah = new Vendor();
        $tambah->nama_vendor = $request->nama_vendor;
        $tambah->created_by = $id;
        $tambah->save(); */
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vendor = Vendor::find($id);
        $user = User::find($vendor->created_by);
        return view('vendor.detail_vendor',['vendor'=>$vendor, 'user'=>$user]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return response()->json($vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor = Vendor::find($request->id);
        
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->created_by = $vendor;
        $vendor->save();
        return response()->json(['success'=>'Berhasil Mengubah Data.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Vendor::find($id);
        $hapus->deleted = 0;
        $hapus->save();

        return response()->json(['success'=>'Vendor deleted successfully.']);
    }
}
