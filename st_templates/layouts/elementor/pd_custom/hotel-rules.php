<div class="st-hr large"></div>
<div class="accordion-item">
    <h2 class="st-heading-section" id="headingInExClude">
        <button class="accordion-button pd-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInExClude" aria-expanded="true" aria-controls="collapseInExClude">
            <?php echo __('Hotel Policies', 'traveler'); ?>
        </button>
    </h2>
    <div id="collapseInExClude" class="accordion-collapse collapse show" aria-labelledby="headingInExClude" data-bs-parent="#headingInExClude">
        <div class="accordion-body">
            <div class="row">
                <?php $policies = get_post_meta($post_id, 'hotel_policy', true); ?>
                <?php if ($policies) { ?>
                    <div class="col-lg-12">
                        <ul class="include">
                            <?php
                            foreach ($policies as $policy) {
                                ?>
                                <?php echo '<li class="pd-single-attribute"> <h4 class="f18">'.esc_html($policy['title']).'</h4><div>' . balanceTags($policy['policy_description']) . '</div></li>'; ?>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

