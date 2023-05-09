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
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Produk</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="merchant-tab" data-bs-toggle="tab" data-bs-target="#merchant-tab-pane" type="button" role="tab" aria-controls="merchant-tab-pane" aria-selected="false">Merchant</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Products Tab-->
                    <div class="tab-pane py-3 py-lg-4 fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <div class="d-flex justify-content-end mb-3">
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-3 mb-3">
                                <h6>Filter</h6>
                                <div class="card py-4 px-3">
                                    <h5>Urutkan</h5>
                                    <select name="order" class="form-select mb-3">
                                        <option value="">Terbaru</option>
                                        <option value="">Harga Terendah</option>
                                        <option value="">Harga Tertinggi</option>
                                    </select>
                                    <hr>
                                    <h5>Harga</h5>
                                    <form method="get" action="/search" class="mb-2">
                                        <input type="hidden" name="keyword" value="{{ $keyword }}">
                                        <input type="number" class="form-control rounded-0 mb-3" id="minPrice" value="{{ request('minPrice') }}" placeholder="Harga Minimum">
                                        <input type="number" class="form-control rounded-0 mb-3" id="maxPrice" value="{{ request('maxPrice') }}" placeholder="Harga Maximum">
                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" name="free" value="yes" id="freeCheck" @if(request()->get('free')) checked @endif>
                                            <label for="freeCheck" class="form-check-label font-maisonDemi">Gratis</label>
                                        </div>
                                        <button type="submit" id="submitFilter" class="btn btn-primary rounded-0 text-white">Terapkan</button>
                                    </form>
                                    <a href="/search?keyword={{ request('keyword') }}" class="font-maisonDemi">Reset Filter</a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    @if (count($Products) != 0)
                                        @foreach ($Products as $Product)
                                        <div class="col-lg-4 mb-3">
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
                                    <div class="h3 py-5 text-center">Oops, belum ada Produk yang bisa kami temukan!</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Merchants Tab-->
                    <div class="tab-pane py-3 py-lg-5 fade" id="merchant-tab-pane" role="tabpanel" aria-labelledby="merchant-tab" tabindex="0">
                        <div class="row">
                            @if (count($Merchants) != 0)
                                @foreach ($Merchants as $Merchant)
                                <div class="col-lg-3 mb-3">
                                    <div class="card border-0">
                                        <img class="img-product rounded-3 border-0 p-0 mb-2 mb-lg-3" src="../storage/{{ $Merchant->photo }}">
                                        <a class="h5 text-dark text-decoration-none text-truncate mb-0">{{ $Merchant->name }}</a>
                                        <div class="text-secondary">Roti, Kue</div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="h3 py-5 text-center">Oops, belum ada Merchant yang pas!</div>
                            @endif
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

        $(document).ready(function(){
            if($("#freeCheck").is(':checked')) {
                $("input[id=minPrice]").prop("disabled", true);
                $("input[id=maxPrice]").prop("disabled", true);
            }
            if($("#maxPrice").val()) {
                $("#maxPrice").attr("name", "maxPrice");
            }
            if($("#minPrice").val()) {
                $("#minPrice").attr("name", "minPrice");
            }
        });

        $("#freeCheck").change(function(){
            if(this.checked) {
                $("input[id=minPrice]").prop("disabled", true);
                $("input[id=maxPrice]").prop("disabled", true);
            }else{
                $("input[id=minPrice]").prop("disabled", false);
                $("input[id=maxPrice]").prop("disabled", false);
            }
        });

        $("#minPrice").on("keyup blur", function(){
            if($("#minPrice").val()) {
                $("#minPrice").attr("name", "minPrice");
            }else{
                $("#minPrice").removeAttr("name", "minPrice");
            }
        })

        $("#maxPrice").on("keyup blur", function(){
            if($("#maxPrice").val()) {
                $("#maxPrice").attr("name", "maxPrice");
            }else{
                $("#maxPrice").removeAttr("name", "maxPrice");
            }
        })
        </script>

    </body>
</html>