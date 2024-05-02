<?php

use Illuminate\Support\Facades\Cache;

$caseTypes = Cache::get('caseTypes');
?>
<x-app-layout>
    <x-slot name="header">@include('workbench')
       
    </x-slot>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded container mb-2 h-100">
        
        @if($userRole->name == 'Client')
            @include('client.client-dash')    
        @elseif($userRole->name == "Lawyer")
            @include('lawyer.lawyer-dash')
        @elseif($userRole->name == "Staff")
            
        @else
            
        @endif
    </div>

</x-app-layout>

