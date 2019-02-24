<?php require  APPROOT . '/views/inc/header.php'?>

<!-- style for map -->
<style>

  #heightInSidebarMap{
    height:auto !important;
  }

  #showResultsOnMobile{
    display:none;
  }

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

.mapboxgl-popup-content h4 {
  background: #169b99;
  color: #fff;
  margin: 0;
  display: block;
  padding: 10px;
  border-radius: 3px 3px 0 0;
  font-weight: 700;
  margin-top: -15px;
}

.mapboxgl-popup-content p {
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
  top:-6px;
  position: relative;
  left:8px;
}

.mapboxgl-popup-close-button{
  display:block;
  font-size:36px;
  font-weight:bold;
}

</style>
<!-- style for map -->


    <!--start search buttons -->
    <div class="row col-lg-8 mt-5">
        <div class="col-md-7 mt-5 mb-3">
        
          <button type="button" class=" sortByNameBtn btn btn-outline-info mr-4 mb-2   btn-md customBtnG" id="sortByNameBtn">Tαξινόμηση +<i id="AscDescArrows" class="fa" aria-hidden="true"></i></button>
          <div class="dropdown d-inline-block">
              <button class="btn btn-outline-info mr-4 mb-2 btn-md dropdown-toggle customBtnG" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Περιοχή
              </button>
              <div class="dropdown-menu dropDownMenuCol showSelectedItemAreas" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" type="reset" id="dropdownReset" href="#">Όλες</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownAthens" href="#">Αθήνα</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownThessaloniki" href="#">Θεσσαλονίκη</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownTrikala" href="#">Τρίκαλα</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownKalamata" href="#">Καλαμάτα</button> 
              </div>
          </div> 
          <div class="dropdown d-inline-block">
              <button class="dropdownMenuButtonArr btn btn-outline-info mr-4 mb-2 btn-md dropdown-toggle customBtnG" type="button" id="dropdownMenuButtonArr" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Τύπος Γυμναστικής
              </button>
              <div class="dropdown-menu dropDownMenuCol showSelectedItemType" aria-labelledby="dropdownMenuButtonArr">
                <button class="dropdown-item" type="reset" id="dropdownResetTypes" href="#">Όλα</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownMartial" data-toggle="tooltip" data-placement="top" title="Boxing,KingBoxing,Muay thai,Krav Maga">Πολεμικές Τέχνες</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownCrossfit" data-toggle="tooltip" data-placement="top" title="Crossfit" >Crossfit</button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownΑerobic" data-toggle="tooltip" data-placement="top" title="Yoga,Step,Pilates,Zoomba">Αerobic</button> 
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" id="dropdownDances" data-toggle="tooltip" data-placement="top" title="Merengue,Salsa,Cumbia,Zoomba,Hip-Hop,Reggaeton">Χοροί</button> 
              </div>
          </div> 

          <button type="button" id="sortByPriceBtn" class="btn btn-outline-info mb-2  btn-md customBtnG">Tιμή +<i id="AscDescArrowsPrice" class="fa" aria-hidden="true"></i></button>

        </div>

        <div class="col-md-4 mt-5">
            <p id="totalGymResulstsSpan" class="lead"></p>
        </div>
    </div> <!--row-->
    <!--end search buttons -->



