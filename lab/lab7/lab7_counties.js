$(function() {
    
     var state = document.getElementById('state').value;

    $.ajax({
        
            // The URL for the request
            url: "./us_counties.json",

            // Whether this is a POST or GET request
            type: "GET",

            // The type of data we expect back
            dataType: "json",

            //jsonpCallback: 'callback',
        })
        // Code to run if the request succeeds (is done);
        // The response is passed to the function
        .done(function(data) {
            console.log("Counties Data:", data);

            // Do not do anything if there is no data
            if (!data || data.length == 0) return;

            // Print the standings
            var dat = state.toString()
            for (var i in data[state]) {
                var counties = data[state];

                $('#countyResults > tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .html(counties[i])
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