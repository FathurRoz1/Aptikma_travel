
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
    <div class="row justify-content-center bungkus mx-auto">
      <div class="col-12 col-md-4 px-0 shadow">
        <div class="header">
          <div class="caption">
            <H4 >Tiket <i class="uil uil-bus-alt"></i> </H4>
          </div>
          <div class="logo">

          </div>
        </div>

       
        <!-- Your Ticket -->
        <div class="container ticket">
          
          <div class="card ticket-detail">
            <div class="card-body">
              <div class="ticket-code">
                <div class="code">
                  <small class="text-muted">Kode Ticket</small>
                  <h5>{{$tiket->id_order}}</h5>
                </div>
                <div class="payment-status">
                  <label for="" class="btn btn-outline-danger disabled">Pending Payment</label>
                </div>
              </div>
              <hr>
              <div class="details ticket-code">
                <b style="color: #009DAE">{{ $asal->nama_kota }}</b>
                <b class="text-muted">6jam 43menit</b>
                <b style="color: #009DAE">{{$tujuan->nama_kota}}</b>
              </div>
              <div class="details ticket-code">
                <small class="text-muted"> {{$tiket->tanggal}} </small>
              </div>
              <div class="details ticket-code">
                <small class="text-muted"> {{$tiket->jam}} </small>
              </div>
            </div>
          </div>
        </div>
        <a href="{{ url('jalandarat') }}" class="btn kembali">Kembali</a>
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



