<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template/customcss/pilih_jadwal.css')}}">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row justify-content-center bungkus mx-auto">
        <div class="col-12 col-md-4 px-0 shadow" >
            <div class="header">
                <h4>Pilih Tiket</h4>
            </div>
            <div class="container">
                <!-- pilihan ubah ticket -->
                <div class="card jadwal-pilihan shadow">
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="asal-tujuan">
                                    <b>{{ $a->nama_kota }}</b>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                      </svg>
                                    <b>{{ $b->nama_kota }}</b>
                                </div>
                            </div>
                            <div class="col-4">
                                <button class="btn ubah" id="myBtn">Ubah Rute</button>
                            </div>
                            <div class="col-8">
                                <div class="detail">
                                    <small class="text-muted">{{ $tanggal }}</small>
                                    <small class="text-muted">{{ $jumlah_penumpang }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- akhir pilihan ubah ticket -->
                <!-- Pilih Ticket -->
                <form action="{{url('jalandarat/booking')}}" method="get">
                @foreach ($jadwal as $data)
                    <div class="card ticket-detail">
                      <div class="card-body">
                        @csrf
                        <input type="hidden" name="id_jadwal" id="id" value="{{$data->id_jadwal}}">
                        <input type="hidden" name="jam" id="jam" value="{{$data->jam}}">
                        <input type="hidden" name="jumlah_penumpang" id="jumlah_penumpang" value="{{$jumlah_penumpang}}">
                        <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                        <div class="ticket-code">
                            <div class="col-8">
                                <div class="asal-tujuan">
                                    @php
                                        $asal_kota = DB::table('m_kota')->where('id_kota', $data->asal)->first();
                                        $tujuan_kota = DB::table('m_kota')->where('id_kota', $data->tujuan)->first();
                                    @endphp
                                    <b>{{ $asal_kota->nama_kota }}</b>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                      </svg>
                                    <b>{{$tujuan_kota->nama_kota}}</b>
                                </div>
                            </div>
                          <div class="payment-status">
                            <button type="submit" class="btn btn btn-primary">Pilih Tiket</button>
                          </div>
                        </div>
                        <hr>
                        <div class="details ticket-code">
                          <b style="color: #009DAE">{{$data->jam}} WIB</b>
                        
                          <b style="color: #009DAE">Rp. {{number_format($data->harga)}}</b>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </form>
                <!-- Akhir Pilih tiket -->
                {{-- Ubah tiket --}}
                <div class="custom-modal" id="tiket-modal">
                  <div class="card shadow search-ticket modal-content">
                    <div class="card-body bg-white ">
                        <form class="form-group row" method=POST" action="{{url('jalandarat/pilihJadwal')}}">
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label text-muted">Berangkat dari</label>
                                <select class="form-select input" aria-label="Default select example" name="asal">
                                    @foreach($kota as $data_kota)
                                    <option value="<?=$data_kota['id_kota']?>" {{ ($data_kota->id_kota == $asal) ? 'selected' : '' }}> 
                                    
                                    <?=$data_kota['nama_kota']?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label text-muted">Tujuan Ke</label>
                                <select class="form-select input" aria-label="Default select example" name="tujuan">
                                    @foreach($kota as $data_tujuan)
                                    <option value="<?=$data_tujuan['id_kota']?>" {{ ($data_tujuan->id_kota == $tujuan) ? 'selected' : '' }}><?=$data_tujuan['nama_kota']?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="pilihTanggal" class="form-label text-muted">Pilih Tanggal</label>
                                <input type="date" class="form-control input" id="pilihTangal" name="tanggal">
                            </div>
                            <div class="col-6">
                                <label for="exampleFormControlInput1" class="form-label text-muted">Jumlah Penumpang</label>
                                <select class="form-select input" aria-label="Default select example" name="jumlah_penumpang">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <br>
                                <button type="submit" class="btn cari" href="{{url('pilihJadwal')}}">Cari</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- navbar bawah -->
            
            <!-- akhir navbar bawah -->
        </div>
    </div>
    <script>
      // Get the modal
      var modal = document.getElementById("tiket-modal");
      
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      
      // Get the <span> element that closes the modal
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      
      // When the user clicks on <span> (x), close the modal
      
      
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
      </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>

{{-- 
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
</section> --}}
