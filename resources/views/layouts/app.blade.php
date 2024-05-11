<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if(isset($pageTitle)) {{ $pageTitle }} - @endif Tenjo Kampung</title>
    
    <link rel="icon" type="image/x-icon" href="assets/images/fav.ico">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    {{-- icon --}}
	<link href="vendor/phosphor/styles.min.css" rel="stylesheet" type="text/css">
	<link href="vendor/fontawesome/styles.min.css" rel="stylesheet" type="text/css">

    {{-- styles --}}
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">

    <style>
        * {
            font-family: 'Poppins', "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"
        }

        .nav-search.active {
            background-color: transparent !important;
            font-weight: bold;
            border-bottom: 2px solid #000;
        }

        @media only screen and (min-width: 1140px) {
            .content {
                margin-top: 78px !important;
            }
        }

        @media only screen and (max-width: 1140px) {
            .content {
                margin-top: 140px !important;
            }
        }

    </style>

</head>
<body>
    
    @include('layouts.navbar')

    <div class="page-content">
        <div class="content-wrapper">
            <div class="content-inner">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')


	<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>