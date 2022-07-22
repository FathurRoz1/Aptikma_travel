<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template/customcss/pembayaran.css')}}">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row justify-content-center bungkus mx-auto" >
        <div class="col-12 col-md-4 px-0 shadow">
            <div class="header">
                <h4>Pembayaran</h4>
            </div>
            <div class="container">
                <!-- Jadwal Pilihan -->
                <div class="card detail-jadwal shadow">
                    <div class="card-body">
                        <div class="tujuan-berangkat">
                          <b>Tujuan Keberangkatan</b>
                          <div class="asal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                            <p class="content-up">{{$asal->nama_kota}}</p>
                            <div class="titik_kumpul">
                              <a href="" style="text-decoration: none" ><small>{{$jadwal->asal_detail}}</small> </a>
                            </div>
                          </div>
                          <div class="tujuan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                            <p class="content-up">{{$tujuan->nama_kota}}</p>
                            <div class="titik_kumpul">
                              <a href=""  style="text-decoration: none" ><small>{{$jadwal->tujuan_detail}}</small> </a>
                            </div>
                          </div>
                        </div>
                        <div class="jadwal_berangkat">
                          <b >Jadwal Keberangkatan</b>
                          <div class="tanggal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill icon" viewBox="0 0 16 16">
                              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                            <p class="content-up">{{$jadwal->tanggal}}</p>
                          </div>
                          <div class="jam" style="margin-top: -1rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill icon" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            </svg>
                            <p class="content-up">{{$jadwal->jam}}</p>
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
                            <p class="content-up">{{$jadwal->jumlah_penumpang}}</p>
                          </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Jadwal Pilihan -->
                <!-- Pilih Pembayaran -->
                <div class="card pilih-pembayaran">
                    <div class="card-body">
                      <form method="GET" action="{{ url('jalandarat/bayar') }}">
                        <input type="hidden" name="total_harga" id="id" value="{{$jadwal->total_harga}}">
                      <H5>Pilih Metode Pembayaran</H5>
                      <div class="dropdown shadow ">
                        <button class="custom-dropdown dropbtn" type="button" onclick="myFunction()">
                          <div class="isi dropbtn">
                            <div class="jenis-pembayaran dropbtn">Transfer Bank <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill panah" viewBox="0 0 16 16">
                              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                            </svg></div>
                            
                            
                          </div>
                        </button>
                        @foreach ($bank as $data)
                        <div id="myDropdown" class="row dropdown-content shadow chose-payment">
                          <div class="card col-6 ">
                            <label class="card-body atas"  for="btn-check"">
                              
                                <img src="/logo_bank/{{$data->logo}}" alt="" class="logo logo-respons">
                                <p class="harga">{{number_format($jadwal->total_harga)}}</p>
                                <hr>
                                <p class="nama-bank" style="margin: 0 0 -0.4rem -1rem;">{{$data->nama_bank}}</p>
                              
                            </label>
                            <input type="hidden" name="id_bank" id="id" value="{{$data->id_bank}}">
                            <input type="checkbox" id="btn-check" name="nama_bank">
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <button type="submit" class="btn btn-primary submit">Primary</button>
                    </form>
                    </div>
                </div>
                <!-- Akhir Pilih Pembayaran -->
            </div>
            <!-- Navbar Bawah -->
            
          <!-- Akhir Navbar Bawah -->
        </div>
    </div>
    <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            
          }
        }
      }
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
