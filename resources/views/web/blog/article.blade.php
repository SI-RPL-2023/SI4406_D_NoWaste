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
                        <li class="breadcrumb-item"><a href="/">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $Article->title }}</li>
                    </ol>
                </nav> 
            </div>
        </header>

        <section id="content" class="mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h2>{{ $Article->title }}</h2>
                        <div class="font-maisonDemi mb-3">{{ date('D, d M Y', strtotime($Article->published_at)) }}</div>
                        <div class="blog-content font-maisonBook">
                            {!! $Article->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if (count($Articles) != 0)
        <section class="mb-5">
            <div class="container">
                <h3>Artikel <span class="text-primary">Terbaru</span> Lainnya</h3>
                <div class="row">
                    @foreach ($Articles as $Related)
                    <div class="col-lg-3">
                        <img class="img-product rounded-4 border-0 p-0 mb-3" src="{{ $Related->image != null ? $Related->image : '/assets/img/no-image.png' }}">
                        <a href="/blog/{{ $Related->slug }}" class="h5 text-dark text-decoration-none featured-article-title">{{ $Related->title }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif
        
        
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