<x-guest-layout>
<div class="container w-50 d-flex flex-column vh-100 justify-content-center align-items-center shadow-lg p-3 mb-5 bg-body-tertiary rounded border">
    <div class="row w-100 justify-content-center">
        <div class="col-auto my-2 p-0" style="height:60px;width:60px;">
            <a href="{{ route('home') }}">@include('components.application-logo')</a>
        </div>
        <div class="col-12">
            <p class="p-0 m-0 lead w-100 text-start">Register</p>
        </div>
    </div>
    <form method="POST" action="{{ route('register') }}" class="row border-top border-bottom py-2 needs-validation" novalidate>
        @csrf        
        <!-- Firstname -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Firstname</span>
            <input name="firstname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- Lastname -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Lastname</span>
            <input name="lastname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- Email -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            <input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- Phone number -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Phone number</span>
            <input name="phone_number" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- Address -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
            <input name="address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- City -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">City</span>
            <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required>
        </div>
        <!-- Password -->
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            <input name="password" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required autocomplete="new-password" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Confirm password</span>
            <input name="confiirm-password" type="password"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
            required autocomplete="new-password" required>
        </div>
        <div class="input-group mb-3 justify-content-center">
            <button class="btn btn-outline-primary" type="submit">Sign up</button>
        </div>
    </form>    
</div>
</x-guest-layout>