<div class="row">
    <div id="heightInSidebarMap" class="col-md-12">
        <!-- MAP -->
        <div class='sidebar'>
              <div class='heading'>
                <h2 class="text-center">Γυμναστήρια</h2>
              </div>
              <fieldset id="searchFieldset">
                <input class="p-2" id='feature-filter' type='text' placeholder='Search by name' />
              </fieldset>
            <span style="display: none" id="gyms_number"><?php echo count($data); ?></span>
              <?php foreach ($data as $key=>$gym) : ?>
                <p style="display: none" id="gyms_results_<?php echo $key; ?>"><?php echo json_encode($gym); ?></p>
              <?php endforeach; ?>
              <div id='listings' class='listings mt-2'></div>
        </div>
        <div id="showResultsOnMobile" class="lead bg-danger text-white">Τα αποτελέσματα στον χάρτη</div>
        <div id='map' class='map'> </div>
        
        
  <script>

  //show ratings
  function ratingStars(ratingStars) {

      if (ratingStars > 0 && ratingStars <=1) {
          document.querySelector (".star1").style.color="gold";
      } else if (ratingStars > 1 && ratingStars <= 2) {
          document.querySelector (".star1").style.color="gold";
          document.querySelector (".star2").style.color="gold";
      }  else if (ratingStars > 2 && ratingStars <= 3) {
          document.querySelector (".star1").style.color="gold";
          document.querySelector (".star2").style.color="gold";
          document.querySelector (".star3").style.color="gold";
      } else if (ratingStars > 3 && ratingStars <= 4) {
          document.querySelector (".star1").style.color="gold";
          document.querySelector (".star2").style.color="gold";
          document.querySelector (".star3").style.color="gold";
          document.querySelector (".star4").style.color="gold";
      } else if (ratingStars > 4 && ratingStars <= 5) {
          document.querySelector (".star1").style.color="gold";
          document.querySelector (".star2").style.color="gold";
          document.querySelector (".star3").style.color="gold";
          document.querySelector (".star4").style.color="gold";
          document.querySelector (".star5").style.color="gold";
      }
  }// end function


  //start function that display total results the founded
  function countGymELements(myList) {
    var count = 0;
    var resultsLength = document.querySelector("#totalGymResulstsSpan");

      for (let i = 0; i < myList.length; i++) {
        var thisElem = myList[i];
        if (!thisElem.classList.contains("hideDropDownElement"))
            count++;
      }
      if (count > 1) {
        resultsLength.classList.add("text-success");
        resultsLength.innerHTML = 'Βρέθηκαν ' + count.toString() + " αποτελέσματα";
      } else if (count == 1) {
        resultsLength.classList.remove("text-success");
        resultsLength.innerHTML = 'Βρέθηκε ' + count.toString() + " αποτελέσμα";
      } else {
        resultsLength.innerHTML = 'Δεν βρέθηκαν αποτελέσματα'
      }
  }
//end function that display total results the founded



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
    style: 'mapbox://styles/mapbox/streets-v9',
    center: [23.727539, 37.983810], //long - lat
    zoom: 10
  });

  var stores1 = {
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
          linkPage : 'http://localhost/gymaround/gyms/index',
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
          program: 'Crosfit - Boxing  - KingBoxing -  Salsa',
          gymCost : 'Από 70€'
        }
      },
      {
        type: 'Feature',
        geometry: {
          type: 'Point',
          coordinates: [
            21.7679, //trikala
            39.5557 //trikala
          ]
        },
        properties: {
          name : 'Trikala Gym',
          linkPage : 'http://localhost/gymaround/gyms/index',
          phoneFormatted: '(210) 8552198',
          phone: '2025078357',
          address: 'Βασίλη Τσιτσάνη 82',
          city: 'Τρίκαλα',
          postalCode: '20037',
          gymPhoto : '\'../public/images/search/gym_small_image.jpg\'',
          rating : `
              <span class="ratingStars clearfix" onClick="ratingStars('ratingStar7','start81','start82','start83','start84','start85')"> 
                <span class="ratingStar7">
                  <i class="fa fa-star start81" aria-hidden="true"></i>
                  <i class="fa fa-star start82" aria-hidden="true"></i>
                  <i class="fa fa-star start83" aria-hidden="true"></i>
                  <i class="fa fa-star start84" aria-hidden="true"></i>
                  <i class="fa fa-star start85" aria-hidden="true"></i>
                </span>
              </span>
          `,
          program: 'Zoomba - Boxing  - KingBoxing -  Climbing',
          gymCost : 'Από 94€'
        }
      }
     ]
  };

  var filterEl = document.getElementById('feature-filter');
  var listingEl = document.getElementById('listings');
  var numberOfGyms = document.getElementById('gyms_number').innerHTML;
  var stores = {
      type: 'FeatureCollection',
      features: []
  };
  for (var i=0; i<numberOfGyms; i++) {
      stores.features.push(JSON.parse(document.getElementById('gyms_results_' + i).innerHTML));
  }
  var orderAscDescName = false; //toggle for asc desc order



