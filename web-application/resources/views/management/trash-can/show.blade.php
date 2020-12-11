@extends('management.layouts.main')

@section('title', 'Prullenbakken #'.$trashCan->uuid)

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Prullenbak #{{ $trashCan->uuid }}</h1>
    <div>
        <a href="{{ route('management.trash-can.edit', ['uuid' => $trashCan->uuid]) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Bewerken</a>
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
                <h6 class="m-0 font-weight-bold text-primary">Prullenbak details</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Naam:</strong> {{ $trashCan->name }}</li>
                    <li class="list-group-item"><strong>Locatie:</strong> {{ $trashCan->location }}</li>
                    <li class="list-group-item"><strong>Latitude:</strong> {{ $trashCan->latitude }}</li>
                    <li class="list-group-item"><strong>Longtitude:</strong> {{ $trashCan->longtitude }}</li>
                    <li class="list-group-item"><strong>Klant:</strong> @if(!empty($trashCan->customer))<a href="{{ route('management.customer.show', ['uuid' => $trashCan->customer->uuid]) }}">{{ $trashCan->customer->name }}</a>@else niet gespecificeerd @endif</li>
                </ul>

            </div>
        </div>

    </div>

    <div class="col-lg-6">

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

    </div>
</div>
@endsection

@push('below_content')
<div class="modal fade" id="destroyResourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Weet u zeker dat u deze prullenbak wilt verwijderen?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Sluiten">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">Selecteer hieronder "Verwijderen" om de prullenbak te verwijderen.</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuleren</button>
                <form action="{{ route('management.trash-can.destroy', ['uuid' => $trashCan->uuid]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-primary">Verwijderen</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endpush

@push('footer')
<script>
    function addMarkerToMap(map) {
    map.addObject(new H.map.Marker({lat:{{ $trashCan->latitude }}, lng:{{ $trashCan->longtitude }}}));
}

var platform = new H.service.Platform({
  apikey: '{{ config('services.here.secret') }}'
});

var defaultLayers = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
document.getElementById('mapContainer'),
defaultLayers.vector.normal.map,
{
    zoom: 7,
    center: { lat: 52.26551, lng: 5.66487 }
});

// addMarkersAndSetViewBounds(map);

// add a resize listener to make sure that the map occupies the whole container
window.addEventListener('resize', () => map.getViewPort().resize());

// Step 3: make the map interactive
// MapEvents enables the event system
// Behavior implements default interactions for pan/zoom (also on mobile touch environments)
var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));


// Step 4: create the default UI component, for displaying bubbles
var ui = H.ui.UI.createDefault(map, defaultLayers);

addMarkerToMap(map);

</script>
@endpush

@push('head')
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
{{-- <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js"></script> --}}
@endpush
