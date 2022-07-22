@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Tiket</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama </th>
                <th>No Handphone</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Jam</th>
                <th>Total Harga</th>
                <th>Jumlah Penumpang</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
   
    <div class="modal fade" id="ajaxModelexa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                
                <div class="modal-body">
                    <form id="laravel-ajax-file-upload" name="laravel-ajax-file-upload" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="id_jadwal" id="id_jadwal" >
                        <input type="hidden" name="total_harga" id="total_harga" >
                        <input type="hidden" name="total_modal" id="total_modal" >
                        <input type="hidden" name="total_laba" id="total_laba" >
                       @csrf
                        <div class="form-group">
                        <label class="col-sm-6 control-label">Nama Pelanggan</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="alamat" name="alamat"  required>
                                    </div>
                                </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Nomor Hp Pelanggan</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="no_hp_pelanggan" name="no_hp_pelanggan"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Jumlah Penumpang</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="jumlah_penumpang" name="jumlah_penumpang"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Tanggal</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="tanggal" name="tanggal"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Jam Keberangkatan</label>
                                <div class="col-sm-12">
                                    <input type="time" class="form-control" id="jam" name="jam"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-6 control-label">Asal</label>
                            <div class="col-sm-12">
                                <select class="form-select form-control" aria-label="Default select example" name="asal" id="asal">
                                @foreach($kota as $data)
                                    <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Tujuan</label>
                            <div class="col-sm-12">
                                <select class="form-select form-control" aria-label="Default select example" name="tujuan" id="tujuan">
                                @foreach($kota as $data)
                                    <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Asal Detail</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="asal_detail" name="asal_detail"  required>
                                </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Tujuan Detail</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="tujuan_detail" name="tujuan_detail"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Harga</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control numeric" id="harga" name="harga"  onkeydown="return numbersonly(this, event);" onkeyup="PemisahTitik(this);" required>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Modal</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control numeric" id="modal" name="modal" onkeydown="return numbersonly(this, event);" onkeyup="PemisahTitik(this)" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Laba</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control numeric" id="laba" name="laba"  required readonly>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Vendor</label>
                            <div class="col-sm-12">
                                <select class="form-select form-control" aria-label="Default select example" name="id_vendor" id="id_vendor">
                                @foreach($vendor as $data)
                                    <option value="<?=$data['id_vendor']?>"><?=$data['nama_vendor']?></option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label">Tambah Biaya</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="tambah_biaya" name="tambah_biaya" onkeydown="return numbersonly(this, event);" onkeyup="PemisahTitik(this)"  required>
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan"  required>
                                </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Post
                         </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">

    $(function () {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,
          ajax: "{{ url('jalandarat/order') }}",
          columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_pelanggan', name: 'nama_pelanggan'},
                {data: 'no_hp_pelanggan', name: 'no_hp_pelanggan'},
                {data: 'asal', name: 'asal'},
                {data: 'tujuan', name: 'tujuan'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'jam', name: 'jam'},
                {data: 'total_harga', render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp.')},
                {data: 'jumlah_penumpang', name: 'jumlah_penumpang'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       
      $('body').on('click', '.editOrder', function () {
        var id = $(this).data('id');
      //   document.getElementById('laravel-ajax-file-upload').id = 'two';
      $.get("{{ url('jalandarat/order/edit') }}" +'/' + id , function (data) {
            $('#modelHeading').html("Edit Data Order");
            $('#savedata').val("edit-order");
            $('#ajaxModelexa').modal('show');
            $('#id').val(data.id_order);
            $('#id_jadwal').val(data.id_jadwal);
            $('#nama_pelanggan').val(data.nama_pelanggan);
            $('#no_hp_pelanggan').val(data.no_hp_pelanggan);
            $('#jumlah_penumpang').val(data.jumlah_penumpang);
            $('#asal').val(data.asal);
            $('#tujan').val(data.tujan);
            $('#tanggal').val(data.tanggal);
            $('#tujuan_detail').val(data.tujuan_detail);
            $('#asal_detail').val(data.asal_detail);
            $('#jam').val(data.jam);
            $('#harga').val(data.harga);
            $('#modal').val(data.modal);
            $('#laba').val(data.laba);
            $('#total_harga').val(data.total_harga);
            $('#total_modal').val(data.total_modal);
            $('#total_laba').val(data.total_laba);
            $('#email').val(data.email);
            $('#alamat').val(data.alamat);
            $('#keterangan').val(data.keterangan);
            $('#tambah_biaya').val(data.tambah_biaya);
            $('#status').val(data.status);
            $('#id_vendor').val(data.id_vendor);
        })
     });
      
      $('#savedata').click(function (e) {
            var harga = document.getElementById('harga').value;
            var modal = document.getElementById('modal').value;
            var laba = document.getElementById('laba').value;
            harga = harga.split('.').join('');
            modal = modal.split('.').join('');
            laba = laba.split('.').join('');
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
          e.preventDefault();
          $(this).html('Sending..');
      
          $.ajax({
            data: $('#laravel-ajax-file-upload').serialize(),
            url: "{{ url('jalandarat/order/tambah') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
       
                $('#laravel-ajax-file-upload').trigger("reset");
                $('#ajaxModelexa').modal('hide');
                table.draw();
           
            },
            error: function (data) {
                console.log('Error:', data);
                $('#savedata').html('Save Changes');
            }
        });
      });
      
      $('body').on('click', '.deleteOrder', function () {
       
          var id = $(this).data("id");
          confirm("Are You sure want to delete this Post!");
        
          $.ajax({
              type: "GET",
              url: "{{ url('jalandarat/order/hapus') }}"+'/'+id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });
       
    });
    function PemisahTitik(b){
        var txtFirstNumberValue = document.getElementById('harga').value;
        var txtSecondNumberValue = document.getElementById('modal').value;
        txtFirstNumberValue = txtFirstNumberValue.split('.').join('');
        txtSecondNumberValue = txtSecondNumberValue.split('.').join('');
        var result = Number(txtFirstNumberValue) - Number(txtSecondNumberValue);
        
        if (!isNaN(result)) {
            document.getElementById('laba').value = convertRupiah(result.toString());
        }
    }

    function convertRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split  = number_string.split(","),
    sisa   = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
 
	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}
 
	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
    }
  </script>
@endsection
