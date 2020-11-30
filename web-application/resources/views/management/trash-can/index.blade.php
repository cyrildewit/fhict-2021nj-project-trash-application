@extends('management.layouts.main')

@section('title', 'Prullenbakken')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Prullenbakken</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>

<div class="row">

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
                        <div class="dropdown-header">Acties:</div>
                        <a class="dropdown-item" href="{{ route('management.trash-can.create') }}">Prullenbak aanmaken</a>
                        {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                        {{-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a> --}}
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
                        <th scope="col">Klant</th>
                        <th scope="col">Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trashCans as $trashCan)
                        <tr>
                            <th scope="row">{{ $trashCan->id }}</th>
                            <td><a href="{{ route('management.trash-can.show', ['uuid' => $trashCan->uuid]) }}">{{ $trashCan->name }}</a></td>
                            <td>{{ $trashCan->location }}</td>
                            <td><a href="{{ route('management.customer.show', ['uuid' => $trashCan->customer->uuid]) }}">{{ $trashCan->customer->name }}</a></td>
                            <td>
                                <a href="{{ route('management.trash-can.show', ['uuid' => $trashCan->uuid]) }}" class="btn btn-info btn-sm">Bekijken</a>
                                <a href="{{ route('management.trash-can.edit', ['uuid' => $trashCan->uuid]) }}" class="btn btn-warning btn-sm">Bewerken</a>
                                {{-- <a hef="{{ route('management.trash-can.de', ['uuid' => $trashCan->uuid]) }}" class="btn btn-danger btn-small">Bewerken</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $trashCans->links() }}

            </div>
        </div>

    </div>
</div>
@endsection
