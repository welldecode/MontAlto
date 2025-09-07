<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!--
    - google font link
  -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700&family=Onest:wght@400;500;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css?<?php echo time(); ?>">
<script type="module" src="/assets/js/app.js?<?php echo time(); ?>"></script>
@yield('css')
