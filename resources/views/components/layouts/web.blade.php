<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.web')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">



    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <div class="overlay" data-overlay></div>

            <a href="#" class="logo">
                <img src="/assets/images/logo.png" class="w-135" alt="Montalvo Logo">
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li>
                        <a href="{{ route('home') }}" class="navbar-link {{ request()->routeIs('home') ? 'active' : '' }}" data-nav-link>Início</a>
                    </li>

                    <li>
                        <a href="{{ route('quemsomos') }}" class="navbar-link {{ request()->routeIs('quemsomos') ? 'active' : '' }}" data-nav-link>Quem Somos</a>
                    </li>

                    <li>
                        <a href="{{ route('frotas') }}" class="navbar-link {{ request()->routeIs('frotas') ? 'active' : '' }}" data-nav-link>Frotas</a>
                    </li>

                    <li>
                        <a href="{{ route('seminovos') }}" class="navbar-link {{ request()->routeIs('seminovos') ? 'active' : '' }}" data-nav-link>Seminovos</a>
                    </li>

                    <li>
                        <a href="{{ route('oportunidades') }}" class="navbar-link {{ request()->routeIs('oportunidades') ? 'active' : '' }}" data-nav-link>Oportunidades</a>
                    </li>

                    <li>
                        <a href="{{ route('contato') }}" class="navbar-link {{ request()->routeIs('contato') ? 'active' : '' }}" data-nav-link>Contato</a>
                    </li>

                    <li>
                        <a href="{{ route('reserva') }}" class="navbar-link {{ request()->routeIs('reserva') ? 'active' : '' }}" data-nav-link>Reserva</a>
                    </li>

                </ul>
            </nav>

            <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
                <span class="one"></span>
                <span class="two"></span>
                <span class="three"></span>
            </button>

        </div>
    </header>

    {{ $slot }}



    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <img src="/assets/images/logo-light.png" class="w-135" alt="Montalvo Logo">
                    </a>
                    <p class="footer-text">
                        Sua melhor escolha em aluguel de veículos. Qualidade, confiança e excelência em cada viagem.
                    </p>
                </div>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Links Rápidos</p>
                    </li>
                    <li><a href="{{ route('home') }}" class="footer-link">Início</a></li>
                    <li><a href="{{ route('quemsomos') }}" class="footer-link">Quem Somos</a></li>
                    <li><a href="{{ route('frotas') }}" class="footer-link">Frotas</a></li>
                    <li><a href="{{ route('reserva') }}" class="footer-link">Reserva</a></li>
                </ul>

                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title">Contato</p>
                    </li>
                    <li><a href="tel:+5521970339171" class="footer-link">21 97033-9171</a></li>
                    <li><a href="mailto:contato@montalvo.com.br" class="footer-link">contato@montalvo.com.br</a></li>
                </ul>
            </div>

        </div>
            <div class="footer-bottom">
                <div class="container footer-flex">
                <ul class="social-list">
                    <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
                </ul>
                <p class="copyright">
                    &copy; 2025 <a href="#">Montalvo</a>. Todos os direitos reservados.
                </p>
                </div>
            </div>
    </footer>

    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Background decorative elements -->
    <div class="blob-1"></div>
    <div class="blob-2"></div>
    <div class="blob-3"></div>
    <div class="circle-1"></div>
    <div class="circle-2"></div>


</body>

</html>
