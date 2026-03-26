<?php

use Livewire\Component;

new class extends Component
{
    public int $count=0;

    public function mount()
    {
        //$this->count = 25;
        $this->fill(['count'=>25]);
    }

    public function increase()
    {
        $this->count++;

    }
};
?>
{{--
<div>
   <h1>{{ $count }}</h1>
   <button wire:click="increase">Increase</button>
</div> --}}
