<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CKota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kota::where('deleted','=', 1)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('jalandarat/kota/detail/'.$row->id_kota).'" data-toggle="tooltip"  data-id="'.$row->id_kota.'" class="detail btn btn-info btn-sm">Detail</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kota.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKota">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_kota.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKota">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        
        return view('kota.kota');
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
        Kota::updateOrCreate(['id_kota'=> $request->id],
        ['nama_kota' => $request->nama_kota, 'created_by'=> $id, 'deleted'=>1]);
        return response()->json(['success'=>'Berhasil Menambahkan Data.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kota = Kota::find($id);
        $user = User::find($kota->created_by);
        return view('kota.detail_kota',['kota'=>$kota, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::find($id);
        return response()->json($kota);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Kota::find($id);
        $hapus->deleted = 0;
        $hapus->save();

        return response()->json(['success'=>'Kota deleted successfully.']);
    }
}
