<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- First Name -->
                <div class="form-group">
                    <x-label for="first_name" :value="__('First Name')" />

                    <x-input id="first_name" type="text" name="first_name" :value="old('first_name')" required autofocus />
                </div>
                <!-- Last Name -->
                <div class="form-group">
                    <x-label for="last_name" :value="__('Last Name')" />

                    <x-input id="last_name" type="text" name="last_name" :value="old('last_name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-2">
                    <div class="d-flex justify-content-center align-items-baseline">

                        <x-register-button>
                            {{ __('Register') }}
                        </x-register-button>
                    </div>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-center align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
