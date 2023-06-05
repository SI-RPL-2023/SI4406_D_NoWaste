<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NoWaste</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/1565b44817.js" crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="/assets/fonts/maison-neue-extended-extra-bold.css" rel="stylesheet">
        <link href="/assets/fonts/maison-neue-book.css" rel="stylesheet">
        <link href="/assets/fonts/maison-neue-demi.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/js/app.js'])
        <link href="/assets/css/styles.css" rel="stylesheet">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    </head>
    <body class="bg-white">
        
        @include('web.partials.navbar')

        <!-- Search Bar-->
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Temukan <span class="text-primary">Makanan</span>mu</h2>
                <div class="d-flex justify-content-center">
                    <div id="searchbar" class="w-lg-50 form-control px-5 py-3 rounded-pill fs-5 d-flex">
                        <div id="search-icon" class="align-self-center me-3 pt-1 text-secondary">
                            <i class="fa fa-search"></i>
                        </div>
                        <form class="w-100" action="/search">
                            <input class="search-input w-100 pt-1" type="search" name="keyword" placeholder="Cari merchant atau makanan" value="{{ request('keyword') }}" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <h2 class="mb-1">Semua <span class="text-primary">Merchant</span></h2>
                <nav class="mb-4" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Semua Merchant</li>
                    </ol>
                </nav>
                <div class="row mb-2 mb-lg-4">
                    @if (count($Merchants) != 0)
                        @foreach ($Merchants as $Merchant)
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card border-0">
                                <img class="img-product rounded-3 border-0 p-0 mb-2 mb-lg-3" src="{{ $Merchant->photo != null ? '/storage/'.$Merchant->photo : '/assets/img/no-image.png' }}">
                                <a href="/merchants/{{ $Merchant->id }}" class="h5 text-dark text-decoration-none text-truncate mb-0">{{ $Merchant->name }}</a>
                                @if($Merchant->status == 1)<div class="font-maisonBook text-primary"><i class="fs-5 fa-solid fa-circle-check"></i> Merchant Terverifikasi</div>@endif
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="h3 py-5 text-center">Oops, belum ada Merchant yang tersedia disini!</div>
                    @endif
                </div>
            </div>
        </section>
        
        @include('web.partials.footer')

        <script>
        $(".search-input").focusin(function(){
            $("#searchbar").css({
                'box-shadow': '0 0 0 .25rem #00aa1340',
                'border-color': '#00aa1340'
            });
            $("div#search-icon").removeClass("text-secondary").addClass("text-primary");
        });
        $(".search-input").focusout(function(){
            $("#searchbar").css({
                'box-shadow': 'none',
                'border-color': '#ced4da'
            });
            $("div#search-icon").removeClass("text-primary").addClass("text-secondary");
        });
        </script>

    </body>
</html>