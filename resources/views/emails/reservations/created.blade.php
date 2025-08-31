@component('mail::message')
# Reserva Confirmada ✅

Olá **{{ $reservation->name }}**, sua reserva foi registrada com sucesso.

**Produto:** {{ $reservation->product->name }}  
**Data de Retirada:** {{ \Carbon\Carbon::parse($reservation->pickup_date)->format('d/m/Y') }}  
**Data de Devolução:** {{ \Carbon\Carbon::parse($reservation->return_date)->format('d/m/Y') }}  

Em breve entraremos em contato para mais detalhes.

@component('mail::button', ['url' => config('app.url')])
Ver Detalhes
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent