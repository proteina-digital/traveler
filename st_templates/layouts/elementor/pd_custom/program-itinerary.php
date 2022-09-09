<?php
$tour_programs = get_post_meta( get_the_ID(), 'activity_program', true );
if ( !empty( $tour_programs ) ) {
    ?>
    <div class="accordion-item">
        <h2 class="st-heading-section" id="headingItinerary">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItinerary" aria-expanded="true" aria-controls="collapseItinerary">
                <?php echo __('More Information', 'traveler'); ?>
            </button>
        </h2>
        <div id="collapseItinerary" class="accordion-collapse collapse show" aria-labelledby="headingItinerary" data-bs-parent="#headingItinerary">
            <div class="accordion-body">
                <div class="st-program-list pd-program-list">

                    <?php
                        foreach ($tour_programs as $k => $v) {
                            ?>
                            
                                <?php
                                    if(!empty($v['image'])){
                                        echo '<div class="icon">';
                                        echo '<img src="'. esc_url($v['image']) .'" alt="' . __('Itenirary', 'traveler') .'" />';
                                        echo '</div>';
                                    }
                                ?>
                                <?php if(!empty( trim(balanceTags(nl2br($v['desc']))) )): ?>
                                    <div class="pd-program-item">
                                        <div>
                                            <h6><?php echo esc_html($v['title']); ?></h6>
                                            <div class="body">
                                                <?php echo balanceTags(nl2br($v['desc'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="pd-program-item-title">
                                        <h4><?php echo esc_html($v['title']); ?></h4>
                                    </div>
                                <?php endif; ?>
                            
                            <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

    
<?php } ?>