<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template/customcss/bank_pembayaran.css')}}">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="row justify-content-center bungkus mx-auto" >
        <div class="col-12 col-md-4 px-0 shadow">
            <div class="header">
                <h4></h4>
            </div>
            <div class="container">
                <div class="card" style="margin-top: 1.5rem;">
                    <div class="card-body">
                        <div class="row batas-pembayaran">
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                  </svg>
                            </div>
                            <div class="col-11">
                                <p style="font-size: 90%;">Selesaikan pembayaran sebelum <br>
                                    <b>05:32</b></p>
                                
                                <p style="font-size: 90%;">Selesaikan pembayaran dalam 60 menit</p>
                            </div>
                            <hr>
                            <div class="col-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                                  </svg>
                            </div>
                            <div class="col-11">
                                <div class="row">
                                    <div class="col-9">
                                        <p style="font-size: 90%;">Mohon Transfer ke <br>
                                            {{ $bank->atas_nama }}
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <img src="/logo_bank/{{$bank->logo}}" alt="" style="width: 100%;">
                                    </div>
                                    <div class="col-12 bg-light">
                                        <input type="text" value="{{ $bank->no_rekening }}"  class="bg-light input-control" id="rekening" readonly>
                                        <a id="rekeningBtn" style="text-decoration:none; color: #0064D2">Salin</a>
                                    </div>
                                    <span style="font-weight: 300;">Jumlah yang harus dibayar</span>
                                    <div class="col-12 bg-light">
                                        <input type="text" value=" {{($total_harga)}}"  id="harga-hiden" style="display: none">

                                        <input type="text" value="Rp. {{number_format($total_harga)}}"  class="bg-light input-control" id="harga" readonly>
                                        <a id="hargaBtn" style="text-decoration:none; color: #0064D2" \>Salin</a>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                </div><br>
                <b>Sudah Menyelesaikan Transaksi?</b>
                <div class="card">
                    <div class="card-body">
                        <p style="font-size: 90%;">Jika anda sudah melakukan transfer, silahkan klik tombol WA dibawah untuk konfirmasi</p>
                        <p style="font-size: 90%;">Jika anda ingin membayar secara cash/tunai, silahkan klik tombol WA dibawah untuk dilakukan verifikasi oleh admin</p>
                    </div>
                </div>
                <a class="btn whatsapp"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg> Konfirmasi</a>
                <a href="{{ url('jalandarat') }}" class="btn kembali">Kembali</a>
                
            </div>
            <!-- Navbar Bawah -->
            
            <!-- Akhir Navbar Bawah -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // jquery selector : id, class, atributte
        const hargaBtn = document.getElementById('hargaBtn')
        const harga = document.getElementById('harga-hiden')
        const rekeningBtn = document.getElementById('rekeningBtn')
        const rekening = document.getElementById('rekening')
        
        hargaBtn.onclick = () => {
            harga.select();    // Selects the text inside the input
            document.execCommand('copy');    // Simply copies the selected text to clipboard 
             Swal.fire({         //displays a pop up with sweetalert
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 1000
            });
        }
        rekeningBtn.onclick = () => {
            rekening.select();    // Selects the text inside the input
            document.execCommand('copy');    // Simply copies the selected text to clipboard 
             Swal.fire({         //displays a pop up with sweetalert
                icon: 'success',
                title: 'Text copied to clipboard',
                showConfirmButton: false,
                timer: 1000
            });
        }
    </script>
  </body>
</html>

    