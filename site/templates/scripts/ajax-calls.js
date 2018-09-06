$(document).ready(function(){
    getVehicleCount();

})





$(document).ready(function() {
    $('#searchform :input').on('input', function() {
        $("#content").html('<h2>Loading…</h2>');
       
        loadSearchResults(function(result) {
            if (result === false){
                result = '<h2>An error occurred.</h2>';
            }
           
            if (result == '')
                result = '<h2>No results found.</h2>';           

            $("#content").html(result);
        });
    });

    function loadSearchResults(callback) {
        var form = $('#searchform :input[value!=""]');
        var serialized_form = form.serialize(); //if your search field is named “s” this will be “s=search words”
       
        if (serialized_form !== '') {
            var new_url = 'http://192.168.12.3:8888/development/projects/api/pw/search/?'+serialized_form; //consequently, this will be „/search/?s=search words“
            if (/* IE9 needs this check */ history.pushState) history.pushState({}, '', new_url); //your address bar now shows www.example.com/search/?s=search words
       
            $.ajax({
                type: form.attr('method'),
                url: 'http://192.168.12.3:8888/development/projects/api/pw/ajax/search/',
                data: serialized_form,
                success: function(result) {
                    if (callback && typeof(callback) === 'function') {
                        callback(result);
                    }
                },
                error: function() {
                    if (callback && typeof(callback) === 'function') {
                        callback(false);
                    }
                }
            });
        }
    }
});











function getVehicleCount() {
    $.ajax({
        url: "http://192.168.12.3:8888/development/projects/api/pw/ajax/counter/",
        success: function( response ) {
            $('.count').html( response.title);
        }
    });

}



$("a.counter").click(function() {
    event.preventDefault();

    var pageId = $(this).attr("data-parent");
    var repeater = $(this).attr("data-repeater");

    console.log(pageId);
    console.log(repeater);

var data = {
    name: pageId,
    repeater: repeater
    //name: repeater
};

$.ajax({
    data: data,
    url: "http://192.168.12.3:8888/development/sites/specials/ajax-actions/count-clicks/",
    success: function( response ) {
        $('#specials-running').html( response );
        console.log(pageId);
        console.log(repeater);
    }
});


});