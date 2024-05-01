<?php

?>
<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
        <p>Auth - {{ Auth::user()->firstname }}</p>
        
        @include('workbench')
       
    </x-slot>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded container mb-2 h-100">
       
    </div>

</x-app-layout>

