<div class="st-service-feature">
    <div class="row">

        <?php $current_post_type = get_post_type(get_the_ID()); ?>

        <!-- TIPO -->
        <div class="col-6 col-sm-3">
            <div class="pd-infor-items">
                <div class="pd-infor-item pd-infor-item-icon">
                    <img height="35" alt="Tipo de Acomodação" src="<?php echo get_template_directory_uri(); ?>/pd_assets/casa.svg">
                </div>
                <div class="pd-infor-item pd-infor-item-text">
                    <p>
                        <?php
                            switch ($current_post_type) {
                                case 'st_activity':
                                    $current_pt_name = __( 'Restaurante', 'traveler' );
                                    break;
                                case 'st_tours':
                                    $current_pt_name = __( 'Tour', 'traveler' );
                                    break;
                                case 'st_hotel':
                                case 'hotel_room':
                                    $current_pt_name = __( 'Accommodation', 'traveler' );
                                    break;
                                
                                default:
                                    $current_pt_name = "";
                                    break;
                            }
                            echo $current_pt_name;
                        ?>
                    </p>
                </div>
            </div>
        </div>


        <!-- TAMANHO -->
        <?php $max_people = get_post_meta( get_the_ID(), 'max_people', true ); ?>
        <?php if(!empty($max_people)): ?>
        <div class="col-6 col-sm-3">
            <div class="pd-infor-items">
                <div class="pd-infor-item pd-infor-item-icon">
                    <img height="35" alt="Tipo de Acomodação" src="<?php echo get_template_directory_uri(); ?>/pd_assets/grupo.svg">
                </div>
                <div class="pd-infor-item pd-infor-item-text">
                    <p>
                        <?php
                            switch ($current_post_type) {
                                case 'st_activity':
                                // Vinícola = por grupo
                                // Restaurante = Por Mesa
                                    $per_type = __( 'per group', 'traveler' );
                                    break;
                                case 'st_tours':
                                    $per_type = __( 'per group', 'traveler' );
                                    break;
                                case 'st_hotel':
                                case 'hotel_room':
                                    $per_type = __( 'per hotel guest', 'traveler' );
                                    break;
                                
                                default:
                                    $per_type = __( 'per group', 'traveler' );
                                    break;
                            }

                            if ( empty( $max_people ) or $max_people == 0 or $max_people < 0 ) {
                                echo __( 'Unlimited', 'traveler' );
                            } else {
                                echo sprintf( __( '%s %s', 'traveler' ), $max_people,  $per_type);
                            }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>



        <!-- CAMA/QUARTO -->
        <?php $bed_number = get_post_meta( get_the_ID(), 'bed_number', true ); ?>
        <?php if(!empty($bed_number) && ($current_post_type == 'st_hotel' || $current_post_type == 'hotel_room')): ?>
        <div class="col-6 col-sm-3">
            <div class="pd-infor-items">
                <div class="pd-infor-item pd-infor-item-icon">
                    <img height="35" alt="Tipo de Acomodação" src="<?php echo get_template_directory_uri(); ?>/pd_assets/quarto.svg">
                </div>
                <div class="pd-infor-item pd-infor-item-text">
                    <p>
                        <?php echo sprintf( __( 'Beds: %s', 'traveler' ), $bed_number ) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>