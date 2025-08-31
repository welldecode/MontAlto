<div>
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

    {{-- Resultados --}}
    <div class="mt-6">
        @if($carros && count($carros))
            <ul>
                @foreach($carros as $carro)
                    <li class="py-2 border-b">
                        {{ $carro->marca }} {{ $carro->modelo }} ({{ $carro->ano }}) -
                        <strong>R$ {{ number_format($carro->valor_mensal, 2, ',', '.') }}</strong>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">Nenhum carro encontrado.</p>
        @endif
    </div>
</div>