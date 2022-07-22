
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.5/css/unicons.css">

    
    <link rel="stylesheet" href="{{asset('template/customcss/cari_tiket.css')}}">
    <title>Aptikma Travel</title>
  </head>
  <body>
    <!-- Content -->
    <div class="row justify-content-center mx-auto">
      <div class="col-12 col-md-4 px-0 shadow">
        <div class="header">
          <div class="caption">
            <H4 >Pesan tiket travel murah Jawa Timur ! <i class="uil uil-bus-alt"></i> </H4>
          </div>
          <div class="logo">

          </div>
        </div>

        <!-- Form Pencarian -->
        <div class="card shadow search-ticket">
          <div class="card-body bg-white ">
              <form class="form-group row" method=POST" action="{{url('jalandarat/pilihJadwal')}}">
                @csrf
                  <div class="col-6">
                      <label for="exampleFormControlInput1" class="form-label text-muted">Berangkat dari</label>
                      <select class="form-select input" aria-label="Default select example" name="asal">
                        @foreach($kota as $data)
                            <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-6">
                      <label for="exampleFormControlInput1" class="form-label text-muted">Tujuan Ke</label>
                      <select class="form-select input" aria-label="Default select example" name="tujuan">
                        @foreach($kota as $data)
                            <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
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
        <!-- Akhir Form Pencarian -->
        <div class="container " style="margin: 1rem 0 1rem 0">
          <form action="{{url('jalandarat/cek-tiket')}}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="id_order" placeholder="Masukkan kode tiket" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" style="padding: 0.5rem 2rem 0.5rem 2rem">Cari</button>
              </div>
            </div>
          </form>
        </div>
        <!-- Your Ticket -->
        <div class="container ticket">
          <div class="judul">
            <h3>Your Ticket</h3>
            <a href="">see all</a>
          </div>
          <div class="card ticket-detail">
            <div class="card-body">
              <div class="ticket-code">
                <div class="code">
                  <small class="text-muted">Kode Ticket</small>
                  <h5>C5634D</h5>
                </div>
                <div class="payment-status">
                  <label for="" class="btn btn-outline-danger disabled">Pending Payment</label>
                </div>
              </div>
              <hr>
              <div class="details ticket-code">
                <b style="color: #009DAE">Yogyakarta</b>
                <b class="text-muted">6jam 43menit</b>
                <b style="color: #009DAE">Bandung</b>
              </div>
              <div class="details ticket-code">
                <small class="text-muted"> 25 Juli 2022 </small>
                <small class="text-muted"> 25 Juli 2022 </small>
              </div>
              <div class="details ticket-code">
                <small class="text-muted"> 14:30 WIB </small>
                <small class="text-muted"> 21:13 WIB </small>
              </div>
            </div>
          </div>
        </div>
        <!-- Akhir Your Ticket -->
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>



