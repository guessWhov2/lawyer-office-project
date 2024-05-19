<x-guest-layout>
    
<div class="container w-50 d-flex flex-column bg-transparent position-absolute top-50 start-50 translate-middle" style="margin-top: -50px;">
    <div class="row w-100 justify-content-start">
        <div class="col-auto">
            <p class="p-0 m-0 lead">Enter your credentials</p>
        </div>
        
    </div>
    @if(session('message'))
        <div class="alert alert-info position-absolute top-50 start-50 translate-middle w-auto" role="alert">
            <p class="m-0 p-0 d-inline-block me-4">{{ session('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    <form method="POST" action="{{ route('admin.panel') }}" class="row border-top py-4 needs-validation" novalidate>
        @csrf
        <!-- Pw -->
        <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" aria-label="Password" 
            aria-describedby="/" required placeholder="Password">
            <input name="phrase" type="password" class="form-control" aria-label="Phrase" 
            aria-describedby="/"
            required autocomplete="password" required placeholder="Phrase">
        </div>
        <div class="row justify-content-center align-items-center">
            
            <div class="col-auto">
                <button class="btn btn-outline-light px-4 fs-6" type="submit">Continue</button>
            </div>
        </div>
        
        
    </form>    
</div>

</x-guest-layout>