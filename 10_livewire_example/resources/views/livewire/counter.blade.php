<div>
   <h1>{{ $count }}</h1>

   <button wire:click="increase">Increase</button>

   {{-- <h3 style="color: {{ $color }}">
       <em>{{ $message }}</em>
   </h3> --}}

   <input type="text"  wire:model="username" />
   <br/>
   <h3> {{ $username }}</h3>
</div>
