<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
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
                            <form name="frm-login" method="POST" action="{{route('login')}}">
                                @csrf

                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                <div class="form-outline mb-4">
                                    <label class="form-label" >Email address</label>
                                    <input type="email" class="form-control" id="frm-login-uname" name="email" placeholder="Type your email address" :value="old('email')" required autofocus  />
                                </div>

                                  <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" >Password</label>
                                    <input type="password" id="frm-login-pass" name="password" placeholder="************"  required autocomplete="current-password" class="form-control" />
                                </div>
                                <div class="d-flex justify-content-around align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="frm-input " name="remember" id="rememberme" value="forever" type="checkbox"><span>Remember me</span>
                                    </div>
                                    {{-- <a class="link-function left-position" href="{{route('password.request')}}" title="Forgotten password?">Forgotten password?</a> --}}
                                </div>
                                <input type="submit"  class="btn btn-dark btn-lg btn-block" value="Login" name="submit">


                                <p class="mb-5 pb-lg-2" style="color: #393f81;"> <br> Don't have an account? <a href="{{route('register')}}" style="color: #393f81;">Register here</a></p>

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
