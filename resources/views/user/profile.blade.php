@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Profile</div>
        </div>
        </div>

        <div class="section-body">
            {{-- BASIC INFORMATION --}}
            <div class="card">
                <div class="card-header">
                    <h4>Profile Information</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><p>Update your account's profile information and email address.</p></h6>
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="firstname">First Name</label>
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname', $user->firstname) }}" placeholder="First Name" tabindex="1" required >
                                @if ($errors->has('firstname'))
                                    <code>{{ $errors->first('firstname') }}</code>
                                @endif
                            </div>
                            <div class="form-group col-6">
                                <label for="lastname">Last Name</label>
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname', $user->lastname) }}" placeholder="Last Name" tabindex="2" required>
                                @if ($errors->has('lastname'))
                                    <code>{{ $errors->first('lastname') }}</code>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="username" class="form-control" name="username" value="{{ old('username', $user->username) }}" placeholder="Username" tabindex="3" required>
                            @if ($errors->has('usersname'))
                                <code>{{ $errors->first('username') }}</code>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" tabindex="4" required>
                            @if ($errors->has('email'))
                                <code>{{ $errors->first('email') }}</code>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            {{-- /basic information --}}


            {{-- PASSWORD --}}
            <div class="card">
                <div class="card-header">
                    <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><p>Ensure your account is using a long, random password to stay secure.</p></h6>

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input id="current_password" type="password" class="form-control" name="current_password" value="" placeholder="Current Password" tabindex="5" >
                            @if ($errors->updatePassword->has('current_password'))
                                <code>{{ $errors->updatePassword->first('current_password') }}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="New Password" tabindex="6" >
                            @if ($errors->updatePassword->has('password'))
                                <code>{{ $errors->updatePassword->first('password') }}</code>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" placeholder="New Password" tabindex="7">
                            @if ($errors->updatePassword->has('password_confirmation'))
                                <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            {{-- /password --}}

        </div>
    </section>
@endsection
