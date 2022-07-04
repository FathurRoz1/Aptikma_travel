@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Bank</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Add New Bank</a>
</div>
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Atas Nama</th>
                <th>logo</th>
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
                        <label class="col-sm-6 control-label">Nama Bank</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_bank" name="nama_bank" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">No Rekening</label>
                        <div class="col-sm-12">
                            <input type="Number" class="form-control" id="no_rekening" name="no_rekening" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Atas Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="atas_nama" name="atas_nama" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" id="logo" name="logo" required>
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
          ajax: "{{ url('jalandarat/bank') }}",
          columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_bank', name: 'nama_bank'},
                {data: 'no_rekening', name: 'no_rekening'},
                {data: 'atas_nama', name: 'atas_nama'},
                {data: 'logo', name: 'logo'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       
      $('#createNewPost').click(function () {
          $('#savedata').val("create-post");
          $('#id').val('');
          $('#laravel-ajax-file-upload').trigger("reset");
          $('#modelHeading').html("Tambahkan Data Bank");
          $('#ajaxModelexa').modal('show');
      });
      
      $('body').on('click', '.editBank', function () {
        var id = $(this).data('id');
      //   document.getElementById('laravel-ajax-file-upload').id = 'two';
      $.get("{{ url('jalandarat/bank/edit') }}" +'/' + id , function (data) {
            $('#modelHeading').html("Edit Data Bank");
            $('#savedata').val("edit-kota");
            $('#ajaxModelexa').modal('show');
            $('#id').val(data.id_bank);
            $('#nama_bank').val(data.nama_bank);
            $('#no_rekening').val(data.no_rekening);
            $('#atas_nama').val(data.atas_nama);
            $('#logo').val(data.logo);
            
        })
     });
      
     $('#laravel-ajax-file-upload').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#savedata').html('Sending..');

        $.ajax({
        type:'POST',
        url: "{{ url('jalandarat/bank/tambah') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            this.reset();
            $('#ajaxModelexa').modal('hide');
            table.draw();
            // console.log(data);
        },
        error: function(data){
            console.log('Error:', data);
            alert("Gagal Tambah data")
            $('#savedata').html('Save Changes');
        }
        });
    });
      
      $('body').on('click', '.deleteBank', function () {
       
          var id = $(this).data("id");
          confirm("Are You sure want to delete this Post!");
        
          $.ajax({
              type: "GET",
              url: "{{ url('jalandarat/bank/hapus') }}"+'/'+id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
      });
       
    });
  </script>
@endsection