// Because features come from tiled vector data, feature geometries may be split
// or duplicated across tile boundaries and, as a result, features may appear
// multiple times in query results.
  function getUniqueFeatures(array, comparatorProperty) {
    var existingFeatureKeys = {};
    // Because features come from tiled vector data, feature geometries may be split
    // or duplicated across tile boundaries and, as a result, features may appear
    // multiple times in query results.
    var uniqueFeatures = array.filter(function(el) {
    if (existingFeatureKeys[el.properties[comparatorProperty]]) {
      return false;
    } else {
      existingFeatureKeys[el.properties[comparatorProperty]] = true;
      return true;
    }
  });
 
return uniqueFeatures;
}


  // This adds the stores to the map
map.on('load', function(e) {
  map.addSource('places', {
    type: 'geojson',
    data: stores
  });

  buildLocationList(stores); //Initialize the list


  //Start Show results based on map scrolling
  map.on('moveend', function(ev) {
    
    var features = map.queryRenderedFeatures(ev.point);
    // console.log(features[0].geometry.coordinates) 
    var searchResult = features[0].geometry.coordinates;

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

        
      var listings = document.getElementById('listings');
      while (listings.firstChild) {
        listings.removeChild(listings.firstChild);
      }

      buildLocationList(stores);
  }); //on result

//End Show results based on map scrolling


//Start Search By Name
  function normalize(string) {
    return string.trim().toLowerCase();
  }
  
  filterEl.addEventListener('keyup', function(e) {

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var value = normalize(e.target.value);

    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('.gymsLinkTitle').innerHTML.toLowerCase()
      }
      }).forEach(function(item) {
        if (item.relevantText.includes(value)) {
          item.node.classList.remove('hideDropDownElement')
          list.appendChild(item.node);
        }  else {
              item.node.classList.add('hideDropDownElement');
        }
      })

      //call function to show total gym results
      countGymELements(myList)

  });
