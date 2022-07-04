
@extends('template')

@section('container')
<section class="py-5 reservasi-section mb-5 bg-info">
    <div class="container">
        <div class="row ">
            <div class="col-12 text-center">
                
                <h1 class="title-reservasi">Pesan Tiket Travel JATIM !</h1>
            </div>
            
            <div class="card">
                <div class="card-body bg-light">
                    <form class="form-group row" method=POST" action="{{url('jalandarat/pilihJadwal')}}">
                        @csrf
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Berangkat dari</label>
                            <select class="form-select" aria-label="Default select example" name="asal">
                                @foreach($kota as $data)
                                        <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">Tujuan Ke</label>
                            <select class="form-select" aria-label="Default select example" name="tujuan">
                                @foreach($kota as $data)
                                        <option value="<?=$data['id_kota']?>"><?=$data['nama_kota']?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="pilihTanggal" class="form-label">Pilih Tanggal</label>
                            <input type="date" class="form-control" id="pilihTangal" name="tanggal">
                        </div>
                        <div class="col-2">
                            <label for="exampleFormControlInput1" class="form-label">Jumlah Penumpang</label>
                            <select class="form-select" aria-label="Default select example" name="jumlah_penumpang">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-1 form-group">
                            <br>
                            <button type="submit" class="btn btn-success" href="{{url('pilihJadwal')}}">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>	
</section>	

<section class="mb-5 container-slider-promo" >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="fs-18 mb-3 color-black font-weight-bold text-middle-spacing"><img src="https://baraya-travel.com/css/baraya_/images/fire.svg" class="pr-3">Spesial Hari Ini </p>
            </div>
        </div>
    </div>
    <div class="container px-sm-3 px-0">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">1</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">2</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">3</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">4</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="row">
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">5</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">6</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">7</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                          <h5 class="card-title">Card title</h5>
                                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                          <a href="#" class="card-link">Card link</a>
                                          <a href="#" class="card-link">Another link</a>
                                        </div>
                                      </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container px-sm-3 px-0">
        <div class="row mx-0">
            <div class="col-12 slider-promo px-0">
                    
            </div>
            <form id="promoForm" action="https://baraya-travel.com/book/pemesan" method="POST">
                <input type="hidden" name="_token" value="0p8jUBF1zON8x0KDO9BVaagGuZkvzeuTGkzCESRQ">
                <input type="hidden" name="idJadwalPromo" value="">
                <input type="hidden" name="route" value="beranda">
            </form>
        </div>
        <div class="d-none d-md-flex w-100" style="z-index: 0">
            <i id="prev-slider-promo" class="fs-24 pointer fa fa-chevron-circle-left mr-auto pl-3"></i>
            <i id="next-slider-promo" class="fs-24 pointer fa fa-chevron-circle-right ml-auto pr-2"></i>
        </div>
    </div>
</section>
@endsection