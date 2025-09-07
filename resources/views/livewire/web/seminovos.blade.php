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
                        <h1 class="hero-title">Carros Seminovos</h1>
                        <p class="hero-text">
                            Veículos revisados e com garantia. A melhor opção para quem busca economia e confiabilidade.
                        </p>
                    </div>
                </div>
            </section>

            <!-- FILTROS -->
            <section class="filtros-section">
                <div class="container">
                    <div class="filtros-container">
                        <div class="filtros-row">
                            <!-- Categoria -->
                            <div class="filtro-item">
                                <select wire:model.live="categoria" class="filtro-select">
                                    <option value="todos">Todas as Categorias</option>
                                    <option value="economico">Econômico</option>
                                    <option value="intermediario">Intermediário</option>
                                    <option value="executivo">Executivo</option>
                                    <option value="suv">SUV</option>
                                    <option value="premium">Premium</option>
                                </select>
                            </div>

                            <!-- Transmissão -->
                            <div class="filtro-item">
                                <select wire:model.live="transmissao" class="filtro-select">
                                    <option value="todas">Tipo de Combustão</option>
                                    <option value="flex">Flex</option>
                                    <option value="gasolina">Gasolina</option>
                                    <option value="alcool">Alcool</option>
                                </select>
                            </div>

                            <!-- Capacidade -->
                            <div class="filtro-item">
                                <select wire:model.live="pessoas" class="filtro-select">
                                    <option value="todas">Qualquer Capacidade</option>
                                    <option value="2 Pessoas">2 pessoas</option>
                                    <option value="5 Pessoas">5 pessoas</option>
                                    <option value="7 Pessoas">7 pessoas</option>
                                    <option value="9 Pessoas">9+ pessoas</option>
                                </select>
                            </div>

                            <!-- Botão limpar -->
                            <div class="filtro-actions">
                                <button type="button" wire:click="resetFilters" class="btn-limpar"
                                    title="Limpar Filtros">
                                    <ion-icon name="refresh-outline"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <!-- Preço -->
                        <div class="price-row">
                            <div class="price-filter">
                                <span class="price-label">Preço máximo ({{ $precoTipo }}):</span>
                                <input type="range" id="priceRange" wire:model.live="price" min="50"
                                    max="100000" value="100000" class="price-slider">
                                <span class="price-value">R$ <span
                                        id="currentPrice">{{ number_format($price, 0, ',', '.') }}</span></span>

                            </div>
                        </div>

                        <div class="resultados-info">
                            <span>{{ $cars->total() }} veículos encontrados</span>
                        </div>
                    </div>
                </div>
            </section>


            <!-- FROTA GRID -->
            <section class="frota-grid">
                <div class="container">
                    <div class="grid-header">
                        <h2 class="section-title">Escolha seu Veículo</h2>
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid">
                                <ion-icon name="grid-outline"></ion-icon>
                            </button>
                            <button class="view-btn" data-view="list">
                                <ion-icon name="list-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <div   x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95" class="vehicles-grid" id="vehicles-container">
                        @forelse ($cars as $index => $car)

                                        <!-- Informações do carro -->
                                        @php
                                            $features = is_array($car->features)
                                                ? $car->features
                                                : json_decode($car->features, true);
                                        @endphp
                            <div wire:key="car-{{ $car->id }}" x-data="{ visible: false }" x-init="setTimeout(() => visible = true, {{ $index * 100 }})"
                                :class="visible ? 'fade-up show vehicle-card' : 'fade-up vehicle-card'"
                                data-category="{{ ucfirst($features['categoria']) ?? 'Não informado' }}">
                                <div class="card-image">
                                    @php
                                        $images = is_array($car->images)
                                            ? $car->images
                                            : json_decode($car->images, true);
                                    @endphp
                                    <img src="{{ $car->main_image }}" alt="{{ $car->name }}">


                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">{{ $car->name }}</h3>
                                    <div class="card-specs">

                                        <span><ion-icon name="people-outline"></ion-icon>{{ $car->espaco }}</span>
                                        <span><ion-icon
                                                name="speedometer-outline"></ion-icon>{{ ucfirst($features['categoria']) ?? 'Não informado' }}</span>
                                        <span><ion-icon
                                                name="leaf-outline"></ion-icon>{{ ucfirst($features['tipo']) ?? 'Não informado' }}</span>
                                    </div>
                                    <div class="card-price">
                                        <span class="price-label">A partir de</span> <!-- Preço escolhido -->
                                        @php
                                            $prices = is_array($car->price)
                                                ? $car->price
                                                : json_decode($car->price, true);
                                            $priceValue = $prices['Diária'] ?? null;
                                        @endphp
                                        @if ($priceValue)
                                            <span class="card-price-value">R$
                                                {{ number_format($priceValue, 2, ',', '.') }}<small>/dia</small></span>
                                        @else
                                            Consulte
                                        @endif
                                    </div>
                                    <a href="{{ route('reserva') }}" class="btn-reserve">Reservar Agora</a>
                                </div>
                            </div>

                        @empty
                            <p>Nenhum veículo encontrado.</p>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $cars->links() }}
                    </div>
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
