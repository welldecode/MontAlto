<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.web')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">

    <!--
    - #LOADING
  -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <div class="loader-text">Carregando...</div>
            <div class="loader-subtext">Preparando sua experiência</div>
        </div>
    </div>


    <!--
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <div class="overlay" data-overlay></div>

            <a href="#" class="logo">
                <img src="./assets/images/logo.png" class="w-135" alt="Montalvo Logo">
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">
                    <li>
                        <a href="./index.html" class="navbar-link active" data-nav-link>Início</a>
                    </li>

                    <li>
                        <a href="./quem-somos.html" class="navbar-link" data-nav-link>Quem Somos</a>
                    </li>

                    <li>
                        <a href="./frotas-tarifas.html" class="navbar-link" data-nav-link>Frotas</a>
                    </li>

                    <li>
                        <a href="./seminovos.html" class="navbar-link" data-nav-link>Seminovos</a>
                    </li>

                    <li>
                        <a href="./oportunidades.html" class="navbar-link" data-nav-link>Oportunidades</a>
                    </li>

                    <li>
                        <a href="./contato.html" class="navbar-link" data-nav-link>Contato</a>
                    </li>

                    <li>
                        <a href="./reserva.html" class="navbar-link" data-nav-link>Reserva</a>
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

    @fluxScripts
    
  <!-- FOOTER -->
  <footer class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="#" class="logo">
            <img src="./assets/images/logo-light.png" class="w-135" alt="Montalvo Logo">
          </a>
          <p class="footer-text">
            Sua melhor escolha em aluguel de veículos. Qualidade, confiança e excelência em cada viagem.
          </p>
        </div>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Links Rápidos</p>
          </li>
          <li><a href="./index.html" class="footer-link">Início</a></li>
          <li><a href="./quem-somos.html" class="footer-link">Quem Somos</a></li>
          <li><a href="./frotas-tarifas.html" class="footer-link">Frotas</a></li>
          <li><a href="./reserva.html" class="footer-link">Reserva</a></li>
        </ul>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Contato</p>
          </li>
          <li><a href="tel:+5511999999999" class="footer-link">11 99999-9999</a></li>
          <li><a href="mailto:contato@montalvo.com.br" class="footer-link">contato@montalvo.com.br</a></li>
        </ul>
      </div>

      <div class="footer-bottom">
        <ul class="social-list">
          <li><a href="#" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
          <li><a href="#" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
        </ul>
        <p class="copyright">
          &copy; 2024 <a href="#">Montalvo</a>. Todos os direitos reservados.
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
