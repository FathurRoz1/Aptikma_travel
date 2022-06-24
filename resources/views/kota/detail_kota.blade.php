@extends('layouts.index')

@section( 'content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Kota</h6>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Nama Kota</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Enter Name" value="{{$kota->nama_kota}}" readonly>
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
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" placeholder="Enter Name" value="{{$kota->created_at}}" readonly>
            </div>
        </div>
        <a href="{{url('jalandarat/kota')}}" class="btn btn-facebook btn-block"><i
                class="fab  fa-fw"></i> Kembali</a>

    </div>
</div>

@endsection