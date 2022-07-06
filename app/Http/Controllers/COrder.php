<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Order;
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
   
                           $btn = '<a href="'.url('jalandarat/order/detail/'.$row->id_order).'" data-toggle="tooltip"  data-id="'.$row->id_order.'" class="edit btn btn-info btn-sm">Detail</a>'; 

                           $btn = $btn. '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id_order.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJadwal">Delete</a>';
    
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
        
        
        return view('t_order.order');   
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
        $tujuan = Kota::kota($order->asal);
        return view('t_order.detail_order',['order'=>$order, 'asal'=>$asal, 'tujuan'=>$tujuan]);

    }
}
