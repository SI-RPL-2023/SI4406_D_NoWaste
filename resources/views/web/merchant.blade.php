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

        <header>
            <div class="container py-5">
                <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/">Merchant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $Merchant->name }}</li>
                    </ol>
                </nav>
                <div class="card bg-primary rounded-3">
                    <div class="card-body text-white pt-5">
                        <div class="d-md-flex flex-row">
                            <div class="img-profile">
                                <img src="/storage/{{ $Merchant->photo }}" class="rounded-3">
                            </div>
                            <div class="align-self-end mx-md-3">
                                <h1 class="font-maisonExtraBold mt-3 mt-md-5 mb-0">{{ $Merchant->name }}</h1>
                                <div>
                                    {{ $Merchant->bio }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </header>

        <section class="mb-5">
            <div class="container">
                <div class="row">
                    @if (count($Products) != 0)
                        @foreach ($Products as $Product)
                        <div class="col-lg-3 col-md-4 mb-3">
                            <div class="card border-0">
                                <img class="img-product rounded-3 border-0 p-0 mb-2 mb-lg-3" src="../storage/{{ $Product->photo }}">
                                <a class="h5 text-dark text-decoration-none text-truncate mb-0">{{ $Product->name }}</a>
                                <div>
                                    @if ($Product->price != 0)
                                    <span class="text-secondary">IDR {{ number_format($Product->price) }}</span>
                                    @else
                                    <span class="text-primary">Gratis</span>
                                    @endif
                                </div>
                                <div class="font-maisonDemi">
                                    Sisa {{ $Product->stock }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="h3 py-5 text-center">Oops, belum ada Produk yang bisa kami temukan!</div>
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