
    
    <form method="POST" action="{{ route('login') }}" class="container w-50">
        @csrf
        @error('any')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" id="email" name="email" class="form-control"  placeholder="">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="" autocomplete="current-password">
        </div>
        <button type="submit">Kuda?</button>
        
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>    
        <x-input-error :messages="$errors->any()" class="mt-2" />
    </form>

    