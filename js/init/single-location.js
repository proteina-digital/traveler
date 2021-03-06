jQuery(function ($) {
    if ($(".st_single_location").length < 1) return;
    $('.nav-tabs').on('shown.bs.tab', function () {
        var st_location_gmap3 = $("#list_map").gmap3({
            trigger: "resize",
            map: {
                options: {
                    center: [current_location.map_lat, current_location.map_lng],
                    zoom: parseInt(current_location.location_map_zoom)
                }
            }
        });
        var st_location_gmap3_new = $("#list_map_new").gmap3({
            trigger: "resize",
            map: {
                options: {
                    center: [current_location.map_lat, current_location.map_lng],
                    zoom: parseInt(current_location.location_map_zoom)
                }
            }
        })
    })
})
