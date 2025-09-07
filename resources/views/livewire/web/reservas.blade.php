<div class="">

    @section('css')
        <link rel="stylesheet" href="/assets/css/reserva.css">
        <link rel="stylesheet" href="/assets/css/quem-somos.css">
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
                            <h2 class="section-title">Faça sua Reserva</h2>
                        </div>

                        <form class="reserva-form" wire:submit.prevent="save" id="reservaForm">

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


                            <!-- NAVEGAÇÃO DO FORMULÁRIO -->
                            <div class="form-navigation">

                                    <button type="submit" class="btn-nav btn-submit">
                                        <ion-icon name="checkmark-outline"></ion-icon>
                                        Confirmar Reserva
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="company-info">
                <div class="container">
                    <div class="info-grid">
                        <div class="info-text">
                            <h2 class="section-title">Termos e condições de Reserva.</h2>
                            <p>Para retirar o veículo, você precisa ter, no mínimo, 21 anos de idade, 3 anos de habilitação e ter o cartão de crédito aprovado pela Montalto.
                            A diária do veículo é de 24 horas, com até 1 hora de tolerância para devolução. A partir da 25ª hora, será cobrada hora extra de (1/5 do valor da diária para cada hora excedente), inclusive a hora de tolerância.
                            A diária das proteções de risco é de 24 horas, com 1 hora de tolerância. A partir da 25a hora, incidirá cobrança de mais 1 diária dos seguros.
                            É obrigatória a apresentação do Boletim de Ocorrência em caso de furto, roubo, incêndio e colisão.
                            Para as locações com período igual ou superior a 7 diárias, o pagamento deverá ser antecipado.
                            O veículo é entregue limpo e assim deverá ser devolvido. Caso seja devolvido com sujeira excessiva, fora dos padrões normais e razoáveis, será cobrada taxa de lavagem conforme tabela própria.
                            Em caso de furto, roubo ou avaria do navegador GPS será cobrado taxa de indenização no valor de R$500,00.
                            Os valores de contratação de motorista e aluguel de adicionais não farão parte do valor total das diárias reservadas, sendo seus valores somados e cobrados no momento da retirada do veículo.
                            Em caso de contratação de motorista, o cliente arcará com eventuais despesas de pedágio e pernoite, caso hajam.
                            As cláusulas e condições do contrato de locação de veículos encontrão-se à sua disposição em nossa lojas.
                            Para alteração, cancelamento ou consulta da sua reserva, informe o número de confirmação de sua reserva em nosso site ou através dos telefones : 21 97033-9171 (WhatsApp) ou 21 2541-3045</p>

                        </div>

                    </div>
                </div>
            </section>
        </article>
    </main>

</div>
