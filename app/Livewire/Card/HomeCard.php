<?php

namespace App\Livewire\Card;

use Livewire\Component;

class HomeCard extends Component
{
    public $name, $amount, $icon;

    public function mount($name, $amount, $icon)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->icon = $icon;
    }

    public function render()
    {
        $list = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-dark'];

        return view('livewire.card.home-card', [
            'name' => $this->name,
            'amount' => $this->amount,
            'icon' => $this->icon,
            'color' => $list[array_rand($list, 1)],
        ]);
    }
}
