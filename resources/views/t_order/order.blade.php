@extends('layouts.index')

@section( 'content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
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
                {data: 'total_harga', name: 'total_harga'},
                {data: 'jumlah_penumpang', name: 'jumlah_penumpang'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       
      
      
      $('body').on('click', '.deleteJadwal', function () {
       
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
    
  </script>
@endsection
