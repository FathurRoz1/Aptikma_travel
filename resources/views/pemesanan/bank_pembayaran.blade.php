
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="qWsD0kE5avCWhKEZXtlOh7YiSCIbAp28EErygyn0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Double Two Delivery</title>
    <link rel="stylesheet" href="https://order.doubletworesto.com/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://order.doubletworesto.com/css/style.css">
    <link rel="stylesheet" href="https://order.doubletworesto.com/css/animate-button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css"
        integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
        
        .content {
            padding: 1rem 0;
        }

        * {
            padding: 0;
            margin: 0
        }

        .wrapper {

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes  stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes  scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes  fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142
            }
        }
        body{
            
        }
        .stage {
            margin: auto;
        }
        .box,.box2 {
            align-self: flex-end;
            animation-duration: 2s;
            animation-iteration-count: 1;
            animation-delay: 0.5s;
            z-index: 99;
            margin: 0 auto 0 auto;
            transform-origin: bottom;
            width: 50%;
        }
        .box2{
            animation-delay: 1s;
            z-index: 99;
        }
        .bounce-7 {
            animation-name: bounce-7;
            animation-timing-function: cubic-bezier(0.280, 0.840, 0.420, 1);
        }
        
        @keyframes  bounce-7 {
            0% { transform: scale(1,1) translateY(0); }
            10% { transform: scale(1.1,.9) translateY(0); }
            30% { transform: scale(.9,1.1) translateY(-90px); }
            50% { transform: scale(1.05,.95) translateY(0); }
            57% { transform: scale(1,1) translateY(-7px); }
            64% { transform: scale(1,1) translateY(0); }
            100% { transform: scale(1,1) translateY(0); }
        }
    </style>

    <body>
        <div class="row justify-content-center mx-auto ">
            <div class="col-12 col-md-4 px-0 shadow" style="background-color: #faf3eb !important;">
                <center class="content">

                    <div class="row mx-auto mt-4">
                        <div class="col">
                            <img src="/logo_bank/{{$bank->logo}}" alt="" class="img-fluid" width="40%"><br><br><br>
                            <!-- <img src="https://order.doubletworesto.com/img/online-store-closed.gif" alt="" class="img-fluid" width="50%"> -->
                            <div class="badge badge-danger">
                                check out
                            </div>
                        </div>
                    </div>
                    <div class="mb-5 p-4">
                        <h4 class="mb-4">Silahkan lakukan pembayaran Rp. {{number_format($total_harga)}} ke</h4>
                        <small> Bank : {{ $bank->nama_bank }} <br>
                        Nomor Rekening : {{ $bank->no_rekening }} <br>
                        Atas Nama : {{ $bank->atas_nama }} <br>
                        </small>
                    </div>
                    <div class="stage df-align-c">
                        <div class="box bounce-7">
                            <a href="https://wa.me/6289650005111">
                                <img src="https://order.doubletworesto.com/img/whatsapp.png" alt="" class="img-fluid" width="50%">
                            </a>
                        </div>
                        <div class="box2 bounce-7">
                            <a href="https://www.instagram.com/doubletwo.mlg">
                                <img src="https://order.doubletworesto.com/img/instagram.png" alt="" class="img-fluid" width="50%">
                            </a>
                        </div>
                    </div>
                </center>
            </div>
        </div>

    </body>

</html>