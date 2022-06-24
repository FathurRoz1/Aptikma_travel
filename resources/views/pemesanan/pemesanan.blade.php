
@extends('template')

@section('container')

<section class="mb-5 bg-info">
    <div class="container">
        <div class="row">
          <div class="col">
            
            <h5>Tujuan Keberangkatan</h5>
            <h6>Batu</h6>
            <h6>Jember</h6>
          </div>
          <div class="col">
            <h5>Jadwal Keberangkatan</h5>
            <h6>sekian</h6>
          </div>
          <div class="col">
            <h5>Penumpang</h5>
            <h6>1</h6>
          </div>
        </div>
    </div>
</section>

<section>
    <div class="container ps-auto" >
        <h5>Data Pemesan Dan Penumpang</h5>
        <form class="row g-3" ">
            <div class="col-md-6" >
                <label for="inputEmail4" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Nomor Handphone</label>
                <input type="number" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Nama Penumpang Ke 1</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </div>
        </form>
    </div>
</section>

<script>
  .a {
  width: 150px;
  border: 1px solid black;
}
</script>
@endsection