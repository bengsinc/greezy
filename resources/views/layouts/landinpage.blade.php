<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
{{--    {!! SEO::generate() !!}--}}
    <meta name="robots" content="index, follow" />
    <link rel="base" href="https://www.greezy.com.br/" />
    <link rel="canonical" href="https://www.greezy.com.br" />
    <meta property="og:url" content="https://www.greezy.com.br/" />
    <meta property="og:site_name" content="Greezy" />
    <meta property="og:locale" content="pt_BR" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>

    <!-- ICONES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    @yield('css')
    @livewireStyles


</head>
<body>
@yield('content')
@yield('js')
@livewireScripts

{{--@include('sweetalert::alert')--}}

</body>
</html>