//End Search By Name


  //Start sort Elements By Name
  function SortByName() {
   orderAscDescName = !orderAscDescName;

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var elementBtn =  document.getElementById("AscDescArrows");

    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('.gymsLinkTitle').innerHTML.replace(" ","").toLowerCase()
      };
    }).sort(function(a, b) {
      if (orderAscDescName) {
        elementBtn.classList.add("fa-arrow-down");
        return b.relevantText.localeCompare(a.firstname);
      } else {
        elementBtn.classList.remove("fa-arrow-down")
        elementBtn.classList.add("fa-arrow-up")
        return a.relevantText.localeCompare(b.relevantText);
      }
    }).forEach(function(item) {
      list.appendChild(item.node);
    });
    
    //call function to show total gym results
    countGymELements(myList)

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
    var resultsLength = document.querySelector("#totalGymResulstsSpan");

    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('#btnGymPrice').textContent.match(/\d/g).join("")
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
      resultsLength.innerHTML=  myList.length.toString();
    });
    
    //call function to show total gym results
    countGymELements(myList)

  }//end function
  

  //on button click call function to sort elements by price
  document.getElementById("sortByPriceBtn").addEventListener("click", function() {
    this.innerHTML = this.innerHTML.replace('+', '');
    SortByPrice();
  });
  //End sort Elements By Price



  //Start sort Elements By Location
  function SortByLocation(name) {
    orderAscDescName = !orderAscDescName;

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var resultsLength = document.querySelector("#totalGymResulstsSpan");
    var resetLocation = document.getElementById("dropdownMenuButtonArr").innerHTML = "Τύπος Γυμναστικής";
    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('.title').innerHTML
      }
      }).forEach(function(item) {
        if (item.relevantText.includes(""+name)) {
          item.node.classList.remove('hideDropDownElement')
          list.appendChild(item.node);
        } else {
          item.node.classList.add('hideDropDownElement')
        }
      })
      //call function to show total gym results
      countGymELements(myList)
   
  }//end function
  
  //on button click call function to sort elements by Location
  document.getElementById("dropdownAthens").addEventListener("click", function() {
    SortByLocation('Αθήνα');
  });
  document.getElementById("dropdownThessaloniki").addEventListener("click", function() {
    SortByLocation('Θεσσαλονίκη');
  });
  document.getElementById("dropdownTrikala").addEventListener("click", function() {
    SortByLocation('Τρίκαλα');
  });
  document.getElementById("dropdownKalamata").addEventListener("click", function() {
    SortByLocation('Καλαμάτα');  
  });
  //End sort Elements By Location


   //start If values of location dropdown are set from index page then display them first
   (function(){
     var result = document.getElementById("dropdownMenuButton");

      if (window.localStorage.getItem('DropdownValueSelected') ==  document.getElementById("dropdownAthens").innerHTML){
          result.innerHTML = 'Αθήνα';
          SortByLocation('Αθήνα');
      } else if (window.localStorage.getItem('DropdownValueSelected') ==    document.getElementById("dropdownThessaloniki").innerHTML){
          result.innerHTML = 'Θεσσαλονίκη';
          SortByLocation('Θεσσαλονίκη');
      } else if (window.localStorage.getItem('DropdownValueSelected') ==        document.getElementById("dropdownTrikala").innerHTML){
          result.innerHTML = 'Τρίκαλα';
          SortByLocation('Τρίκαλα');
      } else if (window.localStorage.getItem('DropdownValueSelected') ==        document.getElementById("dropdownKalamata").innerHTML){
          result.innerHTML = 'Καλαμάτα';
          SortByLocation('Καλαμάτα');
      }
  })();
  //end If values of location dropdown are set from index page then display them first


  //Start sort Elements By fitness type
  function SortByType(name) {
    orderAscDescName = !orderAscDescName;

    var list = document.getElementById("listings");
    var myList = list.getElementsByClassName("item");
    var resetArea = document.getElementById("dropdownMenuButton").innerHTML = "Περιοχή";
    var martials = ["Boxing", "KingBoxing", "Muay thai", "Krav Maga"];
    var aerobic = ["Yoga", "Step", "Pilates", "Zoomba"];
    var crossfit = ["Crossfit"];
    var dances = ["Merengue", "Salsa", "Cumbia", "Zoomba", "Hip-Hop", "Reggaeton"];
    
    Array.prototype.map.call(myList, function(node) {
      return {
        node: node,
        relevantText: node.querySelector('#typeFitness').innerHTML
      }
      }).forEach(function(item) {
      
        if (name =='Πολεμικές Τέχνες' && martials.some(el => item.relevantText.includes(el))) {
          item.node.classList.remove('hideDropDownElement')
          list.appendChild(item.node);
        }  else if (name =='Crossfit' && crossfit.some(el => item.relevantText.includes(el))) {
          item.node.classList.remove('hideDropDownElement')
          list.appendChild(item.node);
        } else if (name =='Aerobic' && aerobic.some(el => item.relevantText.includes(el))) {
          item.node.classList.remove('hideDropDownElement')
          list.appendChild(item.node);
        }   else if (name =='Χοροί' && dances.some(el => item.relevantText.includes(el))) {
           item.node.classList.remove('hideDropDownElement')
           list.appendChild(item.node);
         } else {
          item.node.classList.add('hideDropDownElement')
        }

      })
      
      //call function to show total gym results
      countGymELements(myList);
  }//end function
  
  //on button click call function to sort elements by Location
  document.getElementById("dropdownMartial").addEventListener("click", function() {
    SortByType('Πολεμικές Τέχνες');
  });
  document.getElementById("dropdownCrossfit").addEventListener("click", function() {
    SortByType('Crossfit');
  });
  document.getElementById("dropdownΑerobic").addEventListener("click", function() {
    SortByType('Aerobic');
  });
  document.getElementById("dropdownDances").addEventListener("click", function() {
    SortByType('Χοροί');
  });
  //End sort Elements By fitness type


   //start If values of location dropdown are set from index page then display them first
   (function(){
      var result =  document.getElementById("dropdownMenuButtonArr");

        if (window.localStorage.getItem('DropdownValueSelectedType') ==  document.getElementById("dropdownMartial").innerHTML){
            result.innerHTML = 'Πολεμικές Τέχνες';
            SortByType('Πολεμικές Τέχνες');
        } else if (window.localStorage.getItem('DropdownValueSelectedType') ==  document.getElementById("dropdownCrossfit").innerHTML){
              result.innerHTML = 'Crossfit';
              SortByType('Crossfit');
        } else if (window.localStorage.getItem('DropdownValueSelectedType') ==        document.getElementById("dropdownΑerobic").innerHTML){
            result.innerHTML = 'Aerobic';
            SortByType('Aerobic');
        } else if (window.localStorage.getItem('DropdownValueSelectedType') ==   document.getElementById("dropdownDances").innerHTML){
            result.innerHTML = 'Χοροί';
            SortByType('Χοροί');
        }
  })();
  //end If values of location dropdown are set from index page then display them first




  

  // Add `new mapboxgl.Geocoder` code here
  //start add geocoder for search in Greece
  var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    placeholder: 'Search by area',
    bbox: [19.858037278278772,35.9369788149224,26.47077930220928,41.490542182273316],
  });

  map.addControl(geocoder, 'top-left');
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

    //add custom marker
    el.style.backgroundImage = 'url(../public/images/markerGym2.svg';

    // Add markers to the map at all points
    new mapboxgl.Marker(el, { offset: [-18, -26] }) //-28, -46 for the default image
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

  var popup = new mapboxgl.Popup({ closeOnClick: true })
    .setLngLat(currentFeature.geometry.coordinates)
    .setHTML('<h4>Διεύθυνση</h4>' +
      '<p class="lead">' + currentFeature.properties.address + '</p>')
    .addTo(map);
}
//call function to show total gym results
//countGymELements(myList)

