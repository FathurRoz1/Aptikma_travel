@extends('layouts.index')

@section( 'content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Bank</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nama Bank</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Enter Name" value="{{$bank->nama_bank}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nomor Rekening</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Enter Name" value="{{$bank->nomor_rekening}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Atas Nama</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Enter Name" value="{{$bank->atas_nama}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Enter Name" value="{{$bank->logo}}" readonly>
            </div>
        </div>
        
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Diinput Oleh</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Enter Name" value="{{$user->name}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Tanggal Input</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Enter Name" value="{{$bank->created_at}}" readonly>
            </div>
        </div>
        <a href="{{url('jalandarat/bank')}}" class="btn btn-facebook btn-block"><i
                class="fab  fa-fw"></i> Kembali</a>

    </div>
</div>

@endsection