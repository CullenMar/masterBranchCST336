$(function() {

     var zipCode = document.getElementById('zip').value;

    $.ajax({
        
            // The URL for the request
            url: "https://maps.googleapis.com/maps/api/geocode/json?&address="+zipCode,

            // Whether this is a POST or GET request
            type: "GET",

            // The type of data we expect back
            dataType: "json",

            //jsonpCallback: 'callback',
        })
        // Code to run if the request succeeds (is done);
        // The response is passed to the function
        .done(function(data) {
            console.log("Zipcode Data:", data);

            // Do not do anything if there is no data
            if (!data || data.length == 0) return;

            // Print the standings
            for (var i in data.results) {
                var results = data.results[i];

                $('#zipResults > tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .html(results.address_components[1].long_name)
                        )
                        .append($('<td>')
                            .html(results.geometry.location.lat)
                        )
                        .append($('<td>')
                            .html(results.geometry.location.lng)
                        )
                    );
            }
        })
        // Code to run if the request fails; the raw request and
        // status codes are passed to the function
        .fail(function(xhr, status, errorThrown) {
            console.log("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        })
        // Code to run regardless of success or failure;
        .always(function(xhr, status) {
            console.log("The request is complete!");
        });
})