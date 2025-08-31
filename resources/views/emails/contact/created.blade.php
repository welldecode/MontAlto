@component('mail::message')
# Formulario de Contato

Olá **{{ $contact->name }}**, seu Formulario de Contato foi enviado com sucesso. 

**Assunto:** {{ $contact->subject }}  
 
 {{ $contact->message }}  

Em breve entraremos em contato para mais detalhes.
 

Obrigado,<br>
{{ config('app.name') }}
@endcomponent