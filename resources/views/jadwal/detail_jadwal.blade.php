@extends('layouts.index')

@section( 'content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Jadwal</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Asal</label>
            <div class="col-sm-12">
                
                    <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$asal->nama_kota}}" readonly>                    
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Tujuan</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$tujuan->nama_kota}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-6 control-label">Titik Kumpul</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$jadwal->titik_kumpul}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Jam</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$jadwal->jam}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$jadwal->harga}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Modal</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$jadwal->modal}}" readonly>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Laba</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$jadwal->laba}}" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Vendor</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required value="{{$vendor->nama_vendor}}" readonly>
            </div>
        </div>
        <a href="{{url('jalandarat/jadwal')}}" class="btn btn-facebook btn-block"><i
                class="fab  fa-fw"></i> Kembali</a>

    </div>
</div>

@endsection