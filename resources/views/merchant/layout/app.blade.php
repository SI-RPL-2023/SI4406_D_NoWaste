<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
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
<body class="bg-white font-maisonDemi">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm">
        <div class="container-fluid container-xl">
            <button class="btn btn-light d-lg-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand font-maisonExtraBold" href="#">NoWaste</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/merchant/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->guard('merchant')->user()->name }}
                </a>
                
                <div class="dropdown-menu position-absolute dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/merchant/profile/">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/merchant/logout/">Logout</a>
                </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main -->
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-3 col-xl-2 pt-3 pe-0 border-end">
                <div class="offcanvas-lg offcanvas-start vh-100" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">SekolahApp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasNavbar" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-secondary">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/merchant">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/merchant/menu">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/merchant/finance">Keuangan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/merchant/profile">Profil</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu w-100">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-xl-10 py-3">
                <!-- Content -->
                @yield('content')
            </div>

        </div>
    </div>


    
</body>
</html>