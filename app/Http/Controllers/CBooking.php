<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Jadwal;
use App\Models\Kota;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CBooking extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kota = Kota::where('deleted', '=', 1)->get();
        return view('cari_tiket.cari_tiket', ['kota'=>$kota]);
    }

    public function search(Request $request)
    {   
        $kota = Kota::all();
        $jadwal = Jadwal::where('asal', $request->asal)
                        ->where('tujuan', $request->tujuan)
                        ->get();
        return view('pilih_jadwal.pilih_jadwal', ['jumlah'=>$request->jumlah, 'tanggal'=>$request->tanggal, 'jumlah_penumpang'=>$request->jumlah_penumpang, 'jadwal'=>$jadwal, 'kota'=>$kota, 'asal'=>$request->asal, 'tujuan'=>$request->tujuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function booking(Request $request)
    {
        
        $jadwal = Jadwal::where('id_jadwal', $request->id_jadwal)->first();
        $asal = Kota::where('id_kota', $jadwal->asal)->first();
        $tujuan = Kota::where('id_kota', $jadwal->tujuan)->first();
        return view('pemesanan.pemesanan', ['tanggal'=>$request->tanggal, 'jadwal'=>$jadwal, 'jumlah_penumpang'=>$request->jumlah_penumpang, 'asal'=>$asal, 'tujuan'=>$tujuan]);
    }
    
    
    public function pemesanan(Request $request)
    {
        
        $order = new Order;
        $order->tanggal = $request->tanggal;
        $order->jam = $request->jam;
        $order->id_jadwal = $request->id_jadwal;
        $order->asal = $request->asal;
        $order->tujuan = $request->tujuan;
        $order->asal_detail = $request->asal_detail;
        $order->tujuan_detail = $request->tujuan_detail;
        $order->harga = $request->harga;
        $order->modal = $request->modal;
        $order->laba = $request->laba;
        $order->jumlah_penumpang = $request->jumlah_penumpang;
        $order->total_harga = $request->total_harga;
        $order->total_modal = $request->total_modal;
        $order->total_laba = $request->total_laba;
        $order->id_vendor = $request->id_vendor;
        $order->nama_pelanggan = $request->nama_pelanggan;
        $order->no_hp_pelanggan = $request->no_hp_pelanggan;
        $order->email = $request->email;
        $order->alamat = $request->alamat;

        $order->save();

        $jadwal = DB::table('t_order')
                    ->join('m_jadwal', 't_order.id_jadwal', '=', 'm_jadwal.id_jadwal')
                    ->where('id_order', $order->id_order )
                    ->first();
        $bank = Bank::where('deleted', '=', 1)->get();
        return view('pemesanan.pembayaran', ['jadwal'=>$jadwal, 'bank'=>$bank]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayar(Request $request)
    {
        $bank = Bank::where('id_bank', $request->id_bank)->first();
        return view('pemesanan.bank_pembayaran', ['bank'=>$bank, 'total_harga'=>$request->total_harga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
