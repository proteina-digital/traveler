<?php
    $include = get_post_meta( get_the_ID(), 'activity_include', true );
    $exclude = get_post_meta( get_the_ID(), 'activity_exclude', true );
    if (!empty($include) or !empty($exclude)) {
        ?>
        <div class="st-hr large"></div>
        <div class="accordion-item">
            <h2 class="st-heading-section" id="headingInExClude">
                <button class="accordion-button pd-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInExClude" aria-expanded="true" aria-controls="collapseInExClude">
                    <?php echo __('Informations', 'traveler'); ?>
                </button>
            </h2>
            <div id="collapseInExClude" class="accordion-collapse collapse show" aria-labelledby="headingInExClude" data-bs-parent="#headingInExClude">
                <div class="accordion-body">
                    <div class="row">
                        <?php if (!empty($include)) { ?>
                            <div class="col-lg-6">
                                <ul class="include">
                                    <h3 class="pd-single-attribute-title"><?php echo __( 'Included in the booking', 'traveler' ); ?></h3>
                                    <?php
                                    $in_arr = explode("\n", $include);
                                    if (!empty($in_arr)) {
                                        foreach ($in_arr as $k => $v) {
                                            echo '<li class="pd-single-attribute">' . TravelHelper::getNewIcon('check-1', '#2ECC71', '14px', '14px', false) . esc_html($v) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php if (!empty($exclude)) { ?>
                            <div class="col-lg-6">
                                <ul class="include">
                                    <h3 class="pd-single-attribute-title"><?php echo __( 'Not Included in the booking', 'traveler' ); ?></h3>
                                    <?php
                                    $ex_arr = explode("\n", $exclude);
                                    if (!empty($ex_arr)) {
                                        foreach ($ex_arr as $k => $v) {
                                            echo '<li class="pd-single-attribute">' . TravelHelper::getNewIcon('check-1', '#2ECC71', '14px', '14px', false) . esc_attr($v) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
