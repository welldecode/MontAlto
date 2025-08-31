<div>
    @section('css')
        <link rel="stylesheet" href="/assets/css/seminovos.css">
        <link rel="stylesheet" href="/assets/css/frotas-tarifas.css">
    @endsection
    <main>
        <article>
            <!-- HERO SEMINOVOS -->
            <section class="hero-seminovos">
                <div class="container">
                    <div class="hero-content">
                        <span class="hero-badge">
                            <ion-icon name="calendar-outline"></ion-icon>
                            Desde 1985
                        </span>
                        <h1 class="hero-title">Resultado da Busca</h1>
                        <p class="hero-text">
                            Veículos revisados e com garantia. A melhor opção para quem busca economia e confiabilidade.
                        </p>
                    </div>
                </div>
            </section>

      <section class="section featured-car" >
                <div class="container"> 

                    <div class="title-wrapper">
                       
                    </div>
                    <ul class="featured-car-list">
                          @foreach ($carros as $index => $product) 
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
                                            
                                               {{ $product->name }} 
                                        

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
                                                <strong>R${{ $product->price['Mensal'] ?? '---' }}</strong> / mês
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
 
        </article>
    </main>

    <!-- POPUP DE VALORES -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <button class="popup-close" id="popupClose">
                <ion-icon name="close-outline"></ion-icon>
            </button>

            <div class="popup-header">
                <img id="popupCarImage" src="" alt="">
                <div class="popup-car-info">
                    <h3 id="popupCarTitle"></h3>
                    <p id="popupCarSpecs"></p>
                </div>
            </div>

            <div class="popup-body">
                <h4>Opções de Aluguel</h4>
                <div class="pricing-options">
                    <div class="pricing-card">
                        <div class="pricing-period">Diária</div>
                        <div class="pricing-value" id="dailyPrice"></div>
                        <div class="pricing-desc">Por dia</div>
                    </div>
                    <div class="pricing-card">
                        <div class="pricing-period">Semanal</div>
                        <div class="pricing-value" id="weeklyPrice"></div>
                        <div class="pricing-desc">Por semana</div>
                    </div>
                    <div class="pricing-card">
                        <div class="pricing-period">Quinzenal</div>
                        <div class="pricing-value" id="biweeklyPrice"></div>
                        <div class="pricing-desc">Por 15 dias</div>
                    </div>
                    <div class="pricing-card">
                        <div class="pricing-period">Mensal</div>
                        <div class="pricing-value" id="monthlyPrice"></div>
                        <div class="pricing-desc">Por mês</div>
                    </div>
                </div>

                <div class="popup-actions">
                    <button class="btn-reservar">
                        <ion-icon name="calendar-outline"></ion-icon>
                        Fazer Reserva
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:update', () => {
            const cards = document.querySelectorAll('.seminovo-card');
            cards.forEach(card => {
                // reinicia animação de entrada
                card.__x.$data.visible = false;
                setTimeout(() => card.__x.$data.visible = true, 50);
            });
        });
    </script>
</div>
