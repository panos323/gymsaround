<?php require  APPROOT . '/views/inc/header.php'?>

<!-- style for map -->
<style>

.sidebar {
  width: 30%;
  height: 100%;
  overflow: hidden;
  border-right: 1px solid rgba(0, 0, 0, 0.25);
}

.pad2 {
  padding: 20px;
}

.map {
  position: absolute;
  right:15px;
  width: 70%;
  top: 0;
  bottom: 0;
    padding-left: 15px;
}

.heading {
  border-bottom: 1px solid #eee;
  min-height: 60px;
  line-height: 60px;
  padding: 10px 10px;
  background-color: #169b99;
  color: #fff;
}

.listings {
  height: 100%;
  overflow: auto;
  padding-left: 20px;
  padding-bottom: 60px;
}

.listings .item {
  display: block;
  border-bottom: 1px solid #eee;
  padding: 10px;
  text-decoration: none;
}

.listings .item:last-child { border-bottom: none; }

.listings .item .title {
  display: block;
  color: #169b99;
  font-weight: 700;
}

.listings .item .title small {
  font-weight: 400;
}

.listings .item.active .title .listings .item .title:hover {
  color: #169b99;
}

.listings .item.active {
  background-color: #f8f8f8;
}

::-webkit-scrollbar {
    width: 8px;
    border-left: 0;
    background: rgba(0, 0, 0, 0.1);
}


::-webkit-scrollbar {
  background: rgba(0, 0, 0, 0.1);
}

::-webkit-scrollbar-track {
  background: none;
}

::-webkit-scrollbar-thumb {
  background: #169b98;
  border-radius: 0;
}

.marker {
  border: none;
  cursor: pointer;
  height: 56px;
  width: 56px;
  background-image: url(../public/images/marker.png);
}

.clearfix {
  display: block;
}

.clearfix::after {
  content: '.';
  display: block;
  height: 0;
  clear: both;
  visibility: hidden;
}

/* Marker tweaks */
.mapboxgl-popup {
  padding-bottom: 50px;
}

.mapboxgl-popup-close-button {
  display: none;
}

.mapboxgl-popup-content {
  font: 400 15px/22px 'Source Sans Pro', 'Helvetica Neue', Sans-serif;
  padding: 0;
  width: 180px;
}

.mapboxgl-popup-content-wrapper {
  padding: 1%;
}

.mapboxgl-popup-content h3 {
  background: #169b99;
  color: #fff;
  margin: 0;
  display: block;
  padding: 10px;
  border-radius: 3px 3px 0 0;
  font-weight: 700;
  margin-top: -15px;
}

.mapboxgl-popup-content h4 {
  margin: 0;
  display: block;
  padding: 10px;
  font-weight: 400;
}

.mapboxgl-popup-content div {
  padding: 10px;
}

.mapboxgl-container .leaflet-marker-icon {
  cursor: pointer;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
  margin-top: 15px;
}

.mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
  border-bottom-color: #169b99;
}

/*add styles for mapboxgl-ctrl-geocoder here*/
.mapboxgl-ctrl-geocoder {
  border: 0;
  border-radius: 0;
  position: relative;
  top: 0;
  width: 800px;
  margin-top: 0;
}

.mapboxgl-ctrl-geocoder > div {
  min-width: 100%;
  margin-left: 0;
}

</style>
<!-- style for map -->
    <!--start search buttons -->
    <div class="row col-lg-12">
        <div class="col-md-4 mt-4 mb-3">
            <button type="button" class="btn btn-outline-info mr-4   btn-md customBtnG">Tαξινόμηση +</button>
            <button type="button" class="btn btn-outline-info mr-4  btn-md  customBtnG">Περιοχή  +</button>
            <button type="button" class="btn btn-outline-info mr-4  btn-md  customBtnG">Είδος +</button>
            <button type="button" class="btn btn-outline-info  btn-md customBtnG">Tιμή +</button>
        </div>
        <div class="col-md-6 offset-1  mt-3 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary  btn-lg" type="button"><i class="fa fa-search"></i></button>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="Αναζήτηση" aria-label="" aria-describedby="basic-addon1">
            </div>
        </div>
    </div> <!--row-->
    <!--end search buttons -->



