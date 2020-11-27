@extends('management.layouts.main')

@section('title', 'Prullenbakken Kaart')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Prullenbak Kaart</h1>
    <div>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
            class="fas fa-edit fa-sm text-white-50"></i> Bewerken</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
            class="fas fa-trash fa-sm text-white-50"></i> Verwijderen</a> --}}
    </div>
</div>

<div class="row">

    <div class="col-lg-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kaart</h6>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div style="width: 100%; height: 480px" id="mapContainer"></div>
            </div>
        </div>

    </div>
</div>


@endsection

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

var trashcans = [
    @foreach($trashCans as $trashCan)
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
{{-- <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
<script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js"></script> --}}
@endpush
