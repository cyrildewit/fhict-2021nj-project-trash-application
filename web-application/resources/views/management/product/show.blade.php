@extends('management.layouts.main')

@section('title', 'Product '.$product->name )

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product {{ $product->name }}</h1>
    <div>
        <a href="{{ route('management.product.edit', ['uuid' => $product->uuid]) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
            class="fas fa-edit fa-sm text-white-50"></i> Bewerken</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Productdetails</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Naam:</strong> {{ $product->name }}</li>
                    <li class="list-group-item"><strong>Barcodce:</strong> {{ $product->barcode }}</li>
                    <li class="list-group-item"><strong>Scheidingsbak:</strong> {{ $product->seperation_tray->description }}</li>
                    <li class="list-group-item"><strong>Informatie:</strong> {{ $product->information }}</li>
                    <li class="list-group-item"><strong>Statiegeld:</strong> {{ $product->deposit_amount }}</li>
                </ul>

            </div>
        </div>

    </div>

    {{-- <div class="col-lg-6">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kaart</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <div style="width: 100%; height: 320px" id="mapContainer"></div>

            </div>
        </div>

    </div> --}}
</div>

{{-- <div class="row">

    <div class="col-lg-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Prullenbakken</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Locatie</th>
                        <th scope="col">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashCans as $trashCan)
                        <tr>
                            <th scope="row">{{ $trashCan->id }}</th>
                            <td><a href="{{ route('management.trash-can.show', ['uuid' => $trashCan->uuid]) }}">{{ $trashCan->name }}</a></td>
                            <td>{{ $trashCan->location }}</td>
                            <td>
                                <a href="{{ route('management.trash-can.show', ['uuid' => $trashCan->uuid]) }}" class="btn btn-info btn-sm">Bekijken</a>
                                <a href="{{ route('management.trash-can.edit', ['uuid' => $trashCan->uuid]) }}" class="btn btn-warning btn-sm">Bewerken</a>
                                {{-- <a hef="{{ route('management.trash-can.de', ['uuid' => $trashCan->uuid]) }}" class="btn btn-danger btn-small">Bewerken</a> --}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $trashCans->links() }}

            </div>
        </div>

    </div>
</div> --}}
@endsection

@push('below_content')
<div class="modal fade" id="destroyResourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Weet u zeker dat u deze klant wilt verwijderen?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Sluiten">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">Selecteer hieronder "Verwijderen" om de klant te verwijderen.</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                <form action="{{ route('management.product.destroy', ['uuid' => $product->uuid]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-primary">Verwijderen</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush
