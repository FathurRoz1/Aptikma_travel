
@extends('template')

@section('container')

<section class="mb-5 bg-info">
    <div class="container">
        <div class="row">
          <div class="col">
            
            <h5>Tujuan Keberangkatan</h5>
            <h6>{{$asal->nama_kota}}</h6>
            <h6>{{$tujuan->nama_kota}}</h6>
          </div>
          <div class="col">
            <h5>Jadwal Keberangkatan</h5>
            <h6>{{$tanggal}}</h6>
          </div>
          <div class="col">
            <h5>Penumpang</h5>
            <h6>{{$jumlah_penumpang}}</h6>
          </div>
        </div>
    </div>
</section>

<section>
    <div class="container ps-auto" >
        <h5>Data Pemesan Dan Penumpang</h5>
        <form class="row g-3" method="GET" action="{{ url('jalandarat/pemesanan') }}">
          @csrf
            <input type="hidden" name="id_jadwal" id="id" value="{{$jadwal->id_jadwal}}">
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
                <input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp_pelanggan" placeholder="1234 Main St">
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Alamat Asal</label>
                <input type="text" class="form-control" id="asal_detail" name="asal_detail" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-12">
              <label for="inputAddress2" class="form-label">Alamat Tujuan</label>
              <input type="text" class="form-control" id="tujuan_detail" name="tujuan_detail" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="savedata">Selanjutnya</button>
            </div>
        </form>
    </div>
</section>

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
@endsection