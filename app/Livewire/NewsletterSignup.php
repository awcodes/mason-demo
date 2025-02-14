<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Isolate;
use Livewire\Component;

#[Isolate]
class NewsletterSignup extends Component
{
    public string $backgroundColor = 'primary';

    public string $heading;

    public string $email;

    public function submit(): void
    {
        $this->reset('email');
        $this->js("alert('Thank you for signing up!')");
    }

    public function render(): View
    {
        return view('livewire.newsletter-signup');
    }
}
