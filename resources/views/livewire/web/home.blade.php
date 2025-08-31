<div class="">


    <main>
        <article>

            <!--
        - #HERO
      -->

            <section class="section hero" id="home">
                <div class="container">

                    <div class="hero-content">
                        <div class="h1 hero-title">Passeio com a <span>família</span>, viagem de trabalho ou <span>lazer</span>?</div>

                        <p class="hero-text">
                            Vá de carro, vá de Montalto!
                        </p>
                    </div>

                    <div class="hero-banner"></div>
  <form wire:submit.prevent="buscar" class="hero-form">

        <div class="input-wrapper">
            <label class="input-label">Carro, modelo ou marca</label>
            <input type="text" wire:model.defer="car_model" class="input-field" placeholder="Qual carro deseja?">
        </div>

        <div class="input-wrapper">
            <label class="input-label">Máx. pagamento mensal</label>
            <input type="number" wire:model.defer="monthly_pay" class="input-field" placeholder="Adicione o valor">
        </div>

        <div class="input-wrapper">
            <label class="input-label">Faça o Ano</label>
            <input type="number" wire:model.defer="year" class="input-field" placeholder="Adicione o ano">
        </div>

        <button type="submit" class="btn">Procurar</button>
    </form>
                </div>
            </section>




            <!--
        - #FEATURED CAR
      -->

            <section class="section featured-car" id="featured-car">
                <div class="container">

                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Carros em destaque</h2>

                        <div style="display: flex; align-items: center; gap: 20px;">
                            <div class="view-toggle">
                                <button class="toggle-btn active" data-view="grid" title="Visualização em Grade">
                                    <ion-icon name="grid-outline"></ion-icon>
                                </button>
                                <button class="toggle-btn" data-view="list" title="Visualização em Lista">
                                    <ion-icon name="list-outline"></ion-icon>
                                </button>
                            </div>

                            <a href="#" class="featured-car-link">
                                <span>Veja mais</span>
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <ul class="featured-car-list">
                        @foreach ($featuredProducts as $product)
                            <li>
                                <div class="featured-car-card">

                                    {{-- Imagem principal --}}
                                    <figure class="card-banner">
                                        <img src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}"
                                            alt="{{ $product->name }}" loading="lazy" width="440" height="300"
                                            class="w-100">
                                    </figure>

                                    <div class="card-content">

                                        {{-- Nome + Ano --}}
                                        <div class="card-title-wrapper">
                                            <h3 class="h3 card-title">
                                                <a href="#">{{ $product->name }}</a>
                                            </h3>

                                            <data class="year"
                                                value="{{ $product->year }}">{{ $product->year }}</data>
                                        </div>

                                        {{-- Features (json) --}}
                                        <ul class="card-list">
                                            @if (isset($product->features['espaco']))
                                                <li class="card-list-item">
                                                    <ion-icon name="people-outline"></ion-icon>
                                                    <span
                                                        class="card-item-text">{{ $product->features['espaco'] }}</span>
                                                </li>
                                            @endif

                                            @if (isset($product->features['tipo']))
                                                <li class="card-list-item">
                                                    <ion-icon name="flash-outline"></ion-icon>
                                                    <span class="card-item-text">{{ $product->features['tipo'] }}</span>
                                                </li>
                                            @endif 
                                        </ul>

                                        {{-- Preços --}}
                                        <div class="card-price-wrapper">
                                            <p class="card-price">
                                                <strong>R${{ $product->prices['Mensal'] ?? '---' }}</strong> / mês
                                            </p>

                                            <div class="card-actions">
                                                <button class="btn-pricing" data-car="{{ Str::slug($product->name) }}"
                                                    data-daily="{{ $product->prices['Diária'] ?? 0 }}"
                                                    data-weekly="{{ $product->prices['Semanal'] ?? 0 }}"
                                                    data-biweekly="{{ $product->prices['Quinzenal'] ?? 0 }}"
                                                    data-monthly="{{ $product->prices['Mensal'] ?? 0 }}">
                                                    <ion-icon name="pricetag-outline"></ion-icon>
                                                    Ver Valores
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </section>

              <!-- 
        - #WHY CHOOSE US
      -->

      <section class="section why-choose">
        <div class="container">

          <h2 class="h2 section-title">Por que nos escolher?</h2>

          <ul class="why-choose-list">

            <li>
              <div class="why-choose-card">

                <div class="card-icon">
                  <ion-icon name="shield-checkmark-outline"></ion-icon>
                </div>

                <div class="card-content">
                  <h3 class="card-title">Segurança Garantida</h3>
                  <p class="card-text">Todos os nossos veículos passam por rigorosa inspeção e manutenção preventiva.</p>
                </div>

              </div>
            </li>

            <li>
              <div class="why-choose-card">

                <div class="card-icon">
                  <ion-icon name="time-outline"></ion-icon>
                </div>

                <div class="card-content">
                  <h3 class="card-title">Disponível 24/7</h3>
                  <p class="card-text">Atendimento e suporte técnico disponível 24 horas por dia, 7 dias por semana.</p>
                </div>

              </div>
            </li>

            <li>
              <div class="why-choose-card">

                <div class="card-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <div class="card-content">
                  <h3 class="card-title">Frota Ecológica</h3>
                  <p class="card-text">Veículos híbridos e elétricos para uma experiência sustentável e econômica.</p>
                </div>

              </div>
            </li>

            <li>
              <div class="why-choose-card">

                <div class="card-icon">
                  <ion-icon name="star-outline"></ion-icon>
                </div>

                <div class="card-content">
                  <h3 class="card-title">Melhor Preço</h3>
                  <p class="card-text">Tarifas competitivas e transparentes, sem taxas ocultas ou surpresas.</p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

<!-- 
        - #SOCIAL BAR
      -->

      <section class="social-bar">
        <div class="container">

          <p class="social-bar-text">Siga-nos nas redes sociais</p>

          <div class="social-bar-links">
            <a href="#" class="social-bar-link" aria-label="Instagram">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>

            <a href="#" class="social-bar-link" aria-label="Facebook">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </div>

        </div>
      </section>



      <!-- 
        - #GET START
      -->

      <section class="section get-start">
        <div class="container">

          <h2 class="section-title">Comece com 4 passos simples</h2>

          <ul class="get-start-list">

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-1">
                  <ion-icon name="person-add-outline"></ion-icon>
                </div>

                <h3 class="card-title">Crie um perfil</h3>

                <p class="card-text">
                  If you are going to use a passage of Lorem Ipsum, you need to be sure.
                </p>

                <a href="#" class="card-link">Iniciar</a>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-2">
                  <ion-icon name="car-outline"></ion-icon>
                </div>

                <h3 class="card-title">Diga-nos qual carro você quer</h3>

                <p class="card-text">
                  Várias versões evoluíram ao longo dos anos, às vezes por acidente, às vezes propositalmente
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-3">
                  <ion-icon name="person-outline"></ion-icon>
                </div>

                <h3 class="card-title">Combine com o vendedor</h3>

                <p class="card-text">
                  Para fazer um tipo de livro de espécimes. Sobreviveu não apenas cinco séculos, mas também o salto para
                  eletrônico
                </p>

              </div>
            </li>

            <li>
              <div class="get-start-card">

                <div class="card-icon icon-4">
                  <ion-icon name="card-outline"></ion-icon>
                </div>

                <h3 class="card-title">Fazer um acordo</h3>

                <p class="card-text">
                  Existem muitas variações de passagens de Lorem disponíveis, mas a maioria sofreu alterações
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>



        </article>
    </main>

</div>
