@extends('management.layouts.main')

@section('title', 'Klant '.$customer->name.' bewerken')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Klant {{ $customer->name }} bewerken</h1>
    {{-- <div>
        <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
        class="fas fa-trash fa-sm text-white-50"></i> Opslaan</button>
        <button class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
        class="fas fa-trash fa-sm text-white-50"></i> Opslaan en teruggaan</button>
    </div> --}}
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
                <h6 class="m-0 font-weight-bold text-primary">Prullenbak details</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <form action="{{ route('management.customer.update', ['uuid' => $customer->uuid]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') ?? $customer->name }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputLatitude">Latitude</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputLatitude" name="latitude"
                                    placeholder="Latitude" value="{{ old('latitude') ?? $customer->latitude }}">

                                @if($errors->has('latitude'))
                                    <div class="invalid-feedback">{{ $errors->first('latitude') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Longtitude</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('longtitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputLongtitude" name="longtitude"
                                    placeholder="Longtitude" value="{{ old('longtitude') ?? $customer->longtitude }}">

                                @if($errors->has('longtitude'))
                                    <div class="invalid-feedback">{{ $errors->first('longtitude') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Zoom</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('zoom') ? 'is-invalid' : '' }}"
                                    id="exampleInputZoom" name="zoom"
                                    placeholder="Zoom" value="{{ old('zoom') ?? $customer->zoom }}">

                                @if($errors->has('zoom'))
                                    <div class="invalid-feedback">{{ $errors->first('zoom') }}</div>
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
