@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Add New Jadwal</a>
</div>
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Asal</th>
                <th>Tujuan </th>
                <th>Titik Kumpul</th>
                <th>Jam</th>
                <th>Harga</th>
                <th>Modal</th>
                <th>Laba</th>
                <th>Vendor</th>
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
                   @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Asal</label>
                        <div class="col-sm-12">
                            <select class="form-select form-control" aria-label="Default select example" name="asal" id="asal">
                                @foreach($kota as $data)
                                    <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-12">
                            <select class="form-select form-control" aria-label="Default select example" name="tujuan" id="tujuan">
                                @foreach($kota as $data)
                                    <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-6 control-label">Titik Kumpul</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="titik_kumpul" name="titik_kumpul" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jam</label>
                        <div class="col-sm-12">
                            <input type="time" class="form-control" id="jam" name="jam"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Harga</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control numeric" id="harga" name="harga"  onkeydown="return numbersonly(this, event);" onkeyup="PemisahTitik(this);" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Modal</label>
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
          ajax: "{{ url('jalandarat/jadwal') }}",
          columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'asal', name: 'asal'},
                {data: 'tujuan', name: 'tujuan'},
                {data: 'titik_kumpul', name: 'titik_kumpul'},
                {data: 'jam', name: 'jam'},
                {data: 'harga', name: 'harga'},
                {data: 'modal', name: 'modal'},
                {data: 'laba', name: 'laba'},
                {data: 'nama_vendor', name: 'nama_vendor'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       
      $('#createNewPost').click(function () {
          $('#savedata').val("create-post");
          $('#id').val('');
          $('#laravel-ajax-file-upload').trigger("reset");
          $('#modelHeading').html("Tambahkan Data Jadwal");
          $('#ajaxModelexa').modal('show');
      });
      
      $('body').on('click', '.editJadwal', function () {
        var id = $(this).data('id');
      //   document.getElementById('laravel-ajax-file-upload').id = 'two';
      $.get("{{ url('jalandarat/jadwal/edit') }}" +'/' + id , function (data) {
            $('#modelHeading').html("Edit Data Jadwal");
            $('#savedata').val("edit-kota");
            $('#ajaxModelexa').modal('show');
            $('#id').val(data.id_jadwal);
            $('#asal').val(data.asal);
            $('#tujan').val(data.tujan);
            $('#titik_kumpul').val(data.titik_kumpul);
            $('#jam').val(data.jam);
            $('#harga').val(data.harga);
            $('#modal').val(data.modal);
            $('#laba').val(data.laba);
            $('#id_vendor').val(data.id_vendor);
            
        })
     });
      
      $('#savedata').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');
      
          $.ajax({
            data: $('#laravel-ajax-file-upload').serialize(),
            url: "{{ url('jalandarat/jadwal/tambah') }}",
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
      
      $('body').on('click', '.deleteJadwal', function () {
       
          var id = $(this).data("id");
          confirm("Are You sure want to delete this Post!");
        
          $.ajax({
              type: "GET",
              url: "{{ url('jalandarat/jadwal/hapus') }}"+'/'+id,
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
