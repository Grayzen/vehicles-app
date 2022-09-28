<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicles App</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> --}}
    <script src="https://cdn-tailwindcss.vercel.app/"></script>
    <!--Replace with your tailwind.css once created-->
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/png">

    @yield('head')

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    @include('layouts.header')

    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">

            <!--Console Content-->

            @yield('content')

            <!--/ Console Content-->

        </div>


    </div>
    <!--/container-->

    @include('layouts.footer')

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
