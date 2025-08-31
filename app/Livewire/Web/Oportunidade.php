<?php

namespace App\Livewire\Web;

use App\Mail\ContactCreatedMail;
use App\Models\Contato;
use App\Models\Oportunidades;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Layout('components.layouts.web')]
class Oportunidade extends Component
{

    use WithFileUploads;

    public $name, $phone, $subject, $email, $message, $link_path;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string',
        'phone' => 'required|string|max:14',
        'subject' => 'required|string',
        'message' => 'required|string|max:300',
        'link_path' =>  ['nullable', 'file', 'mimes:pdf', 'max:30720'], // 30MB
    ];

    public function save()
    {
        $caminho = null;
        if ($this->link_path instanceof TemporaryUploadedFile) {
            $caminho = $this->link_path->store('curriculos', 'public');
        }
        $contact = Oportunidades::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'email' => $this->email,
            'message' => $this->message,
            'link_path' => $caminho,
        ]);

        // Email para o cliente
        Mail::to($contact->email)->send(new ContactCreatedMail($contact));
        // Email para o admin
        Mail::to('wellingtonalfredo550@gmail.com')->send(new ContactCreatedMail($contact));
        session()->flash('message', 'Curriulo enviado com sucesso!');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.web.oportunidades');
    }
}
