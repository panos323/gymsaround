$( document ).ready(function() {
    
    //show selected items on dropdown for cities
    $(".showSelectedItemAreas button").click(function(){
        $("#dropdownMenuButton:first-child").text($(this).text());
        $("#dropdownMenuButton:first-child").val($(this).text());
    });

    //show again dropdown values on reset
    $("#dropdownReset").on("click", function() {
        $("#dropdownMenuButton:first-child").text('Περιοχή');
        location.reload();
    });

    //show selected items on dropdown for type of fitness
    $(".showSelectedItemType button").click(function(){
        $("#dropdownMenuButtonArr:first-child").text($(this).text());
        $("#dropdownMenuButtonArr:first-child").val($(this).text());
    });

    //show again dropdown values on reset
    $("#dropdownResetTypes").on("click", function() {
        $("#dropdownMenuButtonArr:first-child").text('Είδος');
        location.reload();
    });

    //show current item of slider
    var totalItemsOfSlider = $('.carousel-item').length;
    var currentIndex = $('div.active').index() + 1;
    $('#number').html('1/3');
    $("#carouselExampleControls").on('slid.bs.carousel', function() {
        currentIndex = $('div.active').index() + 1;
       $('#number').html(''+currentIndex+'/'+totalItemsOfSlider+'');
    });

    
 }); // ON PAGE LOADED