<div class="row">
    <div class="col-md-12" style="height:100vh;">
        <!-- MAP -->
        <div class='sidebar'>
              <div class='heading'>
                <h2>Γυμναστήρια</h2>
              </div>
            <div id='listings' class='listings'></div>
        </div>
        <div id='map' class='map'> </div>

  <script>
  // This will let you use the .remove() function later on
  if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
      if (this.parentNode) {
        this.parentNode.removeChild(this);
      }
    };
  }

  mapboxgl.accessToken = 'pk.eyJ1IjoicGFub3MzMjMiLCJhIjoiY2pycGM0Z2FmMGJtdTQ0cDZsdnY2cHg2dSJ9.bjF12DQ6N-0RtPvpn0edVQ';

  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v9',
    center: [-77.034084142948, 38.909671288923],
    zoom: 13,
    scrollZoom: false
  });

  var stores = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.034084142948,
            38.909671288923
          ]
        },
        properties: {
          phoneFormatted: '(202) 234-7336',
          phone: '2022347336',
          address: '1471 P St NW',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'at 15th St NW',
          postalCode: '20005',
          state: 'D.C.'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.049766,
            38.900772
          ]
        },
        properties: {
          phoneFormatted: '(202) 507-8357',
          phone: '2025078357',
          address: '2221 I St NW',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'at 22nd St NW',
          postalCode: '20037',
          state: 'D.C.'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.043929,
            38.910525
          ]
        },
        properties: {
          phoneFormatted: '(202) 387-9338',
          phone: '2023879338',
          address: '1512 Connecticut Ave NW',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'at Dupont Circle',
          postalCode: '20036',
          state: 'D.C.'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.0672,
            38.90516896
          ]
        },
        properties: {
          phoneFormatted: '(202) 337-9338',
          phone: '2023379338',
          address: '3333 M St NW',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'at 34th St NW',
          postalCode: '20007',
          state: 'D.C.'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.002583742142,
            38.887041080933
          ]
        },
        properties: {
          phoneFormatted: '(202) 547-9338',
          phone: '2025479338',
          address: '221 Pennsylvania Ave SE',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'btwn 2nd & 3rd Sts. SE',
          postalCode: '20003',
          state: 'D.C.'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -76.933492720127,
            38.99225245786
          ]
        },
        properties: {
          address: '8204 Baltimore Ave',
          city: 'College Park',
          country: 'United States',
          postalCode: '20740',
          state: 'MD'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.097083330154,
            38.980979
          ]
        },
        properties: {
          phoneFormatted: '(301) 654-7336',
          phone: '3016547336',
          address: '4831 Bethesda Ave',
          city: 'Bethesda',
          country: 'United States',
          postalCode: '20814',
          state: 'MD'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.359425054188,
            38.958058116661
          ]
        },
        properties: {
          phoneFormatted: '(571) 203-0082',
          phone: '5712030082',
          address: '11935 Democracy Dr',
          city: 'Reston',
          country: 'United States',
          crossStreet: 'btw Explorer & Library',
          postalCode: '20190',
          state: 'VA'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.10853099823,
            38.880100922392
          ]
        },
        properties: {
          phoneFormatted: '(703) 522-2016',
          phone: '7035222016',
          address: '4075 Wilson Blvd',
          city: 'Arlington',
          country: 'United States',
          crossStreet: 'at N Randolph St.',
          postalCode: '22203',
          state: 'VA'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -75.28784,
            40.008008
          ]
        },
        properties: {
          phoneFormatted: '(610) 642-9400',
          phone: '6106429400',
          address: '68 Coulter Ave',
          city: 'Ardmore',
          country: 'United States',
          postalCode: '19003',
          state: 'PA'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -75.20121216774,
            39.954030175164
          ]
        },
        properties: {
          phoneFormatted: '(215) 386-1365',
          phone: '2153861365',
          address: '3925 Walnut St',
          city: 'Philadelphia',
          country: 'United States',
          postalCode: '19104',
          state: 'PA'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            -77.043959498405,
            38.903883387232
          ]
        },
        properties: {
          phoneFormatted: '(202) 331-3355',
          phone: '2023313355',
          address: '1901 L St. NW',
          city: 'Washington DC',
          country: 'United States',
          crossStreet: 'at 19th St',
          postalCode: '20036',
          state: 'D.C.'
        }
      }]
  };
  // This adds the stores to the map
  map.on('load', function(e) {
  // Add the data to your map as a layer
//   map.addLayer({
//     id: 'locations',
//     type: 'symbol',
//     // Add a GeoJSON source containing place coordinates and information.
//     source: {
//       type: 'geojson',
//       data: stores
//     },
//     layout: {
//       'icon-image': 'restaurant-15',
//       'icon-allow-overlap': true,
//     }
//   });
map.addSource('places', {
  type: 'geojson',
  data: stores
});

  buildLocationList(stores);

});


function flyToStore(currentFeature) {
  map.flyTo({
    center: currentFeature.geometry.coordinates,
    zoom: 15
  });
}

function createPopUp(currentFeature) {
  var popUps = document.getElementsByClassName('mapboxgl-popup');
  // Check if there is already a popup on the map and if so, remove it
  if (popUps[0]) popUps[0].remove();

  var popup = new mapboxgl.Popup({ closeOnClick: false })
    .setLngLat(currentFeature.geometry.coordinates)
    .setHTML('<h3>Sweetgreen</h3>' +
      '<h4>' + currentFeature.properties.address + '</h4>')
    .addTo(map);
}


