<?php require  APPROOT . '/views/inc/header.php'?>

    <div class="row">
        <div class="col-md-5 offset-md-1">
            <p class="basictitle" id="gymstitle" >ΒΡΕΘΗΚΑΝ 5 ΓΥΜΝΑΣΤΗΡΙΑ</p>
        </div>
    </div>

    <!--start search buttons -->
    <div class="row col-lg-12 mb-5">

        <div class="col-lg-2 offset-lg-1 col-md-4 mb-3">
            <button type="button" class="btn btn-outline-info  btn-lg customBtnG">Tαξινόμηση +</button>
        </div>


        <div class="btn-group col-lg-4  col-md-7 mb-3" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-info mr-4  btn-lg  customBtnG">Περιοχή  +</button>
            <button type="button" class="btn btn-outline-info mr-4  btn-lg  customBtnG">Είδος +</button>
            <button type="button" class="btn btn-outline-info  btn-lg customBtnG">Tιμή +</button>
        </div>

        <div class="col-lg-4 offset-lg-1 col-md-6 offset-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary  btn-lg" type="button"><i class="fa fa-search"></i></button>
                </div>
                <input type="text" class="form-control form-control-lg" placeholder="Αναζήτηση" aria-label="" aria-describedby="basic-addon1">
            </div>
        </div>
    </div> <!--row-->
    <!--end search buttons -->


    <!-- <div class="row">
        <div class="col-md-2 offset-md-1">
             <a href="#"><button class="btnsearchpage">Tαξινόμηση v</button></a>
         </div>
         <div class="col-md-2 offset-md-2">
            <input type="text" name="LastName" id="btngymssearch" value=" Αναζήτηση">
         </div>
         <div class="col-md-1  offset-md-1">
             <a href="#"><button  class="btnsearchpage" id="btngymsfilter">Περιοχή  +</button></a>
         </div>
         <div class="col-md-1">
             <a href="#"><button  class="btnsearchpage" id="btngymsfilter">Είδος +</button></a>
         </div>
         <div class="col-md-1">
             <a href="#"><button  class="btnsearchpage" id="btngymsfilter">Tιμή +</button></a>
         </div>
    </div> -->



<div class="row">
        <div class="col-md-5">

         <div class="gymsresult">
                <div class="row">
                    <div class="col-md-3  offset-md-1 p-4">
                        <a href="#"><img  src= " <?php echo URLROOT?> /images/search/gym_small_image.jpg" id="gymsmallimg" alt="gymimg"></a>
                    </div>
                    <div class="col=-md-7 offset-md-1 p-4 ">
                        <p id="gymstitles"> <a href="#">Workout Hall Crossfit</a></p>
                        <img src= " <?php echo URLROOT;?> /images/stars.png" alt="stars"/>
                        <p>Ρόδων 6 & Κυβέλης 17456, Άλιμος </p>
                        <p>Συνδρομή απο 50€ </p>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-9 offset-md-1">
                        <p><b>Crosfii - Boxing  - KingBoxing -  Climbing</b></p>
                    </div>
                    <div class="col-md-1 ">
                        <img src= " <?php echo URLROOT;?> /images/search/heart.png" alt="stars"/>
                    </div>
                </div>
             </div>

             <div class="gymsresult">
                <div class="row">
                    <div class="col-md-3  offset-md-1 p-4 ">
                        <a href="#"><img  src= " <?php echo URLROOT;?> /images/search/gym_small_image.jpg" id="gymsmallimg" alt="gymimg"></a>
                    </div>
                    <div class="col=-md-7 offset-md-1 p-4 ">
                        <p id="gymstitles"> <a href="#">Workout Hall Crossfit</a></p>
                        <img src= " <?php echo URLROOT;?> /images/stars.png" alt="stars"/>
                        <p>Ρόδων 6 & Κυβέλης 17456, Άλιμος </p>
                        <p>Συνδρομή απο 50€ </p>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-9 offset-md-1">
                        <p><b>Crosfii - Boxing  - KingBoxing -  Climbing</b></p>
                    </div>
                    <div class="col-md-1 ">
                        <img src= " <?php echo URLROOT;?> /images/search/heart.png" alt="stars"/>
                    </div>
                </div>
             </div>

             <div class="gymsresult">
                <div class="row text-center">
                  <div class="card text-center mx-auto">
                  <img class="card-img-top" src= " <?php echo URLROOT;?> /images/search/gym_small_image.jpg" id="gymsmallimg" alt="gymimg">
                    <div class="card-body">
                        <h2 class="card-title">Workout Hall Crossfit</h2>
                        <img src= " <?php echo URLROOT;?> /images/stars.png" alt="stars"/>
                        <br><br>
                        <p class="card-text lead">Ρόδων 6 & Κυβέλης 17456, Άλιμος</p>
                        <p class="card-text lead">Συνδρομή απο 50€ </p>
                        <hr>
                        <p class="card-text"><b>Crosfii - Boxing  - KingBoxing -  Climbing</b></p>
                        <hr>
                        <img src= " <?php echo URLROOT;?> /images/search/heart.png" alt="stars"/>
                    </div>
                  </div>
                </div>
             </div>



        </div>


    <div class="col-md-7">
    
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d25184.740875482392!2d23.736678!3d37.904898!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sel!2sgr!4v1548926172647" width="100%" height="768" padding="0" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <div id="map"></div>
        <div id="right-panel">
            <h2>Results</h2>
            <ul id="places"></ul>
            <button id="more">More results</button>
        </div>
<script>

      function initMap() {
        // Create the map.
        var pyrmont = {lat: 37.9838, lng: 23.7275};
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 10
        });

        // Create the places service.
        var service = new google.maps.places.PlacesService(map);
        var getNextPage = null;
        var moreButton = document.getElementById('more');
        moreButton.onclick = function() {
          moreButton.disabled = true;
          if (getNextPage) getNextPage();
        };

        // Perform a nearby search.
        service.nearbySearch(
            {location: pyrmont, radius: 500, type: ['store']},
            function(results, status, pagination) {
              if (status !== 'OK') return;

              createMarkers(results);
              moreButton.disabled = !pagination.hasNextPage;
              getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
              };
            });
      }

      function createMarkers(places) {
        var bounds = new google.maps.LatLngBounds();
        var placesList = document.getElementById('places');

        for (var i = 0, place; place = places[i]; i++) {
          var image = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          var marker = new google.maps.Marker({
            map: map,
            icon: image,
            title: place.name,
            position: place.geometry.location
          });

          var li = document.createElement('li');
          li.textContent = place.name;
          placesList.appendChild(li);

          bounds.extend(place.geometry.location);
        }
        map.fitBounds(bounds);
      }
</script>
    </div>

     

</div>
       



<?php require  APPROOT . '/views/inc/footer.php'?>
