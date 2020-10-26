<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>COVID-19 TOGO - DOCMAVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Signaler les cas suspects de COVID-19 au Togo" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.shared.head')

</head>

<body data-layout="topnav">

    <div id="wrapper">
        @include('layouts.shared.navbar')

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </div>

            @include('layouts.shared.footer')
        </div>
    </div>

    @include('layouts.shared.rightbar')

    @include('layouts.shared.footer-script')
</body>

</html>