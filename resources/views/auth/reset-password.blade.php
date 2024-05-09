<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login container -->
    <div class="row border rounded-lg p-3 bg-white shadow box-area">

        <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column left-box">
            <img src="/images/login_page.svg">
        </div>

        <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column right-box" style="background-color: #ececec;">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-5">
                    <button type="submit"class="btn btn-lg btn-primary w-100 shadow-none">{{ __('Reset Password') }}</button>
                    </div>
            </form>
        </div>
    </div>
</x-guest-layout>
