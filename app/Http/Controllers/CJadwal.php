<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class CJadwal extends Controller
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
            $data = DB::table('m_jadwal')
                    ->join('m_vendor', 'm_jadwal.id_vendor', '=', 'm_vendor.id_vendor')
                    ->where('m_jadwal.deleted', '=', 1)
                    ->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('jalandarat/jadwal/detail/'.$row->id_jadwal).'" data-toggle="tooltip"  data-id="'.$row->id_jadwal.'" class="edit btn btn-info btn-sm">Detail</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jadwal.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editJadwal">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_jadwal.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJadwal">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('asal', function($row){
                        $asal = Kota::find($row->asal);
                        return $asal->nama_kota;
                        
                    })
                    ->addColumn('tujuan', function($row){
                        $tujuan = Kota::find($row->tujuan);
                        return $tujuan->nama_kota;
                    })

                    
                    ->rawColumns(['action','asal', 'tujuan'])
                    ->make(true);
        }
        $vendor = Vendor::all();
        $kota = Kota::all();
        
        return view('jadwal.jadwal', ['vendor'=>$vendor, 'kota'=>$kota]);
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
        
        Jadwal::updateOrCreate(['id_jadwal'=> $request->id],
        ['asal' => $request->asal, 'tujuan' => $request->tujuan, 'titik_kumpul' => $request->titik_kumpul, 'jam' => $request->jam, 'harga' => str_replace(".","",$request->harga), 'modal' => str_replace(".","",$request->modal), 'laba' => str_replace(".","",$request->laba) , 'id_vendor' => $request->id_vendor]);
        
        return response()->json(['success'=>'Data Berhasil Disimpan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        $asal = Kota::kota($jadwal->asal);
        $tujuan = Kota::kota($jadwal->tujuan);
        $vendor = Vendor::find($jadwal->id_vendor);
        return view('jadwal.detail_jadwal',['jadwal'=>$jadwal, 'vendor'=>$vendor, 'asal'=>$asal, 'tujuan'=>$tujuan]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return response()->json($jadwal);
        
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
        $hapus = Jadwal::find($id);
        $hapus->deleted = 0;
        $hapus->save();

        return response()->json(['success'=>'Kota deleted successfully.']);

    }
}
