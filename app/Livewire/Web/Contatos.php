<?php

namespace App\Livewire\Web;

use App\Mail\ContactCreatedMail;
use App\Models\Contato;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.web')]
class Contatos extends Component
{

    public $name, $phone, $subject, $email, $message;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:14',
        'subject' => 'required|string',
        'email' => 'required|string',
        'message' => 'required|string|max:300',
    ];

    public function save()
    {
        $this->validate();

        $contact = Contato::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Email para o cliente
        Mail::to($contact->email)->send(new ContactCreatedMail($contact));
        // Email para o admin
        Mail::to('wellingtonalfredo550@gmail.com')->send(new ContactCreatedMail($contact));
        session()->flash('message', 'Formulario enviado com sucesso!');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.web.contato');
    }
}
