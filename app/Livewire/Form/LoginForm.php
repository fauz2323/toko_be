<?php

namespace App\Livewire\Form;

use Livewire\Component;

class LoginForm extends Component
{
    public $email, $password;

    public $rules = [
        'email' => 'required|min:4|email',
        'password' => 'required|min:4',
    ];

    public function render()
    {
        return view('livewire.form.login-form');
    }

    public function submit()
    {
        $this->validate();

        // Do something with the data
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->to('home');
        } else {
            session()->flash('error', 'Invalid username or password');
        }
    }
}