function buildLocationList(data) {
  var resultsLength = document.querySelector("#totalGymResulstsSpan");
      resultsLength.classList.add("text-success");
  // Iterate through the list of stores

  for (i = 0; i < data.features.length; i++) {
    resultsLength.innerHTML = 'Βρέθηκαν ' + data.features.length.toString() + " αποτελέσματα";
    
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
    details.classList.add("controlDivDetails");
    details.innerHTML = '<img id="gymMainPhoto" class="float-left img-fluid mr-4"  src= ' + prop.gymPhoto + ' />';
    details.innerHTML += '<h2 class="gymsTitle"><a class="gymsLinkTitle" href='+prop.linkPage+' target="_blank">' + prop.name + '</h2></a>';
    if (prop.phone) {
      details.innerHTML += '<p id="gumsPhoneNum" class="lead">' + prop.phoneFormatted + '</p>';
    }
    details.innerHTML +=  '<span class="ratingStars clearfix"><i class="fa fa-star star1" aria-hidden="true"></i><i class="fa fa-star star2" aria-hidden="true"></i><i class="fa fa-star star3" aria-hidden="true"></i><i class="fa fa-star star4" aria-hidden="true"></i><i class="fa fa-star star5" aria-hidden="true"></i> (' + prop.rating + ') </span>';
    // details.innerHTML +=  '<span>' + prop.rating  + '</span>';
    details.innerHTML += '<p id="typeFitness" class="lead float-left mt-3"><b>' + prop.program + '</b></p>';
    details.innerHTML += '<a href="'+prop.linkPage+'" target="_blank" class="btn btn-warning float-right ml-1 mt-3 mb-3" id="btnGymPrice">' + prop.gymCost + '</a>'

    //show gym rating
    ratingStars(prop.rating);
  

    details.innerHTML += '<span class="clearfix"></span>';

    //distance appears on search
    if (prop.distance) {
      var roundedDistance = Math.round(prop.distance * 100) / 100;
      
      details.innerHTML += '<p class="lead mt-3 mb-4"><mark>' + roundedDistance + ' miles away<mark></p>';
    }

    // Create a new link with the class 'title' for each store
    // and fill it with the store address
    var link = listing.appendChild(document.createElement('a'));
    link.href = '#';
    link.className = 'title';
    link.dataPosition = i;
    link.innerHTML = prop.address + ", " + prop.city;

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

// Add geolocate control to the map.
map.addControl(new mapboxgl.GeolocateControl({
  positionOptions: {
  enableHighAccuracy: true
  },
  trackUserLocation: true
}));

//Add full zoom option
//map.addControl(new mapboxgl.FullscreenControl());

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());
</script>
<!-- MAP -->
     
    </div>
</div>
<?php require  APPROOT . '/views/inc/footer.php'?>
