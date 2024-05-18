<?php

use Illuminate\Support\Facades\Cache;

$caseTypes = Cache::get('caseTypes');
?>
<x-app-layout>
    <x-slot name="header">@include('workbench')

    </x-slot>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded container mb-2 h-100">
        @if(session('message'))
        <div class="alert alert-info position-absolute top-50 start-50 translate-middle w-auto" role="alert">
            <p class="m-0 p-0 d-inline-block me-4">{{ session('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(Auth::user()->role->name == 'Client')
        @include('client.client-dash')
        @elseif(Auth::user()->role->name == "Lawyer")
        @include('lawyer.lawyer-dash')
        @elseif(Auth::user()->role->name == "Staff")

        @else

        @endif
    </div>

</x-app-layout>