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
        
        <!-- Fonts -->
        <link href="/assets/fonts/maison-neue-extended-extra-bold.css" rel="stylesheet">
        <link href="/assets/fonts/maison-neue-book.css" rel="stylesheet">
        <link href="/assets/fonts/maison-neue-demi.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/js/app.js'])
        <link href="/assets/css/styles.css" rel="stylesheet">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/1565b44817.js" crossorigin="anonymous"></script>

    </head>
    <body class="bg-white">
        
        @include('web.partials.navbar')

        <!-- Masthead-->
        <header class="masthead text-white">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <h1>NoWaste.</h1>
                        <h1>stok makanan berlebih</h1>
                        <h1>bisa berarti untuk orang lain</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Marketplace-->
        <section class="pt-5 pb-3">
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

        <section class="bg-white pt-5 pb-3">
            <div class="container">
                <h2 class="mb-4">Merchant <span class="text-primary">Favorit</span></h2>
                <div class="row mb-2 mb-lg-4">
                    @if (count($Merchants) != 0)
                        @foreach ($Merchants as $Merchant)
                        <div class="col-md-6 col-lg-3 mb-3">
                            <div class="card border-0">
                                <img class="img-product rounded-3 border-0 p-0 mb-2 mb-lg-3" src="../storage/{{ $Merchant->photo }}">
                                <a href="/merchants/{{ $Merchant->id }}" class="h5 text-dark text-decoration-none text-truncate mb-0">{{ $Merchant->name }}</a>
                                @if($Merchant->status == 1)<div class="font-maisonBook text-primary"><i class="fs-5 fa-solid fa-circle-check"></i> Merchant Terverifikasi</div>@endif
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="h3 py-5 text-center">Oops, belum ada Merchant yang tersedia disini!</div>
                    @endif
                </div>
                @if (count($Merchants) != 0)
                <a class="btn btn-outline-primary w-100 py-2">Lihat semua</a>
                @endif
            </div>
        </section>

        <section class="bg-white pt-5 pb-3">
            <div class="container">
                <h2 class="mb-4">Produk <span class="text-primary">Terbaru</span> nih!</h2>
                <div class="row mb-2 mb-lg-4">
                    @if (count($Products) != 0)
                        @foreach ($Products as $Product)
                        <div class="col-md-6 col-lg-3 mb-3">
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
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="h3 py-5 text-center">Oops, belum ada Produk yang tersedia disini!</div>
                    @endif
                </div>
                @if (count($Products) != 0)
                <a class="btn btn-outline-primary w-100 py-2">Lihat semua</a>
                @endif
            </div>
        </section>

        <section class="bg-white py-5 mb-3">
            <div class="container">
                <h2 class="mb-4">Cari tahu di <span class="text-primary">Artikel</span></h2>
                <div class="row">
                    @if (count($Articles) != 0)
                        @foreach ($Articles as $Article)
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img class="img-product rounded-4 border-0 p-0 mb-3" src="{{ $Article->image != null ? $Article->image : '/assets/img/no-image.png' }}">
                                </div>
                                <div class="col-lg-6">
                                    <a href="/blog/{{ $Article->slug }}" class="h5 text-dark text-decoration-none featured-article-title mb-0">{{ $Article->title }}</a>
                                    <div class="text-primary mb-2">{{ date('d M Y', strtotime($Article->published_at)) }}</div>
                                    <p class="font-maisonBook mb-0 featured-article-paragraph">{{ Str::limit(strip_tags($Article->body), 250) }}</p>
                                    <a href="/blog/{{ $Article->slug }}" class="text-primary">Read more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="h3 py-5 text-center">Belum ada artikel</div>
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