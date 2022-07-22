<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{ url('penawaran/simpan_detail') }}" class="parsley-examples" id="examples" method="POST">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Detail Penawaran</h4>
                <input type="hidden" name="id" id="id" value="{{$id}}">
                <input type="hidden" name="id_penawaran" id="id_penawaran" value="{{$id_penawaran}}">
            </div>
            <div class="modal-body">
                <table class="table">
                <thead>
                    <tr>
                        <td style="width: 50%"><input class="form-control input-sm" value="Total" readonly></td>
                        <td style="width: 50%" colspan="2"><input class="form-control input-sm" name="total" id="total" data-cell="Z1" data-format="0,0" data-formula="sum(A1)"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%"><label>Destinasi</label></td>
                        <td style="width: 45%" class="text-center"><label>HTM</label></td>
                        <td style="width: 5%" class="text-center"><label>Action</label></td>
                    </tr>
                </thead>
                <tbody id="add">
                    <tr>
                        <td>
                            <select name="des[]" id="destinasi" class="form-control" onchange="getComboA(this,1)">
                                <option>--- Pilih Destinasi ---</option>
                                @foreach($data as $a)
                                    <option value="{{$a->id_item}}">{{$a->nama_item}}</option>
                                @endforeach
                            </select>                            
                        </td>                        
                        <td>
                            <input class="form-control" name="harga[]" id="des1" data-cell="A1" data-format="0,0" value="0">
                        </td>
                        <td class="text-center"><button class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></button></td>

                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-sm btn-primary" onclick="adddes()">Tambah</button>
                        </td>
                    </tr>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" id="keluar">Keluar</button>
                <button type="submit" class="btn btn-info waves-effect waves-light" id="savedata">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>

    $form1 = $('#examples').calx();
    var no =2;

    function getComboA(selectObject,i) {
        var value = selectObject.value;  
        
        jQuery.ajax({
            type: 'GET',
            url: '{{ url("penawaran/get-harga-item") }}/'+value,
            success: function(result) {
                $form1.calx('setValue', "A"+i, result.harga)
            }
        });
    }

    function adddes() {
        $("#add").append(
            '<tr>\
                <td>\
                    <select name="des[]" id="destinasi" class="form-control input-sm" onchange="getComboA(this,'+no+')">\
                        <option>--- Pilih Destinasi ---</option>\
                            @foreach($data as $a)\
                                <option value="{{$a->id_item}}">{{$a->nama_item}}</option>\
                            @endforeach\
                    </select>\
                </td>\
                <td>\
                    <input class="form-control" name="harga[]" id="des1" data-cell="A'+no+'" data-format="0,0" value="0">\
                </td>\
                <td class="text-center"><button class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></button></td>\
            </tr>'
        );
        no++;
        $form1.calx('update');
        $form1.calx('getCell', 'Z1').setFormula('SUM(A1:A'+no+')');
    }

    $('#add').on('click', '.btn-remove', function(){
        $(this).parent().parent().remove();
        $form1.calx('update');
        $form1.calx('getCell', 'Z1').calculate();
    });

    $('#keluar').click(function (e) {
        e.preventDefault();
        $('#examples').trigger("reset");
        $('#con-close-modal').modal('hide');
    }); 

    $('#savedata').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        var id = $('#id').val();
        var total = $('#total').val();
    
        $.ajax({
          data: $('#examples').serialize(),
          url: "{{ url('penawaran/simpan_detail') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#examples').trigger("reset");
              $('#con-close-modal').modal('hide');
            $form1.calx('setValue', "E"+id, total)
            $form1.calx('setValue', "H"+id, total)

          },
          error: function (data) {
              console.log('Error:', data);
              $('#savedata').html('Save Changes');
          }
      });
    }); 
</script>