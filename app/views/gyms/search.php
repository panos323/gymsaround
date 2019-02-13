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
  width: 68%;
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
  height: 100vh;
  overflow: auto;
  padding-left: 20px;
  padding-bottom: 180px;
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
    width: 10px;
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
.geocoder {
  position:absolute;
  z-index:1;
  width:50%;
  left:50%;
  margin-left:-25%;
  top:0px;
}

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

#searchFieldset {
    background: #ddd;
    border: none;
    padding: 10px;
    margin: 0;
}

#feature-filter{
  width:100%;
  display:block;
  text-align:center;
}

.emptyResultsTitle{
  text-align:center;
  color:red;
}

.ratingStars{
  cursor:pointer;
}
</style>
<!-- style for map -->


    <!--start search buttons -->
    <div class="row col-lg-12">
        <div class="col-md-4 mt-4 mb-3">
            <button type="button" class="btn btn-outline-info mr-4   btn-md customBtnG" id="sortByNameBtn">Tαξινόμηση +<i id="AscDescArrows" class="fa" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-outline-info mr-4  btn-md  customBtnG">Περιοχή  +</button>
            <button type="button" class="btn btn-outline-info mr-4  btn-md  customBtnG">Είδος +</button>
            <button type="button" id="sortByPriceBtn" class="btn btn-outline-info  btn-md customBtnG">Tιμή +<i id="AscDescArrowsPrice" class="fa" aria-hidden="true"></i></button>
        </div>
        <div class="col-md-6 offset-1  mt-3 mb-3">
            <div class="input-group">
                <div id='geocoder' class='geocoder'>
              </div>
            </div>
        </div>
    </div> <!--row-->
    <!--end search buttons -->



<div class="row">
    <div class="col-md-12" style="height:100vh;">
        <!-- MAP -->
        <div class='sidebar'>
              <div class='heading'>
                <h2 class="text-center">Γυμναστήρια</h2>
              </div>
              <fieldset id="searchFieldset">
                <input class="p-2" id='feature-filter' type='text' placeholder='Search by name' />
              </fieldset>
              <div id='listings' class='listings mt-2'></div>
        </div>
        <div id='map' class='map'> </div>
        
        
  <script>

  //start rating stars
  function ratingStars(ratingStars,firstStar,secondStar,thirdStar,fourthStar,FifthStar) {
    
    var totalRatings = document.querySelector("."+ratingStars);
    var star10 = document.querySelector ("."+firstStar);
    var star20 = document.querySelector ("."+secondStar);
    var star30 = document.querySelector ("."+thirdStar);
    var star40 = document.querySelector ("."+fourthStar);
    var star50 = document.querySelector ("."+FifthStar);

    var votedOne =  star10.addEventListener("click", function() {
      document.querySelector ("."+firstStar).style.color="gold";
      totalRatings.style.pointerEvents = "none";
    });

    var votedTwo =  star20.addEventListener("click", function() {
      document.querySelector ("."+firstStar).style.color="gold";
      document.querySelector ("."+secondStar).style.color="gold";
      totalRatings.style.pointerEvents = "none";
    });

    var votedThree =  star30.addEventListener("click", function() {
      document.querySelector ("."+firstStar).style.color="gold";
      document.querySelector ("."+secondStar).style.color="gold";
      document.querySelector ("."+thirdStar).style.color="gold";
      totalRatings.style.pointerEvents = "none";
    });

    var votedFour =  star40.addEventListener("click", function() {
      document.querySelector ("."+firstStar).style.color="gold";
      document.querySelector ("."+secondStar).style.color="gold";
      document.querySelector ("."+thirdStar).style.color="gold";
      document.querySelector ("."+fourthStar).style.color="gold";
      totalRatings.style.pointerEvents = "none";
    });

    var votedFour = star50.addEventListener("click", function() {
      document.querySelector ("."+firstStar).style.color="gold";
      document.querySelector ("."+secondStar).style.color="gold";
      document.querySelector ("."+thirdStar).style.color="gold";
      document.querySelector ("."+fourthStar).style.color="gold";
      document.querySelector ("."+FifthStar).style.color="gold";
      totalRatings.style.pointerEvents = "none";
    });

  }// end function
