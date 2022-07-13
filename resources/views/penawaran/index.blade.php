@extends('template2')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Penawaran</h1>
</div>
<form class="form-horizontal" id="dynamic">
    <input type="hidden" name="id" id="id" value="{{$id}}">
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 50%"><label>Nama Item</label></td>
                        <td style="width: 25%" class="text-center"><label>Premium</label></td>
                        <td style="width: 25%" class="text-center"><label>Standard</label></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="form-control input-sm" value="Tamu" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A1" value="{{$penawaran->jumlah_peserta}}"></td>
                        <td><input class="form-control input-sm" data-cell="B1" data-formula="A1"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-sm" value="Guide" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A2" value="1"></td>
                        <td><input class="form-control input-sm" data-cell="B2" value="0"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-sm" value="Dokumentasi" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A3" value="1"></td>
                        <td><input class="form-control input-sm" data-cell="B3" value="0"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-sm" value="Jumlah Hari" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A4" value="{{$penawaran->durasi_hari}}"></td>
                        <td><input class="form-control input-sm" data-cell="B4" data-formula="A4"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-sm" value="Jumlah Malam" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A5" value="{{$penawaran->durasi_malam}}"></td>
                        <td><input class="form-control input-sm" data-cell="B5" data-formula="A5"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control input-sm" value="Jumlah Kamar" readonly></td>
                        <td><input class="form-control input-sm" data-cell="A6" data-formula="ROUNDUP((A1/2)+((A2+A3)/2),0)"></td>
                        <td><input class="form-control input-sm" data-cell="B6" data-formula="ROUNDUP((B1/2)+((B2+B3)/2),0)"></td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-control input-sm" value="Jumlah Peserta" readonly>
                        </td>
                        <td><input class="form-control input-sm" data-cell="A7" data-formula="A1+A2+A3"></td>
                        <td><input class="form-control input-sm" data-cell="B7" data-formula="B1+B2+B3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <td colspan="2" class="text-center"><label>Item</label></td>
                        <td colspan="3" class="text-center"><label>Premium</label></td>
                        <td colspan="3" class="text-center"><label>Standard</label></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="width: 15%">Kategori</td>
                        <td class="text-center" style="width: 15%">Nama</td>
                        <td class="text-center" style="width: 12%">Qty</td>
                        <td class="text-center" style="width: 12%">Harga</td>
                        <td class="text-center" style="width: 11%">Sub Total</td>
                        <td class="text-center" style="width: 12%">Qty</td>
                        <td class="text-center" style="width: 12%">Harga</td>
                        <td class="text-center" style="width: 12%">Sub Total</td>
                    </tr>
                </thead>
                <tbody id="list_kategori">
                    @foreach($data as $key => $a)
                    <tr>
                        <td id="kate{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input class="form-control input-sm" value="{{$a->nama}}" name="kategori[]">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="addKat({{$a->id_kategori}})">+</button>
                                </div>
                            </div>
                        </td>
                        <td id="nama{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input class="form-control input-sm">
                            </div>
                        </td>
                        <td id="QtyP{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="AngkaQtyP{{++$key}}" data-cell="D{{$key}}">
                                <input type="text" class="form-control" id="FormulaQtyP{{$key}}" value="">
                                <input type="hidden" data-cell="DD{{$key}}" id="totforQtyP{{$key}}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Angka({{$key}},'QtyP','D')">Angka</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Formula({{$key}},'QtyP','D')">Formula</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="detail({{$a->id_kategori}})">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td id="hargaP{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="AngkaHargaP{{$key}}" data-cell="E{{$key}}" data-format="0,0">
                                <input type="text" class="form-control" id="FormulaHargaP{{$key}}" value="">
                                <input type="hidden" data-cell="EE{{$key}}" id="totforHargaP{{$key}}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Angka({{$key}},'HargaP','E')">Angka</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Formula({{$key}},'HargaP','E')">Formula</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="detail({{$a->id_kategori}})">Detail</a>
                                    </div>
                                </div>
                            </div></td>
                        <td id="subP{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input class="form-control input-sm" data-cell="F{{$key}}" data-formula="D{{$key}}*E{{$key}}" data-format="0,0">
                            </div>
                        </td>
                        <td id="QtyS{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="AngkaQtyS{{$key}}" data-cell="G{{$key}}">
                                <input type="text" class="form-control" id="FormulaQtyS{{$key}}" value="">
                                <input type="hidden" data-cell="GG{{$key}}" id="totforQtyS{{$key}}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Angka({{$key}},'QtyS','G')">Angka</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Formula({{$key}},'QtyS','G')">Formula</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="detail({{$a->id_kategori}})">Detail</a>
                                    </div>
                                </div>
                            </div></td>
                        <td id="hargaS{{$a->id_kategori}}">
                            <div class="input-group mb-3">                                
                                <input type="text" class="form-control" id="AngkaHargaS{{$key}}" data-cell="H{{$key}}" data-format="0,0">
                                <input type="text" class="form-control" id="FormulaHargaS{{$key}}" value="">
                                <input type="hidden" data-cell="HH{{$key}}" id="totforHargaS{{$key}}">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Angka({{$key}},'HargaS','H')">Angka</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="Formula({{$key}},'HargaS','H')">Formula</a>
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="detail({{$a->id_kategori}})">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td id="subS{{$a->id_kategori}}">
                            <div class="input-group mb-3">
                                <input class="form-control input-sm" data-cell="I{{$key}}" data-formula="G{{$key}}*H{{$key}}" data-format="0,0">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr style="margin-top:30px">
                        <!-- <button id="add_item" class="btn btn-sm btn-primary">Add Kategori</button> -->
                        <td colspan="4" class="text-right">
                            <label for="total">Total</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="xx1" data-formula="sum(F1:F6)" data-format="0,0">
                        </td>
                        <td>
                           
                        </td>
                        <td class="text-right">
                            <label for="total">Total</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="xx2" data-formula="sum(I1:I6)" data-format="0,0">
                        </td>
                    </tr>
                    <tr>
                        <!-- <button id="add_item" class="btn btn-sm btn-primary">Add Kategori</button> -->
                        <td colspan="4" class="text-right">
                            <label for="total">Per Orang</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX3" data-formula="XX1/A1" data-format="0,0">
                        </td>
                        <td>
                           
                        </td>
                        <td class="text-right">
                            <label for="total">Per Orang</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX4" data-formula="XX2/B1" data-format="0,0">
                        </td>
                    </tr>
                    <tr style="margin-top:30px">
                        <!-- <button id="add_item" class="btn btn-sm btn-primary">Add Kategori</button> -->
                        <td colspan="4" class="text-right">
                            <label for="total">Pembulatan</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX5" data-formula="FLOOR(XX3,1000)+1000" data-format="0,0">
                        </td>
                        <td>
                           
                        </td>
                        <td class="text-right">
                            <label for="total">Pembulatan</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX6" data-formula="FLOOR(XX4,1000)+1000" data-format="0,0">
                        </td>
                    </tr>
                    <tr>
                        <!-- <button id="add_item" class="btn btn-sm btn-primary">Add Kategori</button> -->
                        <td colspan="4" class="text-right">
                            <label for="total">Total</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX7" data-formula="XX5*A1" data-format="0,0">
                        </td>
                        <td>
                           
                        </td>
                        <td class="text-right">
                            <label for="total">Total</label>
                        </td>
                        <td>
                            <input class="form-control input-sm" data-cell="XX8" data-formula="XX6*B1" data-format="0,0">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</form>

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" class="parsley-examples" id="examples" method="POST">
            @csrf
            <div class="modal-header">
                <h4 class="modal-title">Detail Penawaran</h4>
                <input type="hidden" name="id" id="id">
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
                            <select name="des[]" id="destinasi" class="form-control destinasi" onchange="getComboA(this,1)">
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
                            <button type="button" class="btn btn-sm btn-primary" id="addDES">Tambah</button>
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
    $form1      = $('#examples').calx();
    $form       = $('#dynamic').calx();
    $sheet      = $form.calx('getSheet');
    $itemlist   = $('#list_kategori');
    $counter    = 0;
    var id = $('#id').val();
    var elements = document.getElementsByName("kategori[]");
    var cells   = elements.length+1;
    var no =2;

    $( document ).ready(function() {
        for (let index = 1; index < cells; index++) {
            document.getElementById("FormulaQtyP"+index).style.display = "none";
            document.getElementById("FormulaHargaP"+index).style.display = "none";
            document.getElementById("FormulaQtyS"+index).style.display = "none";
            document.getElementById("FormulaHargaS"+index).style.display = "none";
        }
    });

    function addKat(i) {
        $("#kate"+i).append(
            '<div class="input-group float-right mb-3" id="addKate'+cells+'">\
                <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteAdd('+cells+')"><i class="fa fa-times fa-fw"></i></a>\
            </div>'
        );
        $("#nama"+i).append(
            '<div class="input-group mb-3" id="addNama'+cells+'">\
                <input class="form-control input-sm">\
            </div>'
        );
        $("#subP"+i).append(
            '<div class="input-group mb-3" id="addSubP'+cells+'">\
                <input class="form-control input-sm" data-cell="F'+cells+'" data-format="0,0" data-formula="D'+cells+'*E'+cells+'">\
            </div>'
        );
        $("#subS"+i).append(
            '<div class="input-group mb-3" id="addSubS'+cells+'">\
                <input class="form-control input-sm" data-cell="I'+cells+'" data-format="0,0" data-formula="G'+cells+'*H'+cells+'">\
            </div>'
        );
        $("#QtyP"+i).append(
          '<div class="input-group mb-3" id="addQtyP'+cells+'">\
            <input type="text" class="form-control" id="AngkaQtyP'+cells+'" data-cell="D'+cells+'">\
            <input type="text" class="form-control" id="FormulaQtyP'+cells+'" value="" style="display: none;">\
            <input type="hidden" data-cell="DD'+cells+'" id="totforQtyP'+cells+'">\
            <div class="input-group-append">\
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddAngka('+cells+','+1+','+4+')">Angka</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddFormula('+cells+','+1+','+4+')">Formula</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="detail('+id+')">Detail</a>\
                </div>\
            </div>\
        </div>'
        );
        $("#QtyS"+i).append(
          '<div class="input-group mb-3" id="addQtyS'+cells+'">\
            <input type="text" class="form-control" id="AngkaQtyS'+cells+'" data-cell="G'+cells+'">\
            <input type="text" class="form-control" id="FormulaQtyS'+cells+'" value="" style="display: none;">\
            <input type="hidden" data-cell="GG'+cells+'" id="totforQtyS'+cells+'">\
            <div class="input-group-append">\
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddAngka('+cells+','+3+','+6+')">Angka</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddFormula('+cells+','+3+','+6+')">Formula</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="detail('+id+')">Detail</a>\
                </div>\
            </div>\
        </div>'
        );      
        $("#hargaP"+i).append(
          '<div class="input-group mb-3" id="addHargaP'+cells+'">\
            <input type="text" class="form-control" id="AngkaHargaP'+cells+'" data-cell="E'+cells+'" data-format="0,0">\
            <input type="text" class="form-control" id="FormulaHargaP'+cells+'" value="" style="display: none;">\
            <input type="hidden" data-cell="EE'+cells+'" id="totforHargaP'+cells+'">\
            <div class="input-group-append">\
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddAngka('+cells+','+2+','+5+')">Angka</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddFormula('+cells+','+2+','+5+')">Formula</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="detail('+id+')">Detail</a>\
                </div>\
            </div>\
        </div>'
        );        
        $("#hargaS"+i).append(
          '<div class="input-group mb-3" id="addHargaS'+cells+'">\
            <input type="text" class="form-control" id="AngkaHargaS'+cells+'" data-cell="H'+cells+'" data-format="0,0">\
            <input type="text" class="form-control" id="FormulaHargaS'+cells+'" value="" style="display: none;">\
            <input type="hidden" data-cell="HH'+cells+'" id="totforHargaS'+cells+'">\
            <div class="input-group-append">\
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>\
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddAngka('+cells+','+4+','+7+')">Angka</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="AddFormula('+cells+','+4+','+7+')">Formula</a>\
                    <a class="dropdown-item" href="javascript:void(0)" onclick="detail('+id+')">Detail</a>\
                </div>\
            </div>\
        </div>'
        );          
        cells++;
        $form.calx('update');
        $form.calx('getCell', 'xx1').setFormula('SUM(F1:F'+cells+')');
        $form.calx('getCell', 'xx2').setFormula('SUM(I1:I'+cells+')');

    } 
    function deleteAdd(i) {
        // $("#addBaru"+i).remove();
        document.getElementById("addKate"+i).remove();
        document.getElementById("addNama"+i).remove();
        document.getElementById("addQtyP"+i).remove();
        document.getElementById("addQtyS"+i).remove();
        document.getElementById("addSubP"+i).remove();
        document.getElementById("addSubS"+i).remove();
        document.getElementById("addHargaP"+i).remove();
        document.getElementById("addHargaS"+i).remove();
        $form.calx('update');
        $form.calx('getCell', 'XX1').calculate();
        $form.calx('getCell', 'XX2').calculate();
        $form.calx('getCell', 'XX3').calculate();
        $form.calx('getCell', 'XX4').calculate();
        $form.calx('getCell', 'XX5').calculate();
        $form.calx('getCell', 'XX6').calculate();
        $form.calx('getCell', 'XX7').calculate();
        $form.calx('getCell', 'XX8').calculate();
    }
    $('#cls').click(function(e){
        $('#exampleModal').modal('hide');
    });
    
    function Formula(i,j,k) {
        document.getElementById("Formula"+j+i).style.display = "block";
        document.getElementById("Angka"+j+i).style.display = "none";        
        var input = document.getElementById("Formula"+j+i);

            input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                $sheet.getCell(k+k+i).setFormula($('#Formula'+j+i).val()).calculate();
                $form.calx('setValue', k+i, $('#totfor'+j+i).val())
                document.getElementById("Formula"+j+i).style.display = "none";
                document.getElementById("Angka"+j+i).style.display = "block"; 
            }
            });
    }
    function Angka(i,j,k) {
        document.getElementById("Formula"+j+i).style.display = "none";
        document.getElementById("Angka"+j+i).style.display = "block";
    }

    function AddFormula(i,j,k) {
        if (j==1) {
            j="QtyP";
        }else if(j==2){
            j="HargaP";
        }else if(j==3){
            j="QtyS";
        }else{
            j="HargaS";
        }

        if (k==4) {
            k="D";
        }else if(k==5){
            k="E";
        }else if(k==6){
            k="G";
        }else{
            k="H";
        }
        document.getElementById("Formula"+j+i).style.display = "block";
        document.getElementById("Angka"+j+i).style.display = "none";        
        var input = document.getElementById("Formula"+j+i);

            input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                $sheet.getCell(k+k+i).setFormula($('#Formula'+j+i).val()).calculate();
                $form.calx('setValue', k+i, $('#totfor'+j+i).val())
                document.getElementById("Formula"+j+i).style.display = "none";
                document.getElementById("Angka"+j+i).style.display = "block"; 
            }
            });
    }
    function AddAngka(i,j,k) {
        if (j==1) {
            j="QtyP";
        }else if(j==2){
            j="HargaP";
        }else if(j==3){
            j="QtyS";
        }else{
            j="HargaS";
        }

        if (k==4) {
            k="D";
        }else if(k==5){
            k="E";
        }else if(k==6){
            k="G";
        }else{
            k="H";
        }
        document.getElementById("Formula"+j+i).style.display = "none";
        document.getElementById("Angka"+j+i).style.display = "block";
    }

    function detail(i) {
        var id = $('#id').val();
        $.get("{{ url('penawaran/modal') }}"+'/'+i+'/'+id, function (data) {
            // $('body').append(data);                    
            $('#con-close-modal').modal('show');
                if (data['sub_detail']) {
                    $('#add').html(detailFunction(data['sub_detail'],data['item']));                
                }else{
                    $('.destinasi').html(myFunction(data['item']));
                }
            document.getElementById("addDES").setAttribute("onclick", "adddes("+i+")");
            $('#id').val(i); 
        })
    }

    function myFunction(data) {
        let text = "<option>--- Pilih ---</option>";
        for (const element of data) {
            text +="<option value='"+element.id_item+"'>"+element.nama_item + "</option>"; 
        }
        return text;
    }

    function detailFunction(data,item) {
        let text = "";
        for (const ele of data) {
            text +='<tr>\
                        <td>\
                            <select name="des[]" id="destinasi" class="form-control destinasi" onchange="getComboA(this,1)">'
                            for (const element of item) {
                                text +="<option value='"+element.id_item+"'>"+element.nama_item + "</option>"; 
                            }
                            '</select>\
                        </td>\
                        <td>\
                            <input class="form-control" name="harga[]" id="des1" data-cell="A1" data-format="0,0" value="0">\
                        </td>\
                        <td class="text-center"><button class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></button></td>\
                    </tr>';
        }
        return text;
    }

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
    
    function adddes(i) {
        var id = $('#id').val();
        $.get("{{ url('penawaran/modal') }}"+'/'+i+'/'+id, function (data) {
            $("#add").append(
                '<tr>\
                    <td>\
                        <select name="des[]" id="destinasi'+no+'" class="form-control destinasi" onchange="getComboA(this,'+no+')">\
                        </select>\
                    </td>\
                    <td>\
                        <input class="form-control" name="harga[]" id="des1" data-cell="A'+no+'" data-format="0,0" value="0">\
                    </td>\
                    <td class="text-center"><button class="btn-remove btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></button></td>\
                </tr>'
            );
            $('#destinasi'+no+'').html(myFunction(data['item']));            
        $form1.calx('update');
        $form1.calx('getCell', 'Z1').setFormula('SUM(A1:A'+no+')');
        no++;
        })
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
        var total = $('#total').val();
        var id = $('#id').val();
        $('#examples').trigger("reset");
        $('#con-close-modal').modal('hide');
        $form.calx('setValue', "E"+id, total)
        $form.calx('setValue', "H"+id, total)
    }); 

</script>
@endsection
