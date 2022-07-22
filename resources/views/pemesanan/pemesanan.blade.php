<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="{{asset('template/customcss/pemesanan.css')}}">
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row justify-content-center bungkus mx-auto" >
        <div class="col-12 col-md-4 px-0 shadow">
            <div class="header">
                <h4>Isi Data Diri</h4>
            </div>
            <div class="container">
              <!-- Detail Jadwal -->
                <div class="card detail-jadwal shadow">
                    <div class="card-body">
                        <div class="tujuan-berangkat">
                          <b>Tujuan Keberangkatan</b>
                          <div class="asal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                            <p class="content-up">{{$asal->nama_kota}}</p>
                            
                          </div>
                          <div class="tujuan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                            <p class="content-up">{{$tujuan->nama_kota}}</p>
                            
                          </div>
                        </div>
                        <div class="jadwal_berangkat">
                          <b >Jadwal Keberangkatan</b>
                          <div class="tanggal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill icon" viewBox="0 0 16 16">
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            <p class="content-up">{{$tanggal}}</p>
                          </div>
                          <div class="jam" style="margin-top: -1rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                            <p class="content-up">{{$jadwal->jam}} WIB</p>
                          </div>
                        </div>
                        <div class="jadwal_berangkat">
                          <b>Jumlah Penumpang</b>
                          <div class="penumpang">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill icon" viewBox="0 0 16 16">
                              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                            </svg>
                            <p class="content-up">{{$jumlah_penumpang}}</p>
                          </div>
                        </div>
                        
                    </div>
                </div>
              <!-- Akhir Detail Jadwal -->
              <div class="card isi-data" >
                <div class="card-body">
                  <h5>Data Pemesan</h5>
                  <form class="row g-3" method="GET" action="{{ url('jalandarat/pemesanan') }}">
                    @csrf
                      <input type="hidden" name="id_jadwal" id="id" value="{{$jadwal->id_jadwal}}">
                      <input type="hidden" name="jam" id="jam" value="{{$jadwal->jam}}">
                      <input type="hidden" name="tanggal" id="tanggal" value="{{$tanggal}}">
                      <input type="hidden" name="asal" id="asal" value="{{$jadwal->asal}}">
                      <input type="hidden" name="tujuan" id="tujuan" value="{{$jadwal->tujuan}}">
                      <input type="hidden" name="harga" id="harga" value="{{$jadwal->harga}}">
                      <input type="hidden" name="modal" id="modal" value="{{$jadwal->modal}}">
                      <input type="hidden" name="laba" id="laba" value="{{$jadwal->laba}}">
                      <input type="hidden" name="jumlah_penumpang" id="jumlah_penumpang" value="{{$jumlah_penumpang}}">
                      <input type="hidden" name="total_harga" id="total_harga" >
                      <input type="hidden" name="total_modal" id="total_modal" >
                      <input type="hidden" name="total_laba" id="total_laba" >
                      <input type="hidden" name="id_vendor" id="id_vendor" value="{{$jadwal->id_vendor}}">
                      <div class="col-md-6" >
                          <label for="inputEmail4" class="form-label">Nama Pemesan</label>
                          <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" >
                      </div>
                      <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="col-12">
                          <label for="inputAddress" class="form-label">Nomor Handphone</label>
                          <input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp_pelanggan" placeholder="">
                      </div>
                      <div class="col-12">
                        <label for="inputAddress2" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" >
                      </div>
                      <div class="col-12">
                          <label for="inputAddress2" class="form-label">Alamat Asal</label>
                          <input type="text" class="form-control" id="asal_detail" name="asal_detail" >
                      </div>
                      <div class="col-12">
                        <label for="inputAddress2" class="form-label">Alamat Tujuan</label>
                        <input type="text" class="form-control" id="tujuan_detail" name="tujuan_detail" >
                      </div>
                      <div class="col-12">
                          <button type="submit" class="btn btn-primary" id="savedata">Selanjutnya</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            
            <!-- Navbar Bawah -->
            <!-- Akhir Navbar Bawah -->
        </div>
    </div>
    <script>
      $(function () {
    
        $('#savedata').click(function () {
            var harga = document.getElementById('harga').value;
            var modal = document.getElementById('modal').value;
            var laba = document.getElementById('laba').value;
            var jumlahPenumpang = document.getElementById('jumlah_penumpang').value;
            var totalHarga = Number(harga) * Number(jumlahPenumpang);
            var totalModal = Number(modal) * Number(jumlahPenumpang);
            var totalLaba = Number(totalHarga) - Number(totalModal);
            
            if (!isNaN(totalHarga)) {
                document.getElementById('total_harga').value = totalHarga;
            }
            if (!isNaN(totalModal)) {
                document.getElementById('total_modal').value = totalModal;
            }
            if (!isNaN(totalLaba)) {
                document.getElementById('total_laba').value = totalLaba;
            }
          });
            
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

