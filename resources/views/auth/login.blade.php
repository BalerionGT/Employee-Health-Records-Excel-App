<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <!-- Login container -->
    <div class="row border rounded-lg p-3 bg-white shadow box-area" >

        <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column left-box">
            <img src="/images/login_page.svg">
        </div>
        
        <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column right-box" style="background-color: #ececec;">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row align-items-center">
                    <!-- Email Address -->
                    <div class="mt-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="container mt-5 d-flex justify-content-between">
                        <!-- Remember Me -->
                        <div class="col-md-6 d-flex justify-content-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="col-md-6" >
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>        
                    </div>
                    
                    <div class="mt-5">
                        <button type="submit" class="btn btn-lg btn-primary w-100 shadow-none">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
