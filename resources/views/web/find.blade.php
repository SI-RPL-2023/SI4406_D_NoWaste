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

        <!-- Marketplace-->
        <section class="pt-5 pb-3">
            <div class="container">
                <h2 class="text-center mb-4">Temukan <span class="text-primary">Makanan</span>mu</h2>
                <div class="d-flex justify-content-center">
                    <form class="w-50" role="search">
                        <div id="searchbar" class="form-control px-5 py-3 rounded-pill fs-5 d-flex">
                            <div id="search-icon" class="align-self-center me-3 pt-1 text-secondary">
                                <i class="fa fa-search"></i>
                            </div>
                            <input class="search-input w-100 pt-1" type="search" placeholder="Cari merchant atau makanan" aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="bg-white pt-5 pb-3">
            <div class="container">
                <h2 class="mb-4"><span class="text-primary">'{{ $keyword }}'</span> di Merchant</h2>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white pt-3 pb-5">
            <div class="container">
                <h2 class="mb-4"><span class="text-primary">'{{ $keyword }}'</span> di Produk</h2>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <img class="img-thumbnail rounded-3 border-0 p-0 mb-3" src="../assets/img/bg-masthead.jpg">
                            <a class="h5 text-dark text-decoration-none text-truncate">Dunkin Donut Jatinangor</a>
                            <div class="text-secondary">Roti, Kue</div>
                        </div>
                    </div>
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