

<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
        <p>{{ __("You're logged in!") }}</p>
        @include('workbench')
        @if(session('message'))
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Sent</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                {{ session('message') }}
                </div>
            </div>
        @endif
    </x-slot>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded container mb-2 h-100">
        @include('client.client-dash')
        
    </div>

</x-app-layout>

