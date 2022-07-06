@extends('layouts.index')

@section( 'content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Order</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nama Pelanggan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->nama_pelanggan}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nomor HP Pelanggan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->no_hp_pelanggan}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->email}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Asal</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$asal->nama_kota}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6 control-label">Tujuan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$tujuan->nama_kota}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6 control-label">Detail Alamat Asal</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->asal_detail}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Detail Alamat Tujuan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->tujuan_detail}}" readonly>                    
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6 control-label">Jam Keberangkatan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->jam}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Jumlah Penumpang</label>
            <div class="col-sm-12">
                
                    <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->jumlah_penumpang}}" readonly>                    
                
            </div>
        </div>

        
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Total Harga</label>
            <div class="col-sm-12">
                
                    <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->total_harga}}" readonly>                    
                
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Total Modal</label>
            <div class="col-sm-12">
                
                    <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->total_modal}}" readonly>                    
                
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Total Harga</label>
            <div class="col-sm-12">
                
                    <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$order->total_laba}}" readonly>                    
                
            </div>
        </div>
        <a href="{{url('jalandarat/jadwal')}}" class="btn btn-facebook btn-block"><i
                class="fab  fa-fw"></i> Kembali</a>

    </div>
</div>

@endsection