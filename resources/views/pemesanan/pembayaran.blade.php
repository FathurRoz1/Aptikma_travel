
@extends('template')

@section('container')

<section class="mb-5 bg-info">
    <div class="container">
        <div class="row">
          <div class="col">
            
            <h5>Tujuan Keberangkatan</h5>
            <h6>{{$jadwal->asal}}</h6>
            <p>{{$jadwal->asal_detail}}</p>
            <h6>{{$jadwal->tujuan}}</h6>
            <p>{{$jadwal->tujuan_detail}}</p>
        </div>
          <div class="col">
            <h5>Jadwal Keberangkatan</h5>
            <h6>{{$jadwal->tanggal}}</h6>
            <h6>{{$jadwal->jam}}</h6>
          </div>
          <div class="col">
            <h5>Penumpang</h5>
            <h6>{{$jadwal->jumlah_penumpang}}</h6>
          </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row ">
            <div class="col-12 ">
                
                <h4>Pembayaran </h4>
				<h5 class="mb-4">Silahkan pilih metoda pembayaran</h5>
            </div>
            
            <div class="card">
                <div class="card-body bg-light">
                    <form class="form-group row " method="GET" action="{{ url('jalandarat/bayar') }}">
                        @csrf

                        @foreach ($bank as $data)
                        <h6></h6>
                        <div class="col-3">
                            <div class="form-check">
                                <input type="hidden" name="id_bank" id="id" value="{{$data->id_bank}}">
                                <input class="form-check-input" type="radio" name="nama_bank" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  <img style="width: 100%" src="/logo_bank/{{$data->logo}}" alt="">
                                </label>
                              </div>
                        </div>
                            
                        @endforeach
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
</section>


@endsection