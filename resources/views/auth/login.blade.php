<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-4">
                    <x-label for="addonEmail" class="mb-2 font-14 black bold" :value="__('Email Address')" />

                    <div class="input-group addon">
                      <div class="input-group-prepend">
                        <div class="input-group-text black bold">@</div>
                      </div>
                      <x-input id="email" type="email" name="email" :value="old('email')" required autofocus name="email" class="form-control" placeholder="Type your email here" />
                    </div>
                </div>


                <!-- Password -->
                <div class="form-group">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                             name="password"
                             required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="d-flex align-items-center mb-3 mt-4">
                    <!-- Custom Checkbox -->
                    <label class="custom-checkbox brand position-relative mr-2">
                        <input type="checkbox" id="remember_me" checked=""  name="remember">
                        <span class="checkmark"></span>
                    </label>
                    <!-- End Custom Checkbox -->


                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>


                <div class="mb-2">
                    <div class="d-flex justify-content-center align-items-baseline">
                        <x-register-button class="btn long">
                            {{ __('Log in') }}
                        </x-register-button>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-center align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted mr-3" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-center align-items-baseline">
                        @if (Route::has('password.request'))
                            <a class="text-muted mr-3" href="{{ route('register') }}">
                                {{ __('Register Here') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
