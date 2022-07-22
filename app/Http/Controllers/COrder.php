<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class COrder extends Controller
{
    public function __construct() 
	{
		$this->middleware('auth');
	}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a href="'.url('jalandarat/order/detail/'.$row->id_order).'" data-toggle="tooltip"  data-id="'.$row->id_order.'" class="detail btn btn-info btn-sm">Detail</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_order.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editOrder">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_order.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteOrder">Delete</a>';
    
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
        $vendor = Vendor::where('deleted', '=', 1)->get();
        $kota = Kota::where('deleted', '=', 1)->get();
        
        return view('t_order.order', ['vendor'=>$vendor, 'kota'=>$kota]);   
    }
    public function store(Request $request)
    {
        
        Order::updateOrCreate(['id_order'=> $request->id],
        ['tanggal' => $request->tanggal, 'id_jadwal' => $request->id_jadwal, 'asal' => $request->asal, 'asal' => $request->asal, 'tujuan' => $request->tujuan, 'asal_detail' => $request->asal_detail, 'tujuan_detail' => $request->tujuan_detail, 'jam' => $request->jam, 'harga' => str_replace(".","",$request->harga), 'modal' => str_replace(".","",$request->modal), 'laba' => str_replace(".","",$request->laba) , 'jumlah_penumpang' => $request->jumlah_penumpang, 'total_harga' => $request->total_harga, 'total_modal' => $request->total_modal, 'total_laba' => $request->total_laba, 'tambah_biaya' => $request->tambah_biaya, 'id_vendor' => $request->id_vendor, 'no_hp_pelanggan' => $request->no_hp_pelanggan, 'email' => $request->email, 'alamat' => $request->alamat, 'status' => $request->status, 'keterangan' => $request->keterangan ]);
        
        return response()->json(['success'=>'Data Berhasil Disimpan.']);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);

    }

    public function detailOrder($id)
    {
        $order = Order::find($id);
        $asal = Kota::kota($order->asal);
        $tujuan = Kota::kota($order->tujuan);
        return view('t_order.detail_order',['order'=>$order, 'asal'=>$asal, 'tujuan'=>$tujuan]);

    }

    public function edit($id)
    {
        $order = Order::find($id);
        return response()->json($order);
        
    }
}
