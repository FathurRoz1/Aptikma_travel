<?php

namespace App\Http\Controllers;

use App\Models\Kategori_item;
use App\Models\M_item;
use App\Models\Penawaran;
use App\Models\Penawaran_detail_sub;
use Illuminate\Http\Request;

class CPenawaran extends Controller
{
    public function index(Request $request )
    {
        $penawaran = new Penawaran;
        $penawaran->pic = $request->input("pic");
        $penawaran->jumlah_peserta = $request->input("jumlah_peserta");
        $penawaran->tgl_start = $request->input("tgl_start");
        $penawaran->tgl_akhir = $request->input("tgl_akhir");
        $penawaran->lokasi_start = $request->input("lokasi_start");
        $penawaran->lokasi_akhir = $request->input("lokasi_akhir");
        $penawaran->durasi_hari = $request->input("durasi_hari");
        $penawaran->durasi_malam = $request->input("durasi_malam");
        $penawaran->save();
        
        return redirect('penawaran-harga/'.$penawaran->id_penawaran);
    }

    public function penawaran()
    {
        return view('penawaran.penawaran');
    }
    public function modal($id,$id1)
    {
        $data['item'] = M_item::where('id_kategori',$id)->get();
        $data['detail_sub'] = Penawaran_detail_sub::where('id_kategori',$id)->where('id_penawaran',$id1)->get();
        return response()->json($data);
    }

    public function harga($id)
    {
        $penawaran = Penawaran::find($id);
        $data = Kategori_item::all();
        return view('penawaran.index', [
            'data' => $data,
            'penawaran' => $penawaran,
            'id' => $id,
        ]);
    }

    public function get_harga_item($id)
    {
        $item = M_item::where('id_item', $id)->first();
        return response()->json($item);
    }

    public function simpan_detail(Request $request)
    {
        Penawaran_detail_sub::where('id_penawaran',$request->input("id_penawaran"))->where('id_kategori',$request->input("id"))->delete();

        for ($i=0; $i < count($request->harga); $i++) { 
            $penawaran = new Penawaran_detail_sub;
            $penawaran->id_penawaran = $request->input("id_penawaran");
            $penawaran->id_kategori = $request->input("id");
            $penawaran->id_item = $request['des'][$i];
            $penawaran->harga = str_replace(",","",$request['harga'][$i]);
            $penawaran->save();  
        }
        // echo count($request->des);
        return response()->json(['success'=>'Post saved successfully.']);
    }
}
