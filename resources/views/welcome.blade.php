@extends('layouts.master')

@section('content')
    <div class="welcome-page">
        <div class="register">
            <div class="welcome-page__emoji">
                <img src="{{ asset('images/emoji/image4.png') }}" width="32px" height="32px" alt="">
            </div>
            <div class="welcome-page__text">
                I'm here for the first time! <button class="register__link" id="reg" data-hystmodal="#modalReg">Register</button> me!
            </div>
        </div>
        <div class="login">
            <div class="welcome-page__emoji">
                <img src="{{ asset('images/emoji/image5.png') }}" width="32px" height="32px" alt="">
            </div>
            <div class="welcome-page__text">
                I have an account, I want to <button class="login__link" id="log" data-hystmodal="#modalLog">Log In</button>!
            </div>
        </div>
    </div>

    {{--  MODALS WINDOWS  --}}
    {{--  Registration  --}}

    <div class="hystmodal hystmodal--simple" id="modalReg" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__buttons">
                        <button class="btn-2 btn-login" data-hystmodal="#modalLog">Login</button>
                        <button class="btn-2" disabled>Registration</button>
                    </div>
                    <div class="loginblock__h1">Registration</div>
                    <div class="loginblock__error"><b>Error:</b> <span id="regError"></span></div>
                    <form action="{{ route('registration') }}" method="POST" id="jsForm">
                        @csrf
                        <div class="formitem">
                            <div class="formitem__text">Your name</div>
                            <input type="text" name="name" placeholder="Type your Name here..." value="" maxlength="50" required>
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="email" placeholder="Type your Email here..." value="" maxlength="50" required>
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Password</div>
                            <input type="password" name="password" placeholder="Type your Password here..." value="" minlength="8" maxlength="50" required>
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Confirm password</div>
                            <input type="password" name="password_confirmation" placeholder="Confirm your Password here..." minlength="8" maxlength="50" value="" required>
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="btn" id="registration">Registration</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  Login  --}}

    <div class="hystmodal hystmodal--simple" id="modalLog" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__buttons">
                        <button class="btn-2 btn-login" disabled>Login</button>
                        <button class="btn-2" data-hystmodal="#modalReg">Registration</button>
                    </div>
                    <div class="loginblock__h1">Login</div>
                    <div class="loginblock__error"><b>Error:</b> You have entered incorrect email or password</div>
                    <form action="{{ route('loginApi') }}" method="POST" id="jsFormLogin" data-url="{{ route('authorization') }}">
                        @csrf
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="email" placeholder="Type your Email here..." value="" maxlength="50" required>
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Password</div>
                            <input type="password" name="password" placeholder="Type your Password here..." value="" minlength="8" maxlength="50" required>
                        </div>
                        <div class="loginblock__bottom flexi">
                            <label class="formcheckbox">
                                <input type="checkbox" name="remember" id="remember">
                                <span class="flexi"><i class="checkplace"><img src="https://addmorescripts.github.io/hystModal/img/check.svg" alt=""></i>Remember me</span>
                            </label>
                            <a class="loginblock__link" data-hystmodal="#modalReset">Forgot Password</a>
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--  Reset Password  --}}

    <div class="hystmodal hystmodal--simple" id="modalReset" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/icons/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__h1 reset-h1">Reset Password</div>
                    <form action="#" method="POST" id="passwordResetForm">
                        @csrf
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="email" placeholder="Type your Email here..." value="">
                        </div>
                        <div class="formtext">
                            We will send a password recovery email to your email.
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="btn">Send password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