//   stores.features.forEach(function(marker, i) {
//     var el = document.createElement('div'); // Create an img element for the marker
//     el.id = 'marker-' + i;
//     el.className = 'marker';
//     // Add markers to the map at all points
//     new mapboxgl.Marker(el, { offset: [-28, -46] })
//       .setLngLat(marker.geometry.coordinates)
//       .addTo(map);

//     el.addEventListener('click', function(e) {
//       flyToStore(marker); // Fly to the point
//       createPopUp(marker); // Close all other popups and display popup for clicked store
//       var activeItem = document.getElementsByClassName('active'); // Highlight listing in sidebar (and remove highlight for all other listings)

//       e.stopPropagation();
//       if (activeItem[0]) {
//         activeItem[0].classList.remove('active');
//       }

//       var listing = document.getElementById('listing-' + i);
//       listing.classList.add('active');
//     });
//   });

stores.features.forEach(function(marker) {
  // Create a div element for the marker
  var el = document.createElement('div');
  // Add a class called 'marker' to each div
  el.className = 'marker';
  // By default the image for your custom marker will be anchored
  // by its center. Adjust the position accordingly
  // Create the custom markers, set their position, and add to map
  new mapboxgl.Marker(el, { offset: [0, -23] })
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);

    el.addEventListener('click', function(e) {
        var activeItem = document.getElementsByClassName('active');
        // 1. Fly to the point
        flyToStore(marker);
        // 2. Close all other popups and display popup for clicked store
        createPopUp(marker);
        // 3. Highlight listing in sidebar (and remove highlight for all other listings)
        e.stopPropagation();
        if (activeItem[0]) {
            activeItem[0].classList.remove('active');
        }
        var listing = document.getElementById('listing-' + i);
        console.log(listing);
        listing.classList.add('active');
    });
});


function buildLocationList(data) {
  // Iterate through the list of stores
  for (i = 0; i < data.features.length; i++) {
    var currentFeature = data.features[i];
    // Shorten data.feature.properties to just `prop` so we're not
    // writing this long form over and over again.
    var prop = currentFeature.properties;
    // Select the listing container in the HTML and append a div
    // with the class 'item' for each store
    var listings = document.getElementById('listings');
    var listing = listings.appendChild(document.createElement('div'));
    listing.className = 'item';
    listing.id = 'listing-' + i;

    // Create a new link with the class 'title' for each store
    // and fill it with the store address
    var link = listing.appendChild(document.createElement('a'));
    link.href = '#';
    link.className = 'title';
    link.dataPosition = i;
    link.innerHTML = prop.address;

   // Add an event listener for the links in the sidebar listing
   link.addEventListener('click', function(e) {
  // Update the currentFeature to the store associated with the clicked link
  var clickedListing = data.features[this.dataPosition];
  // 1. Fly to the point associated with the clicked link
  flyToStore(clickedListing);
  // 2. Close all other popups and display popup for clicked store
  createPopUp(clickedListing);
  // 3. Highlight listing in sidebar (and remove highlight for all other listings)
  var activeItem = document.getElementsByClassName('active');
  if (activeItem[0]) {
    activeItem[0].classList.remove('active');
  }
  this.parentNode.classList.add('active');
});

    // Create a new div with the class 'details' for each store
    // and fill it with the city and phone number
    var details = listing.appendChild(document.createElement('div'));
    details.innerHTML = prop.city;
    if (prop.phone) {
      details.innerHTML += ' · ' + prop.phoneFormatted;
    }
  }
}

// Add an event listener for when a user clicks on the map
map.on('click', function(e) {
    alert
  // Query all the rendered points in the view
  var features = map.queryRenderedFeatures(e.point, { layers: ['locations'] });
  if (features.length) {
    var clickedPoint = features[0];
    // 1. Fly to the point
    flyToStore(clickedPoint);
    // 2. Close all other popups and display popup for clicked store
    createPopUp(clickedPoint);
    // 3. Highlight listing in sidebar (and remove highlight for all other listings)
    var activeItem = document.getElementsByClassName('active');
    if (activeItem[0]) {
      activeItem[0].classList.remove('active');
    }
    // Find the index of the store.features that corresponds to the clickedPoint that fired the event listener
    var selectedFeature = clickedPoint.properties.address;

    for (var i = 0; i < stores.features.length; i++) {
      if (stores.features[i].properties.address === selectedFeature) {
        selectedFeatureIndex = i;
      }
    }
    // Select the correct list item using the found index and add the active class
    var listing = document.getElementById('listing-' + selectedFeatureIndex);
    listing.classList.add('active');
  }
});
</script>
<!-- MAP -->
     
    </div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>
