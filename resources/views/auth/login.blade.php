{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



@extends('layouts.registrationlay.main')
@section('content')
    <!-- ================================
                       START CONTACT AREA
                ================================= -->
    <section class="contact-area section--padding">
        <div class="container">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="font-weight-bold mb-1">Login to your account</h3>
                            <p class="font-size-15">Please check that you are visiting the correct URL</p>
                            <div class="border border-gray d-inline-block py-1 px-4 rounded-pill font-size-14 mt-3">
                                <span class="text-success"><i class="fal fa-lock mr-1"></i>https://</span>Peoplecare.com
                            </div>
                        </div>
                        <hr class="border-top-gray my-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf <div class="form-group">
                                <input class="form-control form--control" type="email" name="email"
                                    placeholder="Email address" required>
                            </div><!-- end form-group -->
                            <div class="form-group">
                                <div class="position-relative">
                                    <input class="form-control form--control password-field" type="password" name="password"
                                        placeholder="Password" required>
                                    <a href="javascript:void(0)"
                                        class="position-absolute top-0 right-0 h-100 btn toggle-password"
                                        title="Toggle show/hide password">
                                        <i class="far fa-eye eye-on"></i>
                                        <i class="far fa-eye-slash eye-off"></i>
                                    </a>
                                </div>
                            </div><!-- end form-group -->
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="signin-remember">
                                    <label class="custom-control-label font-weight-normal" for="signin-remember">Remember
                                        Me</label>
                                </div>
                                <a href="{{ route('password.request') }}"
                                    class="btn-link font-size-15 font-weight-normal">Forgot Password?</a>
                            </div><!-- end form-group -->
                            <button class="btn btn-primary w-100" type="submit"
                                style="background-color:#00ab9f; border:4px solid #00ab9f; ">Login Now</button>
                        </form>
                        <p class="font-size-14 pt-2 text-center font-weight-normal">Don't have an account? <a
                                href="{{ route('register') }}" class=" btn-link" style="color:#00ab9f; "> Create account</a>
                        </p>
                        <hr class="border-top-gray my-4">
                    </div>
                </div>
            </div>
        </div><!-- end col-lg-6 -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
                       START CONTACT AREA
                ================================= -->
@endsection
