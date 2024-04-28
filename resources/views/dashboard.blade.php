

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <p>{{ __("You're logged in!") }}</p>
        @include('workbench')
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('client.client-dash')
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- Dropdown Trigger -->
<!-- Dropdown Menu -->
<!--
    <div x-data="{ open: false }" @click.away="open = false">
  
  <button @click="open = !open" class="px-4 py-2 bg-gray-200 hover:bg-gray-300">Toggle Dropdown</button>
  
  
  <div x-show="open" class="absolute mt-2 py-2 bg-white border rounded shadow-md">
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 1</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 2</a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Option 3</a>
  </div>
</div>
-->
