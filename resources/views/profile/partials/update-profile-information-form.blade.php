<div class="row">
    
    <div class="col-12">
        
        <h6 class="display-6 my-2 mb-4">Update Profile Information</h6>
    </div>
    <div class="col-12">
        <form action="">
            <?php $x = 1 ?>
        <!-- Firstname -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">Firstname</button>
        
            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->firstname }}</span>
            <input name="firstname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        
        <!-- Lastname -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ++$x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">Lastname</button>

            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->lastname }}</span>
            <input name="lastname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        <!-- Email -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ++$x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">Email</button>

            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->email }}</span>
            <input name="email" type="email" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        <!-- Phone number -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ++$x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">Phone number</button>

            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->phone_number }}</span>
            <input name="phone_number" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        <!-- Address -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ++$x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">Address</button>

            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->address }}</span>
            <input name="address" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        <!-- City -->
        <div class="input-group mb-3 dropend">
        <button class="input-group-text col-2 dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ ++$x }}" 
        aria-expanded="false" aria-controls="collapse{{ $x }}">City</button>

            <span class="input-group-text col-auto collapse collapse-horizontal" id="collapse{{ $x }}">{{ $user->city }}</span>
            <input name="city" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="collapse{{ $x }}"
            required>
        </div>
        <div class="input-group mb-3 justify-content-center">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Update</button>
        </div>

        </form>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btnTriggerMe">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm password</h1>
        
      </div>
      <div class="modal-body">
        <input type="password" class="form-control mb-2" value="" id="inputCheck">
        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
        <button type="button" class="btn btn-primary" onclick="checkThisOut(this)">Confirm</button>
        <a href=""></a>
      </div>
      
    </div>
  </div>
</div>
<script>
    window.addEventListener("load", (event) => {
  
  //document.getElementById('btnTriggerMe').click();
});
function checkThisOut(event){
    console.log(event);
    const x = event.parentElement.firstElementChild.value;
    console.log(x);
}
</script>
<!--
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

-->