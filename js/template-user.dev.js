var me = jQuery("span.all_time.user_dashboard");
if (me.length > 0) {
    var data_lable_year = me.data("data_lable_year");
    var data_sets_year = me.data("data_sets_year");
    if (data_lable_year && data_sets_year) {
        var lineChartData_total_year = {
            labels: data_lable_year,
            datasets: [{
                fillColor: "rgba(87, 142, 190, 0.5)",
                strokeColor: "rgba(87, 142, 190, 0.8)",
                pointColor: "rgba(87, 142, 190, 0.75)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(87, 142, 190, 1)",
                data: data_sets_year
            }]
        };
        jQuery(function () {
            var ctx_year = document.getElementById("canvas_year").getContext("2d");
            new Chart(ctx_year).Line(lineChartData_total_year, {
                responsive: !0,
                animationEasing: "easeOutBounce"
            })
        })
    }
};
var me = jQuery("span.this_month.user_dashboard");
if (me.length > 0) {
    var data_lable = me.data("data_lable");
    var data_sets = me.data("data_sets");
    var lineChartData_total = {
        labels: data_lable,
        datasets: [{
            fillColor: "rgba(87, 142, 190, 0.5)",
            strokeColor: "rgba(87, 142, 190, 0.8)",
            pointColor: "rgba(87, 142, 190, 0.75)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(87, 142, 190, 1)",
            data: data_sets
        }]
    };
    jQuery(function () {
        var ctx = document.getElementById("canvas_month").getContext("2d");
        new Chart(ctx).Line(lineChartData_total, {
            responsive: !0,
            animationEasing: "easeOutBounce"
        })
    })
};
var me = jQuery("span.year.user_dashboard");
if (me.length > 0) {
    var data_lable_year = me.data("data_lable_year");
    var data_sets_year = me.data("data_sets_year");
    if (data_lable_year && data_sets_year) {
        var lineChartData_total_year = {
            labels: data_lable_year,
            datasets: [{
                fillColor: "rgba(87, 142, 190, 0.5)",
                strokeColor: "rgba(87, 142, 190, 0.8)",
                pointColor: "rgba(87, 142, 190, 0.75)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(87, 142, 190, 1)",
                data: data_sets_year
            }]
        }

        jQuery(function ($) {
            $(document).on('click', '.btn_all_time', function () {
                setTimeout(function () {
                    var ctx_year = document.getElementById("canvas_year").getContext("2d");
                    var $my_char = new Chart(ctx_year).Line(lineChartData_total_year, {
                        responsive: !0,
                        animationEasing: "easeOutBounce"
                    })
                }, 500);
                $('.div_custom_month').hide()
            })
        })
    }
};
var me = jQuery("span.else.user_dashboard");
if (me.length > 0) {
    var data_lable = me.data("data_lable");
    var data_sets = me.data("data_sets");
    if (data_lable && data_sets) {
        var lineChartData_total = {
            labels: data_lable,
            datasets: [{
                fillColor: "rgba(87, 142, 190, 0.5)",
                strokeColor: "rgba(87, 142, 190, 0.8)",
                pointColor: "rgba(87, 142, 190, 0.75)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(87, 142, 190, 1)",
                data: data_sets
            }]
        };
        jQuery(function () {
            var ctx = document.getElementById("canvas_month").getContext("2d");
            new Chart(ctx).Line(lineChartData_total, {
                responsive: !0,
                animationEasing: "easeOutBounce"
            })
        })
    }
};
var me = jQuery("span.st_user_dashboard_info.lineChartData_total");
if (me.length > 0) {
    var data_lable = me.data("data_label");
    var data_sets = me.data("data_sets");
    var lineChartData_total = {
        labels: data_lable,
        datasets: [{
            label: "",
            fillColor: "rgba(87, 142, 190, 0.5)",
            strokeColor: "rgba(87, 142, 190, 0.8)",
            pointColor: "rgba(87, 142, 190, 0.75)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(87, 142, 190, 1)",
            data: data_sets
        }]
    };
    jQuery(function ($) {
        var ctx = document.getElementById("canvas_this_month").getContext("2d");
        new Chart(ctx).Line(lineChartData_total, {
            responsive: !0,
            animationEasing: "easeOutBounce"
        })
    })
};
var me = jQuery("span.st_user_dashboard_info.lineChartData_total_year");
if (me.length > 0) {
    var data_lable_year = me.data("data_lable_year");
    var data_sets_year = me.data("data_sets_year");
    if (data_lable_year && data_sets_year) {
        var lineChartData_total_year = {
            labels: data_lable_year,
            datasets: [{
                fillColor: "rgba(87, 142, 190, 0.5)",
                strokeColor: "rgba(87, 142, 190, 0.8)",
                pointColor: "rgba(87, 142, 190, 0.75)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(87, 142, 190, 1)",
                data: data_sets_year
            }]
        }

        jQuery(function ($) {
            $(document).on('click', '.btn_single_all_time', function () {
                setTimeout(function () {
                    var ctx_year = document.getElementById("canvas_year").getContext("2d");
                    var $my_char = new Chart(ctx_year).Line(lineChartData_total_year, {
                        responsive: !0,
                        animationEasing: "easeOutBounce"
                    })
                }, 500);
                $('.div_single_custom').hide()
            })
        })
    }
};
jQuery(function ($) {
    var type_price = $('#type_price').val();
    if (type_price == 'activity_price') {
        $('.activity_price').show(500);
        $('.people_price').hide(500)
    } else {
        $('.activity_price').hide(500);
        $('.people_price').show(500)
    }

    $('#type_price').on('change', function () {
        var type_price = $(this).val();
        if (type_price == 'activity_price') {
            $('.activity_price').show(500);
            $('.people_price').hide(500)
        } else {
            $('.activity_price').hide(500);
            $('.people_price').show(500)
        }
    });
    var type_activity = $('#type_activity').val();
    if (type_activity == 'specific_date') {
        $('.data_activity_specific_date').show(500);
        $('.data_duration').hide(500)
    } else {
        $('.data_activity_specific_date').hide(500);
        $('.data_duration').show(500)
    }

    $('#type_activity').on('change', function () {
        var type_activity = $(this).val();
        if (type_activity == 'specific_date') {
            $('.data_activity_specific_date').show(500);
            $('.data_duration').hide(500)
        } else {
            $('.data_activity_specific_date').hide(500);
            $('.data_duration').show(500)
        }
    })
});
jQuery(function ($) {
    var type_price = $('#type_price').val();
    if (type_price == 'tour_price') {
        $('.tour_price').show(500);
        $('.people_price').hide(500)
    } else {
        $('.tour_price').hide(500);
        $('.people_price').show(500)
    }

    $('#type_price').on('change', function () {
        var type_price = $(this).val();
        if (type_price == 'tour_price') {
            $('.tour_price').show(500);
            $('.people_price').hide(500)
        } else {
            $('.tour_price').hide(500);
            $('.people_price').show(500)
        }
    });
    var tour_type = $('#tour_type').val();
    if (tour_type == 'specific_date') {
        $('.data_specific_date').show(500);
        $('.data_duration').hide(500)
    } else {
        $('.data_specific_date').hide(500);
        $('.data_duration').show(500)
    }

    $('#type_tour').on('change', function () {
        var tour_type = $(this).val();
        if (tour_type == 'specific_date') {
            $('.data_specific_date').show(500);
            $('.data_duration').hide(500)
        } else {
            $('.data_specific_date').hide(500);
            $('.data_duration').show(500)
        }
    })
});
jQuery(function ($) {
    if ($(".single_partner_contact .info_map").length) {
        var lat = $(".single_partner_contact .info_map").data('lat');
        var lng = $(".single_partner_contact .info_map").data('lng');
        var zoom = $(".single_partner_contact .info_map").data('zoom');
        var icon = $(".single_partner_contact .info_map").data('icon');
        $(".single_partner_contact .info_map").gmap3({
            map: {
                options: {
                    center: [lat, lng],
                    zoom: zoom
                }
            },
            marker: {
                values: [{
                    latLng: [lat, lng],
                    options: {
                        icon: icon
                    }
                }]
            }
        })
    }
});
jQuery(function ($) {
    var type_price = $('#type_price').val();
    if (type_price == 'activity_price') {
        $('.activity_price').show(500);
        $('.people_price').hide(500)
    } else {
        $('.activity_price').hide(500);
        $('.people_price').show(500)
    }

    $('#type_price').on('change', function () {
        var type_price = $(this).val();
        if (type_price == 'activity_price') {
            $('.activity_price').show(500);
            $('.people_price').hide(500)
        } else {
            $('.activity_price').hide(500);
            $('.people_price').show(500)
        }
    });
    var type_activity = $('#type_activity').val();
    if (type_activity == 'specific_date') {
        $('.data_activity_specific_date').show(500);
        $('.data_duration').hide(500)
    } else {
        $('.data_activity_specific_date').hide(500);
        $('.data_duration').show(500)
    }

    $('#type_activity').on('change', function () {
        var type_activity = $(this).val();
        if (type_activity == 'specific_date') {
            $('.data_activity_specific_date').show(500);
            $('.data_duration').hide(500)
        } else {
            $('.data_activity_specific_date').hide(500);
            $('.data_duration').show(500)
        }
    })
});
jQuery(function ($) {
    var type_price = $('#type_price').val();
    if (type_price == 'tour_price') {
        $('.tour_price').show(500);
        $('.people_price').hide(500)
    } else {
        $('.tour_price').hide(500);
        $('.people_price').show(500)
    }

    $('#type_price').on('change', function () {
        var type_price = $(this).val();
        if (type_price == 'tour_price') {
            $('.tour_price').show(500);
            $('.people_price').hide(500)
        } else {
            $('.tour_price').hide(500);
            $('.people_price').show(500)
        }
    });
    var tour_type = $('#tour_type').val();
    if (tour_type == 'specific_date') {
        $('.data_specific_date').show(500);
        $('.data_duration').hide(500)
    } else {
        $('.data_specific_date').hide(500);
        $('.data_duration').show(500)
    }

    $('#tour_type').on('change', function () {
        var tour_type = $(this).val();
        if (tour_type == 'specific_date') {
            $('.data_specific_date').show(500);
            $('.data_duration').hide(500)
        } else {
            $('.data_specific_date').hide(500);
            $('.data_duration').show(500)
        }
    })
});
jQuery(function ($) {
    if ($(".st_google_map_user").length > 0) {
        var data_map = $(".st_user_overview").data("overview");
        var map = $('.st_google_map_user').gmap3({
            map: {
                options: {
                    zoom: 5
                }
            }
        });
        var gmap_object = map.gmap3('get');
        var bounds = new google.maps.LatLngBounds();
        var markers = [];
        for (var key in data_map) {
            var tmp_data = data_map[key];
            var myLatLng = new google.maps.LatLng(tmp_data[0], tmp_data[1]);
            bounds.extend(myLatLng);
            var marker = ST_addMarker(myLatLng, gmap_object, tmp_data, map)

            markers.push(marker)
        }

        function ST_addMarker(location, gmap_object, tmp_data, map) {
            var marker = new google.maps.Marker({
                position: location,
                options: {
                    icon: tmp_data[2],
                    animation: google.maps.Animation.DROP
                },
                data: tmp_data
            });
            return marker
        }

        new MarkerClusterer(gmap_object, markers, {
            gridSize: 50
        });
        gmap_object.fitBounds(bounds)
    }
})
