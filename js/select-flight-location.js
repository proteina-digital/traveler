jQuery(function ($) {
    "use strict";
    var last_select_clicked = !1;
    $('.custom-flight-location').each(function () {
        var t = $(this);
        var parent = t.closest('.st-flight-wrapper');
        $(this).on('keyup', function (event) {
            last_select_clicked = t;
            parent.find('.st-location-id').remove();
            var name = t.attr('data-name');
            var val = t.val();
            if (val.length >= 2) {
                $.ajax({
                    jsonp: "cb",
                    url: "http://picker.dohop.com/search/?lang=en&sid=completer",
                    dataType: "jsonp",
                    data: {
                        m: 10,
                        input: val
                    },
                }).done(function (respon) {
                    if (typeof respon == 'object') {
                        var html = '';
                        html += '<select name="' + name + '" class="st-location-id st-hidden" tabindex="-1">';
                        for (var i = respon.standard.length - 1; i >= 0; i--) {
                            html += '<option value="' + respon.standard[i].ac + '">' + respon.standard[i].p + ' (' + respon.standard[i].ac + '), ' + respon.standard[i].c + '</option>'
                        }

                        html += '</select>';
                        parent.find('.st-location-id').remove();
                        parent.append(html);
                        html = '';
                        $('select option', parent).prop('selected', !1);
                        $('select option', parent).each(function (index, el) {
                            var country = $(this).data('country');
                            var text = $(this).text();
                            var text_split = text.split("||");
                            text_split = text_split[0];
                            var highlight = get_highlight(text, val);
                            if (highlight.indexOf('</span>') >= 0) {
                                var current_country = $(this).parent('select').attr('data-current-country');
                                if (typeof current_country != 'undefined' && current_country != '') {
                                    if (country == current_country) {
                                        html += '<div data-text="' + text + '" data-country="' + country + '" data-value="' + $(this).val() + '" class="option">' + '<span class="label"><a href="#">' + text_split + '<i class="fa fa-map-marker"></i></a>' + '</div>'
                                    }
                                } else {
                                    html += '<div data-text="' + text + '" data-country="' + country + '" data-value="' + $(this).val() + '" class="option">' + '<span class="label"><a href="#">' + text_split + '<i class="fa fa-map-marker"></i></a>' + '</div>'
                                }
                            }
                        });
                        $('.option-wrapper').html(html).show();
                        t.caculatePosition($('.option-wrapper'), t)
                    }
                }).fail(function (er) {}).always(function () {})
            }
        });
        t.caculatePosition = function () {
            if (!last_select_clicked || !last_select_clicked.length) return;
            var wraper = $('.option-wrapper');
            var input_tag = last_select_clicked;
            var offset = parent.offset();
            var top = offset.top + parent.height();
            var left = offset.left;
            var width = input_tag.outerWidth();
            var wpadminbar = 0;
            if ($('#wpadminbar').length && $(window).width() >= 783) {
                wpadminbar = $('#wpadminbar').height()
            } else {
                wpadminbar = 0
            }

            top = top - wpadminbar;
            var z_index = 99999;
            var position = 'absolute';
            if ($('#search-dialog').length) {
                position = 'fixed';
                top = top + wpadminbar - $(window).scrollTop();
                z_index = 99999
            }

            wraper.css({
                position: position,
                top: top,
                left: left,
                width: width,
                'z-index': z_index
            })
        };
        $(window).on('resize', function () {
            t.caculatePosition()
        })
    });

    function get_highlight(text, val) {
        var highlight = text.replace(new RegExp(val + '(?!([^<]+)?>)', 'gi'), '<span class="highlight">$&</span>');
        return highlight
    }

    var flight_to = '';
    $('.input-daterange input[name="dd1"]').each(function () {
        var form = $(this).closest('form');
        var me = $(this);
        $(this).datepicker({
            language: st_params.locale,
            autoclose: !0,
            todayHighlight: !0,
            startDate: 'today',
            format: $('[data-date-format]').data('date-format'),
            weekStart: 1,
        }).on('changeDate', function (e) {
            $('.st-flight-from').val(e.date.getDate() + '.' + (e.date.getMonth() + 1) + '.' + e.date.getFullYear());
            var new_date = e.date;
            new_date.setDate(new_date.getDate() + 1);
            $('.input-daterange input[name="dd2"]', form).datepicker("remove");
            $('.input-daterange input[name="dd2"]', form).datepicker({
                language: st_params.locale,
                startDate: '+1d',
                format: $('[data-date-format]').data('date-format'),
                autoclose: !0,
                todayHighlight: !0,
                weekStart: 1
            });
            $('.input-daterange input[name="dd2"]', form).datepicker('setDates', new_date);
            $('.input-daterange input[name="dd2"]', form).datepicker('setStartDate', new_date)
        });
        $('.input-daterange input[name="dd2"]', form).datepicker({
            language: st_params.locale,
            startDate: '+1d',
            format: $('[data-date-format]').data('date-format'),
            autoclose: !0,
            todayHighlight: !0,
            weekStart: 1
        }).on('changeDate', function (e) {
            flight_to = e.date.getDate() + '.' + (e.date.getMonth() + 1) + '.' + e.date.getFullYear();
            $('.st-flight-to').val(e.date.getDate() + '.' + (e.date.getMonth() + 1) + '.' + e.date.getFullYear())
        })
    });
    $('.select-flight-trip').on('change', function () {
        if ($(this).val() == 0) {
            $('.st-flight-to').remove();
            flight_to = '';
            $('.input-daterange input[name="dd2"]').removeClass('required');
            $('.input-daterange input[name="dd2"]').removeClass('error');
            $('.input-daterange input[name="dd2"]').datepicker('setDate', null)
        } else {
            $('.input-daterange input[name="dd2"]').addClass('required');
            $('.st-flight-to-field').append('<input type="hidden" name="d2" class="st-flight-to" value="' + flight_to + '">')
        }
    })
})
