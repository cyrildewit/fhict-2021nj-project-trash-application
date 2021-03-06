@extends('management.layouts.main')

@section('title', 'Product '.$product->name.' bewerken')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Klant {{ $product->name }} bewerken</h1>
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

                <form action="{{ route('management.product.update', ['uuid' => $product->uuid]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="exampleInputName">Naam</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" name="name"
                                    placeholder="Naam" value="{{ old('name') ?? $product->name }}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputBarcode">Barcode</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('barcode') ? 'is-invalid' : '' }}"
                                    id="exampleInputBarcode"
                                    placeholder="Barcode" value="{{ $product->barcode }}" disabled>

                                @if($errors->has('barcode'))
                                    <div class="invalid-feedback">{{ $errors->first('barcode') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Scheidingsbak</label>

                                <select class="custom-select" name="seperation_tray">
                                    @foreach(\App\Enums\SeperationTray::asSelectArray() as $key => $description)
                                    <option value="{{ $key }}" {{ $key == $product->seperation_tray->value ? 'selected' : '' }}>{{ $description }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('seperation_tray'))
                                    <div class="invalid-feedback">{{ $errors->first('seperation_tray') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Informatie</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('information') ? 'is-invalid' : '' }}"
                                    id="exampleInputInformation" name="information"
                                    placeholder="Informatie" value="{{ old('information') ?? $product->information }}">

                                @if($errors->has('information'))
                                    <div class="invalid-feedback">{{ $errors->first('information') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName">Statiegeld (in centen)</label>

                                <input type="text" class="form-control form-control-user {{ $errors->has('deposit_amount') ? 'is-invalid' : '' }}"
                                    id="exampleInputDepositAmount" name="deposit_amount"
                                    placeholder="Statiegeld (in centen)" value="{{ old('deposit_amount') ?? $product->deposit_amount }}">

                                @if($errors->has('deposit_amount'))
                                    <div class="invalid-feedback">{{ $errors->first('deposit_amount') }}</div>
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
