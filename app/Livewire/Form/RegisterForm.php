<?php

namespace App\Livewire\Form;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public  $email, $password, $name, $password_confirmation;

    public $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function render()
    {
        return view('livewire.form.register-form');
    }

    public function submit()
    {
        $this->validate();

        // Do something with the data
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);

        return redirect()->to('home');
    }
}
