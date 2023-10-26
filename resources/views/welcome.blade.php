<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <main class="container  col-xxl-8 px-4 py-5 d-flex justify-content-center align-items-center">

        <div class="shadow">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="img/welcome.jpg" class="d-block mx-lg-auto img-fluid" alt="welcome page" width="700"
                        height="700" loading="lazy">
                </div>
                <div class="col-lg-6 text-center">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
                        Welcome!
                    </h1>
                    <p class="">
                        Dive in.Conquer your task, And your future
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}"
                                    class="font-semibold
                     text-gray-600 hover:text-gray-900 dark:text-gray-400 
                     dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm
                      focus:outline-red-500 btn btn-outline-secondary">
                                    Home
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 
                    hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline
                     focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-outline-secondary">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 
                    hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline
                     focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-outline-secondary">
                                        Register
                                    </a>
                                @endif
                            @endauth

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>






</body>


</html>
