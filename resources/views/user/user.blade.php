@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    <a class="btn btn-info" href="javascript:void(0)" id="createNewPost"> Add New Post</a>
</div>
    <div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Level</th>
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
                <form id="postForm" name="postForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                   @csrf
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" required>
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="Email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-12">
                            <select name="level" id="level" class="form-control">
                                <option>---Pilih Level</option>
                                <option value="0">Admin</option>
                                <option value="1">User</option>
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
        ajax: "{{ route('user.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {
                data: 'level', 
                name: 'level',
                render: function(data, type, row ) { 
                if(data == 0) {
                  return 'admin'
                }
                else {
                  return 'user'
                }
              }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewPost').click(function () {
        $('#savedata').val("create-post");
        $('#id').val('');
        $('#postForm').trigger("reset");
        $('#modelHeading').html("Create User");
        $('#ajaxModelexa').modal('show');
    });
    
    $('body').on('click', '.editUser', function () {
      var id = $(this).data('id');
      $.get("{{ route('user.index') }}" +'/' + id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#savedata').val("edit-user");
          $('#ajaxModelexa').modal('show');
          $('#id').val(data.id);
          $('#level').val(data.level).change();
          $('#email').val(data.email);
          $('#name').val(data.name);
      })
   });
    
    $('#savedata').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('user.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#postForm').trigger("reset");
              $('#ajaxModelexa').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#savedata').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteUser', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete this Post!");
      
        $.ajax({
            type: "GET",
            url: "{{ url('user-destroy') }}"+'/'+id,
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