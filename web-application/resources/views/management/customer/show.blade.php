@extends('management.layouts.main')

@section('title', 'Klant '.$customer->name )

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Klant {{ $customer->name }}</h1>
    <div>
        <a href="{{ route('management.customer.edit', ['uuid' => $customer->uuid]) }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
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
                <h6 class="m-0 font-weight-bold text-primary">Klantdetails</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Naam:</strong> {{ $customer->name }}</li>
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
                <form action="{{ route('management.customer.destroy', ['uuid' => $customer->uuid]) }}" method="POST">
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

    /**
 * Display clustered markers on a map
 *
 * Note that the maps clustering module https://js.api.here.com/v3/3.1/mapsjs-clustering.js
 * must be loaded to use the Clustering

 * @param {H.Map} map A HERE Map instance within the application
 * @param {Object[]} data Raw data that contains airports' coordinates
*/
function startClustering(map, data) {
  // First we need to create an array of DataPoint objects,
  // for the ClusterProvider
  var dataPoints = data.map(function (item) {
    return new H.clustering.DataPoint(item.latitude, item.longitude);
  });

  // Create a clustering provider with custom options for clusterizing the input
  var clusteredDataProvider = new H.clustering.Provider(dataPoints, {
    clusteringOptions: {
      // Maximum radius of the neighbourhood
      eps: 32,
      // minimum weight of points required to form a cluster
      minWeight: 2
    }
  });

  // Create a layer tha will consume objects from our clustering provider
  var clusteringLayer = new H.map.layer.ObjectLayer(clusteredDataProvider);

  // To make objects from clustering provder visible,
  // we need to add our layer to the map
  map.addLayer(clusteringLayer);
}

// function addMarkersAndSetViewBounds(map) {
//   var group = new H.map.Group();
//   group.addObjects([
//       @foreach($trashCans as $trashCan)
//         new H.map.Marker({lat: {{ $trashCan->latitude }}, lng: {{ $trashCan->longtitude }} }),
//       @endforeach
//   ]);
//   map.addObject(group);

// //   // get geo bounding box for the group and set it to the map
// //   map.getViewModel().setLookAtData({
// //     bounds: group.getBoundingBox()
// //   });
// }

var platform = new H.service.Platform({
  apikey: '{{ config('services.here.secret') }}'
});

var defaultLayers = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
document.getElementById('mapContainer'),
defaultLayers.vector.normal.map,
{
    zoom: {{ $customer->zoom }},
    center: { lat: {{ $customer->latitude }}, lng: {{ $customer->longtitude }} }
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

var trashcans = [
    @foreach($allTrashCans as $trashCan)
        {latitude: {{ $trashCan->latitude }}, longitude: {{ $trashCan->longtitude }} },
    @endforeach
];

// Step 5: cluster data about airports's coordinates
// airports variable was injected at the page load
startClustering(map, trashcans);
</script>
@endpush

@push('head')
<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js"></script>
@endpush
