<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title> {{ config('app.email') }}</title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $business->business_description ?? ' ' }}">
    <meta name="keywords" content="{{ $business->seo_keywords ?? ' ' }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">

    <!-- ======= BEGIN GLOBAL MANDATORY STYLES ======= -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/bootstrap/css/bootstrap.min.css ') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/fonts/icofont/icofont.min.css ') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.css ') }}">
    <!-- ======= END BEGIN GLOBAL MANDATORY STYLES ======= -->

    <!-- ======= BEGIN PAGE LEVEL PLUGINS STYLES ======= -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/apex/apexcharts.css ') }}">
    <!-- ======= END BEGIN PAGE LEVEL PLUGINS STYLES ======= -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- ======= MAIN STYLES ======= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    <!-- ======= END MAIN STYLES ======= -->

    {{-- <link href="https://cdn.quilljs.com/1.0.5/quill.snow.css" rel="stylesheet"> --}}

    {{-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"> --}}
    {{-- <link rel='stylesheet' href="//bower_components/glyphicons-only-bootstrap/css/bootstrap.min.css" /> --}}
    {{-- <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}

    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/dropzone/dropzone.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg=="
        crossorigin="anonymous" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    {{--
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script> --}}

    {{-- toaster notification css --}}

    {{-- <link rel="stylesheet" href " {{ asset('/backend/assets/plugins/toastr/toastr.min.css') }}">
    --}}
    {{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"  />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">



    @livewireStyles

</head>
