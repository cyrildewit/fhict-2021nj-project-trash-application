@extends('management.layouts.main')

@section('title', 'Gebruiker aanmaken')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gebruiker aanmaken</h1>
    {{-- <div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
        class="fas fa-trash fa-sm text-white-50"></i> Opslaan</button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
        class="fas fa-trash fa-sm text-white-50"></i> Opslaan en teruggaan</button>
    </div> --}}
</div>

<div class="row">

    <div class="col-lg-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gebruiker gegevens</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.user.store') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail">E-mailadres</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    id="exampleInputEmail" name="email"
                                    placeholder="E-mailadres" value="{{ old('email') }}">

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword">Wachtwoord</label>

                                <input type="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    id="exampleInputPassword" name="password"
                                    placeholder="Wachtwoord" value="{{ old('password') }}">

                                @if($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPasswordConfirmation">Wachtwoord bevestigen</label>

                                <input type="password" class="form-control form-control-user {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    id="exampleInputPasswordConfirmation" name="password_confirmation"
                                    placeholder="Wachtwoord bevestigen" value="{{ old('password_confirmation') }}">

                                @if($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">NFC UID</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('nfc_uid') ? 'is-invalid' : '' }}"
                                    id="exampleInputNfcUid" name="nfc_uid"
                                    placeholder="NFC UID" value="{{ old('nfc_uid') }}">

                                @if($errors->has('nfc_uid'))
                                    <div class="invalid-feedback">{{ $errors->first('nfc_uid') }}</div>
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
