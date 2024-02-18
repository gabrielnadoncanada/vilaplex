<?php

namespace App\Http\Livewire;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactComponent extends Component
{
    public $firstName;

    public $lastName;

    public $email;

    public $message;

    public $phone;

    public function submitForm()
    {
        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'min:10',
        ]);

        $contactFormData = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'message' => $this->message,
            'phone' => $this->phone,
        ];

        Notification::route('mail', ENV('CONTACT_EMAIL'))
            ->notify(new AdminContactNotification($contactFormData));

        $anonNotifiable = (new AnonymousNotifiable)->route('mail', $this->email);
        $anonNotifiable->notify(new UserContactNotification($contactFormData));

        $this->reset();

        $this->notify([
            'title' => __('notifications.status.success'),
            'type' => 'success',
            'message' => __('notifications.message_sent'),
        ]);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
