<x-guest-layout>
<div class="container w-50 d-flex flex-column vh-100 justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body-tertiary rounded border">
    <div class="row w-100 justify-content-center">
        <div class="col-auto p-0" style="height:60px;width:60px;">
        <span class="h-auto w-auto">
            <a href="{{ route('home') }}">@include('components.application-logo')</a>
        </span>
        </div>
        
    </div>
    <form method="POST" action="{{ route('login') }}" class="row border-top border-bottom py-4 needs-validation" novalidate>
        @csrf
        <!-- Email -->
        <div class="input-group mb-3">
            <span class="input-group-text col-2 justify-content-center" id="inputGroup-sizing-default">Email</span>
            <input name="email" type="email" class="form-control" aria-label="Sizing example input" 
            aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        
        <!-- Password -->
        <div class="input-group mb-3">
            <span class="input-group-text col-2 justify-content-center" id="inputGroup-sizing-default">Password</span>
            <input name="password" type="password" class="form-control" aria-label="Sizing example input" 
            aria-describedby="inputGroup-sizing-default"
            required autocomplete="-password" required>
        </div>

        <div class="row justify-content-between align-items-center">
            <div class="col-auto">
                <p class="p-0 m-0 lead w-100 text-start">Login</p>
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-primary" type="submit">Sign in</button>
            </div>
        </div>
        
        
    </form>    
</div>
</x-guest-layout>
