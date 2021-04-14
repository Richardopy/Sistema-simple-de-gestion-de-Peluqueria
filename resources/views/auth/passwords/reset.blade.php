<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 style="font-size: 24px;"><b>{{ __('Reset Password') }}</b></h1>
        </x-slot>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group row">
                                    <x-jet-label for="email" value="{{ __('E-Mail Address') }}" />

                                    <div class="col-md-12">
                                        <x-jet-input id="email" type="email" class="block mt-1 w-full @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" />

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <x-jet-label for="password" value="{{ __('Password') }}" />

                                    <div class="col-md-12">
                                        <x-jet-input id="password" type="password" class="block mt-1 w-full @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus />

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <x-jet-label for="password-confirm" value="{{ __('Confirm Password') }}" />

                                    <div class="col-md-6">
                                        <x-jet-input id="password-confirm" type="password" class="block mt-1 w-full" name="password_confirmation" required autocomplete="new-password" />
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button>
                                            {{ __('Reset Password') }}
                                        </x-jet-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
