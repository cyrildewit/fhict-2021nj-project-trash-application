@extends('management.layouts.main')

@section('title', 'Gebruiker '.$user->name.' bewerken')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gebruiker {{ $user->name }} bewerken</h1>
</div>

@if(session()->has('message'))
    <x-status-message :type="session('status')" :message="session('message')"></x-status-message>
@endif

<div class="row">

    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gebruikerdetails</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.user.update', ['uuid' => $user->uuid]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') ?? $user->name }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail">E-mailadres</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputEmail" name="email"
                                    placeholder="E-mailadres" value="{{ old('email') ?? $user->email }}">

                                @if($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">NFC UID</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('nfc_uid') ? 'is-invalid' : '' }}"
                                    id="exampleInputNfcUid" name="nfc_uid"
                                    placeholder="NFC UID" value="{{ old('nfc_uid') ?? $user->nfc_uid }}">

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

    <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profielfoto</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.user.update-avatar', ['uuid' => $user->uuid]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputName">Profielfoto</label>

                                <input type="file" class="form-control form-control-user {{ $errors->has('avatar') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="avatar">

                                @if($errors->has('avatar'))
                                    <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
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
