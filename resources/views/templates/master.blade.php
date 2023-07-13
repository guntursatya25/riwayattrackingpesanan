<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    <link href="{{ asset('favicon.ico') }}" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/index/compiled/css/iconly.css') }}" />
    @livewireStyles

</head>

<body>
    <script src="{{ asset('assets/index/static/js/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('templates.parts.header')

            <div class="content-wrapper container">

                <div class="page-heading">
                    <h3>@yield('heading')</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-9">
                            @yield('isi')
                        </div>

                        <div class="col-12 col-lg-3">
                            @include('templates.parts.sidebar')
                        </div>
                    </section>
                </div>
            </div>

            @include('templates.parts.footer')
        </div>
    </div>
    <script src="{{ asset('assets/index/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/index/static/js/pages/horizontal-layout.js') }}"></script>
    <script src="{{ asset('assets/index/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/index/compiled/js/app.js') }}"></script>

    <script src="{{ asset('assets/index/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/index/static/js/pages/dashboard.js') }}"></script>
    @yield('jsthis')
    @livewireScripts
    <script>
        document.getElementById("btnsearch").addEventListener("click", redirectToHasil);

        function redirectToHasil() {
            var hasilElement = document.getElementById("hasil");
            hasilElement.scrollIntoView({
                behavior: "smooth"
            });
        }
    </script>
</body>

</html>
