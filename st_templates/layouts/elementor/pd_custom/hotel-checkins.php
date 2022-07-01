<div class="st-hr large"></div>
<div class="accordion-item">
    <h2 class="st-heading-section" id="hotelCheckins">
        <button class="accordion-button pd-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCheckin" aria-expanded="true" aria-controls="collapseCheckin">
            <?php echo __('Informations', 'traveler'); ?>
        </button>
    </h2>
    <div id="collapseCheckin" class="accordion-collapse collapse show" aria-labelledby="hotelCheckins" data-bs-parent="#hotelCheckins">
        <div class="accordion-body">
            <div class="row">
                <?php if (!empty(get_post_meta($post_id, 'check_in_time', true)) && !empty(get_post_meta($post_id, 'check_out_time', true))) { ?>
                    <div class="col-lg-12">
                        <ul class="include pd-list-attributes">
                            <?php echo '<li class="pd-single-attribute">' . TravelHelper::getNewIcon('check-1', '#2ECC71', '14px', '14px', false) . esc_html__('Check In', 'traveler').': '.get_post_meta($post_id, 'check_in_time', true) . '</li>'; ?>

                            <?php echo '<li class="pd-single-attribute">' . TravelHelper::getNewIcon('check-1', '#2ECC71', '14px', '14px', false) . esc_html__('Check Out', 'traveler').': '.get_post_meta($post_id, 'check_out_time', true) . '</li>'; ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

