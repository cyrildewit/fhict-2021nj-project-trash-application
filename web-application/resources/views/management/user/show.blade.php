@extends('management.layouts.main')

@section('title', 'Gebruiker '.$user->name )

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gebruiker {{ $user->name }}</h1>
    <div>
        <a href="{{ route('management.user.edit', ['uuid' => $user->uuid]) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Bewerken</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#destroyResourceModal"><i class="fas fa-trash fa-sm text-white-50"></i> Verwijderen</a>
    </div>
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

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Naam:</strong> {{ $user->name }}</li>
                    <li class="list-group-item"><strong>E-mailadres:</strong> {{ $user->email }}</li>
                    <li class="list-group-item"><strong>E-mail geverifieerd op:</strong> {{ $user->email_verified_at }}</li>
                    <li class="list-group-item"><strong>NFC UID:</strong> {{ $user->nfc_uid }}</li>
                    <li class="list-group-item"><strong>Balance:</strong> {{ $user->balance }}</li>
                </ul>

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

                <div>
                    <img class="rounded-circle" style="width: 130px; height: 130px;" src="{{ $user->getAvatar('small') }}">
                </div>

                <a href="{{ route('management.user.edit', ['uuid' => $user->uuid]) }}" class="d-none d-sm-inline-block btn btn-sm btn-default shadow-sm mt-2"><i class="fas fa-edit fa-sm"></i> Profielfoto aanpassen</a>

            </div>
        </div>

    </div>

</div>
@endsection

@push('below_content')
<div class="modal fade" id="destroyResourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Weet u zeker dat u deze gebruiker wilt verwijderen?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Sluiten">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">Selecteer hieronder "Verwijderen" om de gebruiker te verwijderen.</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                <form action="{{ route('management.user.destroy', ['uuid' => $user->uuid]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-primary">Verwijderen</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush
