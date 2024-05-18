{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <main id="main" class="main-site left-sidebar">


        <section class="vh-100" style="background-color: #c2beb7;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img
                          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                          alt="login form"
                          class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                        />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                        <x-jet-validation-errors class="mb-4" />
                            <form name="frm-login" method="POST" action="{{route('register')}}">
                                @csrf

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create an account</h5>
                                <div class="form-outline mb-3">
                                    <label class="form-label" >name*</label>
                                    <input type="text" class="form-control" id="frm-login-uname" name="name" placeholder="Type your name" :value="name" required autofocus autocomplete="name" />

                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" >Email address*</label>
                                    <input type="email" class="form-control" id="frm-login-uname" name="email" placeholder="Type your email address" :value="email" />

                                </div>

                                <h5 class="fw-normal mb-2 pb-" style="letter-spacing: 1px;">Login information</h5>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label class="form-label" >Password*</label>
                                        <input type="password" id="frm-login-pass" name="password" placeholder="************"  required autocomplete="new-password" class="form-control" />
                                    </div>
                                    <div class="col form-group">
                                        <label class="form-label" >Confirm Password*</label>
                                        <input type="password" id="frm-login-pass" name="password_confirmation" placeholder="************"  required autocomplete="new-password" class="form-control" />
                                    </div>
                                </div>


                                <input type="submit" class="btn btn-dark btn-lg btn-block" value="Register" name="register">



                            </form>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>


	</main>
</x-guest-layout>
