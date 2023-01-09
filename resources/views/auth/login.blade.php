@extends('auth.layoutAuth')
@section('title', 'Login')
@section('content')
    <div class="body-login">
        <!-- ============================================================== -->
        <!-- login page  -->
        <!-- ============================================================== -->
        <div class="splash-container">
            <div class="bg"></div>
            <div class="bg bg2"></div>
            <div class="bg bg3"></div>

            <div class="card ">
                <div class="card-header text-center">
                    <a href="{{ route('web.home') }}"><img class="logo-img mb-2" src="backend/images/logo_1.png" alt="logo"
                            height="50"></a>
                    <span class="splash-description">Please enter your user information.</span>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-error" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ Session::get('error') }}
                            @php
                                Session::forget('error');
                            @endphp
                        </div>
                    @endif
                    {{--
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" name="phone" class="form-control"
                            placeholder="Your Phone" />
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div> --}}


                    {!! Form::open()->post()->route('auth.user.login') !!}
                    {!! Form::text('email')->type('email')->attrs(['class' => 'form-control-lg'])->placeholder('Email') !!}
                    {!! Form::text('password')->type('password')->attrs(['class' => 'form-control-lg'])->placeholder('Password') !!}
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember"><span
                                class="custom-control-label">Remember Password</span>
                                <a href="{{ route('web.reset.pass') }}"> <span>Forgot Password?</span></a>

                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                    {!! Form::close() !!}

                </div>
                {{-- <div class="card-body box-1">
                    <a href="{{ route('user.registration') }}">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                    </a>
            </div> --}}
                <div class="card-body">
                    <a href="{{ route('user.registration') }}">
                        <div class=" box-1">
                            <div class="btn btn-one">
                                <span>Sign Up</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
