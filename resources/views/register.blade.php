<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NoWaste</title>

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
    <body>
        <div class="container py-5">

            <!-- Outer Row -->
            <div class="row justify-content-center align-items-center">
    
                <div class="col-xl-5 col-lg-6">
                    <div class="card o-hidden border-0 shadow-lg mb-3">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h1 mb-4">NoWaste</h1>
                                    @if(session()->has('status'))
                                    <div class="alert alert-success alert-dismissible fade show">{{ session('status') }}</div>
                                    @endif
    
                                    @if(session()->has('LoginError'))
                                    <div class="alert alert-danger alert-dismissible fade show">{{ session('LoginError') }}</div>
                                    @endif
                                </div>
                                <form class="user" action="/register" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control py-3 @error('name') is-invalid @enderror" name="name"
                                            placeholder="Nama Bisnis/Restoran" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control py-3 @error('email') is-invalid @enderror" name="email"
                                            placeholder="Email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control py-3 @error('password') is-invalid @enderror" name="password"
                                            placeholder="Password" id="InputPassword" required>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control py-3" id="InputRepeatPassword" onkeyup="check();" placeholder="Konfirmasi Password" required>
                                        <div id="message" class="mt-1"></div>
                                    </div>
                                    <button type="submit" id="ButtonSubmit" class="btn btn-primary form-control text-white py-3 rounded-pill mt-3">Daftar</button>  
                                </form>
                            </div>
                        </div>
                    </div>
    
                    <div class="card o-hidden border-0 shadow-lg mt-2">
                        <div class="card-body py-3">
                            <div class="text-center small">
                                Sudah punya akun? <a href="/login">Masuk</a>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>

        <script>
            var check = function() {
                if ($("#InputRepeatPassword").val() != $("#InputPassword").val()) {
                    $("#ButtonSubmit").attr("disabled", true);
                    $("#message").css({
                        'display': 'block',
                        'margin-top': '0.25rem',
                        'font-size': '0.875em',
                        'color': '#dc3545'
                    });
                    $("#message").html("Password harus sesuai");
                }else if ($("#InputRepeatPassword").val() == $("#InputPassword").val()) {
                    $("#ButtonSubmit").removeAttr("disabled");
                    $("#message").css('display', 'none');
                }
            }
        </script>

    </body>
</html>
