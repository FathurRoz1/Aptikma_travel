
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
    <div class="container">
        <div class="row ">
            <div class="col-12 ">
                
                <h4>Pembayaran </h4>
				<h5 class="mb-4">Silahkan pilih metoda pembayaran</h5>
            </div>
            
            <div class="card">
                <div class="card-body bg-light">
                    <form class="form-group row ">
                        <h6>Pembayaran Instan</h6>
                        <div class="col-3">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 py-2">
                                <div class="custom-control custom-radio" onclick="payment('gopay','0','Bulat')">
                                    <input  data-toggle="collapse" data-target="#collapsegopay" aria-expanded="true" aria-controls="gopay" type="radio" value="gopay" id="gopay" name="payment" class="custom-control-input">
                                    <label data-toggle="tooltip" data-placement="top" title="GO-PAY" data-original-title="" class="custom-control-label" for="gopay"><img class="pr-2" src="https://payment.tiketux.com/image/payment/gopay.png" width="100px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 py-2">
                                <div class="custom-control custom-radio" onclick="payment('gopay','0','Bulat')">
                                    <input  data-toggle="collapse" data-target="#collapsegopay" aria-expanded="true" aria-controls="gopay" type="radio" value="gopay" id="gopay" name="payment" class="custom-control-input">
                                    <label data-toggle="tooltip" data-placement="top" title="GO-PAY" data-original-title="" class="custom-control-label" for="gopay"><img class="pr-2" src="https://payment.tiketux.com/image/payment/gopay.png" width="100px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 py-2">
                                <div class="custom-control custom-radio" onclick="payment('gopay','0','Bulat')">
                                    <input  data-toggle="collapse" data-target="#collapsegopay" aria-expanded="true" aria-controls="gopay" type="radio" value="gopay" id="gopay" name="payment" class="custom-control-input">
                                    <label data-toggle="tooltip" data-placement="top" title="GO-PAY" data-original-title="" class="custom-control-label" for="gopay"><img class="pr-2" src="https://payment.tiketux.com/image/payment/gopay.png" width="100px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 py-2">
                                <div class="custom-control custom-radio" onclick="payment('gopay','0','Bulat')">
                                    <input  data-toggle="collapse" data-target="#collapsegopay" aria-expanded="true" aria-controls="gopay" type="radio" value="gopay" id="gopay" name="payment" class="custom-control-input">
                                    <label data-toggle="tooltip" data-placement="top" title="GO-PAY" data-original-title="" class="custom-control-label" for="gopay"><img class="pr-2" src="https://payment.tiketux.com/image/payment/gopay.png" width="100px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 form-group">
                            <div class="col-6 col-sm-4 col-md-3 col-lg-2 py-2">
                                <div class="custom-control custom-radio" onclick="payment('gopay','0','Bulat')">
                                    <input  data-toggle="collapse" data-target="#collapsegopay" aria-expanded="true" aria-controls="gopay" type="radio" value="gopay" id="gopay" name="payment" class="custom-control-input">
                                    <label data-toggle="tooltip" data-placement="top" title="GO-PAY" data-original-title="" class="custom-control-label" for="gopay"><img class="pr-2" src="https://payment.tiketux.com/image/payment/gopay.png" width="100px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary">Selanjutnya</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
</section>


@endsection