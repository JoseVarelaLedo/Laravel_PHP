<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;
    public string $message = 'Actualizado';
    public string $username = 'Jose';
    public string $color = 'black';

    public function mount()
    {
        $this->count = 25;
    }

    // public function updated()
    // {
    //     $this->color = 'red';
    // }

    public function increase()
    {
        $this->count++;
    }
}
