<div class="">

    @section('css')
        <link rel="stylesheet" href="/assets/css/reserva.css">
    @endsection
    <main>
        <article>

            <!-- HERO RESERVA -->
            <section class="hero-reserva">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-badge">
                            <ion-icon name="car-sport-outline"></ion-icon>
                            Reserve Online
                        </div>
                        <h1 class="hero-title pages">
                            Reserve seu <span class="highlight">veículo ideal</span>
                        </h1>
                        <p class="hero-text">
                            Processo simples e rápido para garantir o carro perfeito para sua viagem
                        </p>
                    </div>
                </div>
            </section>

            <!-- FORMULÁRIO DE RESERVA -->
            <section class="reserva-form-section">
                <div class="container">
                    <div class="form-container">
                        <div class="form-header">
                            <h2 class="section-title">Complete sua Reserva</h2>
                            <p class="section-subtitle">Processo rápido e seguro em apenas 3 etapas</p>
                            <div class="progress-bar">
                                {{-- STEP 1 --}}
                                <div class="progress-step {{ $currentStep >= 1 ? 'active' : '' }}" data-step="1">
                                    <div class="step-number">1</div>
                                    <span>Dados</span>
                                </div>

                                <div class="progress-step {{ $currentStep >= 2 ? 'active' : '' }}" data-step="2">
                                    <div class="step-number">2</div>
                                    <span>Veículo </span>
                                </div>

                            </div>
                        </div>

                        <form class="reserva-form" wire:submit.prevent="save" id="reservaForm">

                            {{-- STEP 1 --}}
                            @if ($currentStep == 1)
                                <!-- STEP 1: DADOS PESSOAIS -->
                                <div class="form-step active" data-step="1">
                                    <div class="step-content">
                                        <h3 class="step-title">Seus Dados</h3>
                                        <p class="step-description">Preencha suas informações pessoais para iniciarmos
                                            sua reserva</p>

                                        <div class="form-grid">
                                            <div class="input-group">
                                                <label for="nome">Nome Completo</label>
                                                <input type="text" wire:model="name" id="nome" name="nome"
                                                    required>
                                                @error('name')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" wire:model="email" id="email" name="email"
                                                    required>
                                                @error('email')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group">
                                                <label for="telefone">Telefone</label>
                                                <input type="tel" wire:model="phone" id="telefone" name="telefone"
                                                    required>
                                                @error('phone')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group">
                                                <label for="cpf">CPF</label>
                                                <input type="text" wire:model="cpf" id="cpf" name="cpf"
                                                    required>

                                                @error('cpf')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group full-width">
                                                <label for="endereco">Endereço</label>
                                                <input type="text" wire:model='address' id="endereco"
                                                    name="endereco" required>
                                                @error('address')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- STEP 2 --}}
                            @if ($currentStep == 2)
                                <!-- STEP 2: SELEÇÃO DE VEÍCULO -->
                                <div class="form-step">
                                    <div class="step-content">
                                        <h3 class="step-title">Escolha seu Veículo</h3>
                                        <p class="step-description">Selecione o veículo ideal para sua viagem e adicione
                                            extras opcionais</p>



                                        <div class="form-grid">

                                            <div class="input-group full-width">
                                                <label for="product">Produto:</label>
                                               

                                                <select id="product"   name="product_id"  wire:model="product_id">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <label for="dataRetirada">Data de Retirada</label>
                                                <input type="date" wire:model="pickup_date" id="dataRetirada"
                                                    name="dataRetirada" required>
                                                @error('pickup_date')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="input-group">
                                                <label for="dataDevolucao">Data de Devolução</label>
                                                <input type="date" wire:model="return_date" id="dataDevolucao"
                                                    name="dataDevolucao" required>
                                                @error('return_date')
                                                    <div class="error_message">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- NAVEGAÇÃO DO FORMULÁRIO -->
                            <div class="form-navigation">
                                @if ($currentStep == 2)
                                    <button type="button" class="btn-nav btn-prev" id="prevBtn" type="button"
                                        wire:click="decreaseStep()">
                                        <ion-icon name="arrow-back-outline"></ion-icon>
                                        Voltar
                                    </button>
                                @endif

                                @if ($currentStep == 1)
                                    <button type="button" class="btn-nav btn-next" id="nextBtn" type="button"
                                        wire:click="increaseStep()">
                                        Próximo
                                    </button>
                                @endif

                                @if ($currentStep == 2)
                                    <button type="submit" class="btn-nav btn-submit">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                        Confirmar Reserva
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </article>
    </main>

</div>
