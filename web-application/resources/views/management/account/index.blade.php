@extends('management.layouts.main')

@section('title', 'Account')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Account</h1>
</div>

<div class="row">

    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profiel</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.auth.user.account.profile.update') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') ?? $employee->name }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail">E-mailadres</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    id="exampleInputEmail" name="email"
                                    placeholder="E-mailadres" value="{{ old('email') ?? $employee->email }}">

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">Opslaan</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Wachtwoord</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.auth.user.account.password.update') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputCurrentPassword">Huidig wachtwoord</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                                    id="exampleInputCurrentPassword" name="current_password"
                                    placeholder="Huidig wachtwoord">

                                @if($errors->has('current_password'))
                                    <div class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Nieuw wachtwoord</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="new_password"
                                    placeholder="Nieuw wachtwoord">

                                @if($errors->has('new_password'))
                                    <div class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Nieuw wachtwoord bevestigen</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="new_password_confirmation"
                                    placeholder="Nieuw wachtwoord bevestigen">

                                @if($errors->has('new_password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('new_password_confirmation') }}</div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success">Opslaan</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
