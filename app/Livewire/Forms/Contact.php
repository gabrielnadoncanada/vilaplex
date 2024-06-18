<?php

namespace App\Http\Livewire\Forms;

use App\Models\Message;
use Livewire\Component;

class Contact extends Component
{
    public $firstName;

    public $lastName;

    public $email;

    public $tel;

    public $message;

    protected $rules = [
        'firstName' => 'required|regex:/^[a-zA-Z\s.]+$/',
        'lastName' => 'required|regex:/^[a-zA-Z\s.]+$/',
        'email' => 'required|email',
        'tel' => 'nullable',
        'message' => 'required|regex:/^[a-zA-Z0-9\s.:,!?\']+$/',
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        $message = Message::create($validatedData);

        return redirect()->route('contact')
            ->with('status', 'Votre message a bien été envoyé.<br> Nous avons reçu vos informations et nous vous répondrons dans les plus brefs délais.');

    }

    public function render()
    {
        return view('livewire.forms.contact');
    }
}
