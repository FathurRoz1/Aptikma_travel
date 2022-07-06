@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kota</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Add New Kota</a>
</div>
    <div class="table-responsive">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kota</th>

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
                        <label for="title" class="col-sm-6 control-label">Nama Kota</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Enter Name" value="" required>
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
        ajax: "{{ url('jalandarat/kota') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_kota', name: 'nama_kota'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewPost').click(function () {
        $('#savedata').val("create-post");
        $('#id').val('');
        $('#laravel-ajax-file-upload').trigger("reset");
        $('#modelHeading').html("Tambahkan Data Kota");
        $('#ajaxModelexa').modal('show');
    });
    
    $('body').on('click', '.editKota', function () {
      var id = $(this).data('id');
    //   document.getElementById('laravel-ajax-file-upload').id = 'two';
    $.get("{{ url('jalandarat/kota/edit') }}" +'/' + id , function (data) {
          $('#modelHeading').html("Edit Data Kota");
          $('#savedata').val("edit-kota");
          $('#ajaxModelexa').modal('show');
          $('#id').val(data.id_kota);
          $('#nama_kota').val(data.nama_kota);
          
      })
   });
    
    $('#savedata').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#laravel-ajax-file-upload').serialize(),
          url: "{{ url('jalandarat/kota/tambah') }}",
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
    
    $('body').on('click', '.deleteKota', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete this Post!");
      
        $.ajax({
            type: "GET",
            url: "{{ url('jalandarat/kota/hapus') }}"+'/'+id,
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
