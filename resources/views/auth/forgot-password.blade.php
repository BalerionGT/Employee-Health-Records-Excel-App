<x-guest-layout>
<div class="row border rounded-lg p-3 bg-white shadow box-area" >

    <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column left-box">
        <img src="/images/forget.svg">
    </div>

    <div class="col-md-6 rounded-lg d-flex justify-content-center align-items-center flex-column right-box" style="background-color: #ececec;">
        
        <div class="mb-4 text-lg text-gray-600">
            {{ __('Forgot your password? No problem. Enter your E-mail.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf


            <div class="row align-items-center">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="btn btn-lg btn-primary w-100 shadow-none" type="submit">
                        {{ __('Email Password Reset Link') }}
                    </a>
                </div>
            </div>

        </form>
    </div>

</div>
</x-guest-layout>
