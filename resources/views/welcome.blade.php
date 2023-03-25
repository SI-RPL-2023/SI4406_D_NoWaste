<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NoWaste</title>

        <!-- Fonts -->
        <link href="https://fonts.cdnfonts.com/css/maison-neue" rel="stylesheet">
        <link href="/assets/fonts/maison-neue-extended-extra-bold.css" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/js/app.js'])
        <link href="/assets/css/styles.css" rel="stylesheet">
        
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
                                <form class="user" action="/login" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" class="form-control py-3 @error('email') is-invalid @enderror" name="email"
                                            id="InputEmail" value="{{ old('email') }}" placeholder="Email" required>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control py-3" name="password" id="InputPassword" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary fw-bold text-white py-3 w-100 rounded-pill">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
    
                    <div class="card o-hidden border-0 shadow-lg mt-2">
                        <div class="card-body py-3">
                            <div class="text-center small">
                                Don't have an account? <a href="/register">Register</a>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    </body>
</html>