//end rating stars



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
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [23.727539, 37.983810], //long - lat
    zoom: 9
  });

  var stores = {
    type: 'FeatureCollection',
    features: [
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            23.72361,
            37.91033
          ]
        },
        properties: {
          name : 'Benefit',
          phoneFormatted: '(202) 234-7336',
          phone: '2022347336',
          address: 'Ρόδων 8, Άλιμος',
          city: 'Αθήνα',
          postalCode: '20005',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar1','start1','start2','start3','start4','start5')"> 
                  <span class="ratingStar1">
                    <i class="fa fa-star start1" aria-hidden="true"></i>
                    <i class="fa fa-star start2" aria-hidden="true"></i>
                    <i class="fa fa-star start3" aria-hidden="true"></i>
                    <i class="fa fa-star start4" aria-hidden="true"></i>
                    <i class="fa fa-star start5" aria-hidden="true"></i>
                  </span>
              </span>
          `,
          program: 'Crosfii - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 70€',
          gumLike : '\'../public/images/search/heart.png\''
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            23.7986,
            38.0213
          ]
        },
        properties: {
          name : 'Iron Gym',
          phoneFormatted: '(202) 507-8357',
          phone: '2025078357',
          address: 'Παπανδρέου Ανδρέα 25, Χαλάνδρι',
          city: 'Αθήνα',
          postalCode: '20037',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar2','start11','start12','start13','start14','start15')"> 
                  <span class="ratingStar2">
                    <i class="fa fa-star start11" aria-hidden="true"></i>
                    <i class="fa fa-star start12" aria-hidden="true"></i>
                    <i class="fa fa-star start13" aria-hidden="true"></i>
                    <i class="fa fa-star start14" aria-hidden="true"></i>
                    <i class="fa fa-star start15" aria-hidden="true"></i>
                  </span>
              </span>
          `,
          program: 'Crosfii - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 50€',
          gumLike : '\'../public/images/search/heart.png\''
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            23.9333,
            37.8834
          ]
        },
        properties: {
          name : 'Gym Planet',
          phoneFormatted: '(210) 8552198',
          phone: '2025078357',
          address: 'Ζηνωδίας 25, Μαρκόπουλο',
          city: 'Αθήνα',
          postalCode: '20037',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar3','start21','start22','start23','start24','start25')"> 
                <span class="ratingStar3">
                  <i class="fa fa-star start21" aria-hidden="true"></i>
                  <i class="fa fa-star start22" aria-hidden="true"></i>
                  <i class="fa fa-star start23" aria-hidden="true"></i>
                  <i class="fa fa-star start24" aria-hidden="true"></i>
                  <i class="fa fa-star start25" aria-hidden="true"></i>
                </span>
              </span>
          `,
          program: 'Zoomba - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 79€',
          gumLike : '\'../public/images/search/heart.png\''
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            23.9438,
            37.7338
          ]
        },
        properties: {
          name : 'Anavisos Gym',
          phoneFormatted: '(210) 8552198',
          phone: '2025078357',
          address: 'Αναβύσσου 85, Ανάβυσσος',
          city: 'Αθήνα',
          postalCode: '20037',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar4','start31','start32','start33','start34','start35')"> 
                <span class="ratingStar4">
                  <i class="fa fa-star start31" aria-hidden="true"></i>
                  <i class="fa fa-star start32" aria-hidden="true"></i>
                  <i class="fa fa-star start33" aria-hidden="true"></i>
                  <i class="fa fa-star start34" aria-hidden="true"></i>
                  <i class="fa fa-star start35" aria-hidden="true"></i>
                </span>
              </span>
          `,
          program: 'Zoomba - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 110€',
          gumLike : '\'../public/images/search/heart.png\''
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            23.8147,
            38.0768
          ]
        },
        properties: {
          name : 'Hercules',
          phoneFormatted: '(202) 387-9338',
          phone: '2023879338',
          address: 'Αγίου Δημητρίου 25, Κηφισιά',
          city: 'Αθήνα',
          postalCode: '20036',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar5','start41','start42','start43','start44','start45')"> 
                <span class="ratingStar5">
                  <i class="fa fa-star start41" aria-hidden="true"></i>
                  <i class="fa fa-star start42" aria-hidden="true"></i>
                  <i class="fa fa-star start43" aria-hidden="true"></i>
                  <i class="fa fa-star start44" aria-hidden="true"></i>
                  <i class="fa fa-star start45" aria-hidden="true"></i>
                </span>
              </span>
          `,
          program: 'Crosfii - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 88€',
          gumLike : '\'../public/images/search/heart.png\''
        }
      }]
  };

  var filterEl = document.getElementById('feature-filter');
  var listingEl = document.getElementById('listings');
  var orderAscDescName = false; //toggle for asc desc order

  // This adds the stores to the map
map.on('load', function(e) {
  map.addSource('places', {
    type: 'geojson',
    data: stores
  });

  buildLocationList(stores); //Initialize the list


//Start Search By Name
  function normalize(string) {
    return string.trim().toLowerCase();
  }
  
  filterEl.addEventListener('keyup', function(e) {
    var value = normalize(e.target.value);
    
    // Filter visible features that don't match the input value.
    var filtered = stores.features.filter(function(feature) {
    var name = normalize(feature.properties.name);
    
    return name.indexOf(value) > -1;
    });

    var listings = document.getElementById('listings');
      while (listings.firstChild) {
        listings.removeChild(listings.firstChild);
    }

    // Populate the sidebar with filtered results
    buildLocationList(filtered);

  });
//End Search By Name


  //Start sort Elements By Name
  function SortByName() {
    orderAscDescName = !orderAscDescName;

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var elementBtn =  document.getElementById("AscDescArrows");

    var aNames = [];

    for (var i = 0; i < myList.length; i++) {
        aNames[i] = myList[i].innerHTML;
    }//for loop
    
    if (orderAscDescName) {
        aNames.sort();
        elementBtn.classList.add("fa-arrow-down");
    } else {
        aNames.reverse();
        elementBtn.classList.remove("fa-arrow-down")
        elementBtn.classList.add("fa-arrow-up")
    }
    
    for (var i = 0; i < myList.length; i++) {
        myList[i].innerHTML = aNames[i];
    }//for loop
    
  }//end function


  //on button click call function to sort elements by name
  document.getElementById("sortByNameBtn").addEventListener("click", function() {
    this.innerHTML = this.innerHTML.replace('+', '');
    SortByName();
  });
  //End sort Elements By Name


  //Start sort Elements By Price
  function SortByPrice() {
    orderAscDescName = !orderAscDescName;

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var elementBtn = document.getElementById("AscDescArrowsPrice");

    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('button').textContent.match(/\d/g).join("")
      };
    }).sort(function(a, b) {
      if (orderAscDescName) {
        elementBtn.classList.add("fa-arrow-down");
        return a.relevantText - b.relevantText;
      } else {
        elementBtn.classList.remove("fa-arrow-down")
        elementBtn.classList.add("fa-arrow-up")
        return b.relevantText - a.relevantText;
      }
    }).forEach(function(item) {
      list.appendChild(item.node);
    });
    
  }//end function
  

  //on button click call function to sort elements by price
  document.getElementById("sortByPriceBtn").addEventListener("click", function() {
    this.innerHTML = this.innerHTML.replace('+', '');
    SortByPrice();
  });
  //End sort Elements By Price

  
  // Add `new mapboxgl.Geocoder` code here
  //start add geocoder for search in Greece
  var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    bbox: [19.858037278278772,35.9369788149224,26.47077930220928,41.490542182273316],
  });

  document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
  //end add geocoder for search

  // Add the `map.addSource` and `map.addLayer` here
  map.addSource('single-point', {
    type: 'geojson',
    data: {
      type: 'FeatureCollection',
      features: [] // Notice that initially there are no features
    }
  });

  map.addLayer({
    id: 'point',
    source: 'single-point',
    type: 'circle',
    paint: {
      'circle-radius': 10,
      'circle-color': '#007cbf',
      'circle-stroke-width': 3,
      'circle-stroke-color': '#fff'
    }
  });

  // Add the `geocode` event listener here
  geocoder.on('result', function(ev) {

      var searchResult = ev.result.geometry;
      map.getSource('single-point').setData(searchResult);

      // Add `forEach` function 
      var options = { units: 'miles' };

      stores.features.forEach(function(store) {
          Object.defineProperty(store.properties, 'distance', {
            value: turf.distance(searchResult, store.geometry, options),
            writable: true,
            enumerable: true,
            configurable: true
          });
          
      });//end forEach

      // Add `sort` function 
      stores.features.sort(function(a, b) {
        if (a.properties.distance > b.properties.distance) {
          return 1;
        }
        if (a.properties.distance < b.properties.distance) {
          return -1;
        }
        // a must be equal to b
        return 0;
      });//end `sort` function 

      //Add function that fits bounds to search and closest store here
      function sortLonLat(storeIdentifier) {

        var lats = [stores.features[storeIdentifier].geometry.coordinates[1], searchResult.coordinates[1]];
        var lons = [stores.features[storeIdentifier].geometry.coordinates[0], searchResult.coordinates[0]];

        var sortedLons = lons.sort(function(a, b) {
          if (a > b) {
            return 1;
          }
          if (a.distance < b.distance) {
            return -1;
          }
          return 0;
        });

        var sortedLats = lats.sort(function(a, b) {
          if (a > b) {
            return 1;
          }
          if (a.distance < b.distance) {
            return -1;
          }
          return 0;
        });

        map.fitBounds([
          [sortedLons[0], sortedLats[0]],
          [sortedLons[1], sortedLats[1]]
        ], {
          padding: 100
        });
        }//end function sortLonLat

        sortLonLat(0);
        createPopUp(stores.features[0]);
        
        
        var listings = document.getElementById('listings');
        while (listings.firstChild) {
          listings.removeChild(listings.firstChild);
        }

        buildLocationList(stores);
  }); //on result

  
});//map.on('load')



stores.features.forEach(function(marker, i) {
    var el = document.createElement('div'); // Create an img element for the marker
    el.id = 'marker-' + i;
    el.className = 'marker';
    // Add markers to the map at all points
    new mapboxgl.Marker(el, { offset: [-28, -46] })
      .setLngLat(marker.geometry.coordinates)
      .addTo(map);

    el.addEventListener('click', function(e) {
      flyToStore(marker); // Fly to the point
      createPopUp(marker); // Close all other popups and display popup for clicked store
      var activeItem = document.getElementsByClassName('active'); // Highlight listing in sidebar (and remove highlight for all other listings)

      e.stopPropagation();
      if (activeItem[0]) {
        activeItem[0].classList.remove('active');
      }

      var listing = document.getElementById('listing-' + i);
      listing.classList.add('active');
    });
}); //stores.features.forEach


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
    .setHTML('<h3>Διεύθυνση</h3>' +
      '<h4>' + currentFeature.properties.address + '</h4>')
    .addTo(map);
}


function buildLocationList(data) {
  // Iterate through the list of stores

  if ( data.features) {

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


     // Create a new div with the class 'details' for each store
    // and fill it with the city and phone number

    /***********************************************************************************************************************STYLE DIV *****************************************************************************************************************************************************/

    var details = listing.appendChild(document.createElement('div'));
    details.innerHTML = '<img class="float-left img-fluid mr-4"  src= ' + prop.gymPhoto + ' />';
    details.innerHTML += '<img class="float-right img-fluid" src= ' + prop.gumLike + ' />';
    details.innerHTML += '<h2 class="gymsTitle"><a href="#">' + prop.name + '</h2></a>';
    if (prop.phone) {
      details.innerHTML += '<p class="lead">' + prop.phoneFormatted + '</p>';
    }
    details.innerHTML +=  prop.rating ;
    details.innerHTML += '<p class="lead float-left mt-3"><b>' + prop.program + '</b></p>';
    details.innerHTML += '<button class="btn btn-warning float-right mt-3 mb-3" id="btnGymPrice">' + prop.gymCost + '</button>'

    details.innerHTML += '<span class="clearfix"></span>';

    //distance appears on search
    if (prop.distance) {
      var roundedDistance = Math.round(prop.distance * 100) / 100;
      //console.log('distance EXISTS')
      details.innerHTML += '<p class="lead mt-3 mb-4"><mark>' + roundedDistance + ' miles away<mark></p>';
    }

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

  } 
  } else {
      var empty = document.createElement('h2');
      empty.className = 'emptyResultsTitle';
      empty.innerHTML = 'There are no results';
      listingEl.appendChild(empty);
  }
}//buildLocationList(data)

// Add an event listener for when a user clicks on the map
map.on('click', function(e) {
    
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

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());
</script>
<!-- MAP -->
     
    </div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>
