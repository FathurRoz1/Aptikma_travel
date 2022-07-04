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
                    <form class="form-group row " method=POST" action="{{url('jalandarat/pilihJadwal')}}">
                        
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Berangkat dari</label>
                            <select class="form-select" aria-label="Default select example" name="asal">
                                @foreach($kota as $data)
                                        <option value="<?=$data['id_kota']?>" {{ ($data->id_kota == $asal) ? 'selected' : '' }}> 
                                        
                                        <?=$data['nama_kota']?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Tujuan Ke</label>
                            <select class="form-select" aria-label="Default select example" name="tujuan">
                                @foreach($kota as $data)
                                        <option value="<?=$data['id_kota']?>" {{ ($data->id_kota == $tujuan) ? 'selected' : '' }}><?=$data['nama_kota']?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="pilihTanggal" class="form-label">Pilih Tanggal</label>
                            <input type="date" class="form-control" id="pilihTangal" name="tanggal">
                        </div>
                        <div class="col-2">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Penumpang</label>
                            <select class="form-select" aria-label="Default select example" name="jumlah_penumpang">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-1 form-group">
                            <br>
                            <button type="submit" class="btn btn-success" >Cari</button>
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
        <form action="{{url('jalandarat/booking')}}" method="get">
            @foreach ($jadwal as $data)
            <div class="card" >
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id_jadwal" id="id" value="{{$data->id_jadwal}}">
                    <input type="hidden" name="jam" id="jam" value="{{$data->jam}}">
                    <input type="hidden" name="jumlah_penumpang" id="jumlah_penumpang" value="{{$jumlah_penumpang}}">
                    <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                    <div class="row justify-content-between">
                        <div class="col">
                            <h5 class="card-title" name="">Keberangkatan jam {{$data->jam}}</h5>
                            <h6 class="card-subtitle pt-3">Tersedia</h6>
                            <h6 class="card-subtitle pt-3">Promo</h6>
                        </div>
                        <div class="col text-end">
                            <button type="submit" class="btn btn-info">Pilih</button><br><br>
                            <h5 class="card-title " id="">Rp. {{number_format($data->harga)}}</h5>
                        </div>
                    </div>
                </div>
            </div><br>
            @endforeach
        </form>
        
    </div>
</section>



@endsection