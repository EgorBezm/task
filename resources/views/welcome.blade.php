@extends('layouts.master')

@section('contentAuthorized')

@stop

@section('contentNotAuthorized')
    <div class="welcome-page">
        <div class="register">
            <div class="welcome-page__emoji">
                <img src="{{ asset('images/emoji/image4.png') }}" width="32px" height="32px" alt="">
            </div>
            <div class="welcome-page__text">
                I'm here for the first time! <span class="register__link" id="reg" data-hystmodal="#modalReg">Register</span> me!
            </div>
        </div>
        <div class="login">
            <div class="welcome-page__emoji">
                <img src="{{ asset('images/emoji/image5.png') }}" width="32px" height="32px" alt="">
            </div>
            <div class="welcome-page__text">
                I have an account, I want to <span class="login__link" id="log" data-hystmodal="#modalLog">Log In</span>!
            </div>
        </div>
    </div>

    {{--  MODALS WINDOWS  --}}
    {{--  Registration  --}}

    <div class="hystmodal hystmodal--simple" id="modalReg" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window hystmodal__window--form" role="dialog" aria-modal="true">
                <button class="modal__close" style="background-image: url('{{ asset('images/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__buttons">
                        <button class="button-to-login" data-hystmodal="#modalLog">Login</button>
                        <button class="button-to-registration" disabled>Registration</button>
                    </div>
                    <div class="loginblock__h1">Registration</div>
                    <form action="#" method="POST">
                        <div class="formitem">
                            <div class="formitem__text">Your name</div>
                            <input type="text" name="username" placeholder="Type your Name here..." value="">
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="username" placeholder="Type your Email here..." value="">
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Password</div>
                            <input type="password" name="username" placeholder="Type your Password here..." value="">
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Confirm password</div>
                            <input type="password" name="username" placeholder="Confirm your Password here..." value="">
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="button" onclick="alert('All is OK.'); return false;">Registration</button>
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
                <button class="modal__close" style="background-image: url('{{ asset('images/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__buttons">
                        <button class="button-to-login" disabled>Login</button>
                        <button class="button-to-registration" data-hystmodal="#modalReg">Registration</button>
                    </div>
                    <div class="loginblock__h1">Login</div>
                    <form action="#" method="POST">
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="username" placeholder="Type your Email here..." value="">
                        </div>
                        <div class="formitem">
                            <div class="formitem__text">Password</div>
                            <input type="password" name="username" placeholder="Type your Password here..." value="">
                        </div>
                        <div class="loginblock__bottom flexi">
                            <label class="formcheckbox">
                                <input type="checkbox" name="remember" tabindex="0">
                                <span class="flexi"><i class="checkplace"><img src="https://addmorescripts.github.io/hystModal/img/check.svg" alt=""></i>Remember me</span>
                            </label>
                            <a class="loginblock__link" data-hystmodal="#modalReset">Forget Password</a>
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="button" onclick="alert('All is OK.'); return false;">Login</button>
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
                <button class="modal__close" style="background-image: url('{{ asset('images/close.png') }}');" data-hystclose>Закрыть</button>
                <div class="hystmodal__styled">
                    <div class="loginblock__h1 reset-h1">Reset Password</div>
                    <form action="#" method="POST">
                        <div class="formitem">
                            <div class="formitem__text">Email</div>
                            <input type="email" name="username" placeholder="Type your Email here..." value="">
                        </div>
                        <div class="formtext">
                            We will send a password recovery email to your email.
                        </div>
                        <div class="formsubmit">
                            <button type="submit" class="button" onclick="alert('All is OK.'); return false;">Send password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
