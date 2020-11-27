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

<div class="row">

    <div class="col-lg-12">

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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') ?? $customer->name }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputLocation">Locatie</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                    id="exampleInputLocation" name="location"
                                    placeholder="Naam" value="{{ old('location') ?? $customer->location }}">

                                @if($errors->has('location'))
                                    <div class="invalid-feedback">{{ $errors->first('location') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputLatitude">Latitude</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('latitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputLatitude" name="latitude"
                                    placeholder="Naam" value="{{ old('latitude') ?? $customer->latitude }}">

                                @if($errors->has('latitude'))
                                    <div class="invalid-feedback">{{ $errors->first('latitude') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Longtitude</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('longtitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputLongtitude" name="longtitude"
                                    placeholder="Naam" value="{{ old('longtitude') ?? $customer->longtitude }}">

                                @if($errors->has('longtitude'))
                                    <div class="invalid-feedback">{{ $errors->first('longtitude') }}</div>
                                @endif
                            </div> --}}

                            {{-- <div class="form-group">
                                <label for="exampleInputName">Longtitude</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('longtitude') ? 'is-invalid' : '' }}"
                                    id="exampleInputLongtitude" name="longtitude"
                                    placeholder="Naam" value="{{ $customer->longtitude }}">

                                @if($errors->has('longtitude'))
                                    <div class="invalid-feedback">{{ $errors->first('longtitude') }}</div>
                                @endif
                            </div> --}}

                            <button type="submit" class="btn btn-success">Opslaan</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection
