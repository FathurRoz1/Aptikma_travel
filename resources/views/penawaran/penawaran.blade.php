@extends('template2')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Penawaran</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{url('penawaran-save')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama PIC</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="pic" placeholder="Nama PIC">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Jumlah Peserta</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="jumlah_peserta" placeholder="Jumlah Peserta">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Start</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputPassword3" name="tgl_start" placeholder="Tanggal Start">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputPassword3" name="tgl_akhir" placeholder="Tanggal Akhir">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Lokasi Awal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="lokasi_start" placeholder="Lokasi Awal">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Lokasi Akhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" name="lokasi_akhir" placeholder="Lokasi Akhir">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Durasi</label>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="" name="durasi_hari">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="" name="durasi_malam">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Malam</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection