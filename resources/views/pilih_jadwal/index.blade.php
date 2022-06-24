@extends('template')
@section('container')
<section class="py-5 reservasi-section mb-5 bg-info">
    <div class="container">
        <div class="row ">
            <div class="col-12 text-center">
                
                <h2 class="title-reservasi">Ubah Jadwal Keberangkatan</h2>
            </div>
            
            <div class="card">
                <div class="card-body bg-light">
                    <form class="form-group row ">
                        
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Berangkat dari</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Tujuan Ke</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="pilihTanggal" class="form-label">Pilih Tanggal</label>
                            <input type="date" class="form-control" id="pilihTangal" >
                        </div>
                        <div class="col-2">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Penumpang</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-1 form-group">
                            <br>
                            <button type="button" class="btn btn-success" >Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>	
</section>	

<section class="bg-light">
    <div class="container">
        <h4>Pilih Jam Keberangkatan</h4>
        <p>Jadwal yang dipilih </p>
        <div class="card" >
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5 class="card-title">Keberangkatan jam 08:56</h5>
                        <h6 class="card-subtitle pt-3">Tersedia 6 kursi</h6>
                        <h6 class="card-subtitle pt-3">Promo</h6>
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-info">Pilih</button><br><br>
                        <h5 class="card-title">Rp. 120.000</h5>
                    </div>
                    
                </div>
            </div>
        </div><br>
        <div class="card" >
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col">
                        <h5 class="card-title">Keberangkatan jam 08:56</h5>
                        <h6 class="card-subtitle pt-3">Tersedia 6 kursi</h6>
                        <h6 class="card-subtitle pt-3">Promo</h6>
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-info">Pilih</button><br><br>
                        <h5 class="card-title">Rp. 120.000</h5>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection