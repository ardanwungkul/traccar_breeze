<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('storage/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/icon.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/site.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css"
        integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css'
        rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />




    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" antialiased">
    <style>
        @import url('https://fonts.cdnfonts.com/css/helvetica-neue-55');
        @import url('https://fonts.cdnfonts.com/css/tahoma');

        @font-face {
            font-family: 'icomoon';
            src: url('{{ asset('storage/icomoon/icomoon.eot?nf1pj') }}');
            src: url('{{ asset('storage/icomoon/icomoon.eot?nf1pj#iefix') }}') format('embedded-opentype'),
                url('{{ asset('storage/icomoon/icomoon.ttf?nf1pj') }}') format('truetype'),
                url('{{ asset('storage/icomoon/icomoon.woff?nf1pj') }}') format('woff'),
                url('{{ asset('storage/icomoon/icomoon.svg?nf1pj#icomoon') }}') format('svg');
            font-weight: normal;
            font-style: normal;
        }


        body {

            font-family: sans-serif;
        }
    </style>
    <div class="min-h-screen bg-gray-100 h-full w-full">
        <div class="flex h-full min-h-screen">
            <aside class=" z-10 w-[260px] h-auto flex-none bg-white" aria-label="Sidebar">
                <div class="h-[60px] w-full bg-[#0087d6]">
                    <div class="h-full flex items-center pl-4">
                        <img src="{{ asset('storage/images/logo/logo.png') }}" class=""
                            style="height: 50px; filter: brightness(0) invert(1);">
                    </div>
                </div>
                @if (isset($header))
                    {{ $header }}
                @endif
            </aside>
            <div class="flex-auto">
                @include('layouts.navigation')
                {{ $slot }}
            </div>
        </div>
        <main>
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js"
        integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a6c5beee0a.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-plugins/layer/tile/Google.js"></script>
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.1.0/dist/esri-leaflet-vector.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.marker.slideto@0.3.0/Leaflet.Marker.SlideTo.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>


</body>


</html>
