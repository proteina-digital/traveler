<div class="st-banner-search-form">
    <?php 
    if(!empty($type_form) && ($type_form !== 'single')){
        if(count($services) > 1){ 
            echo '<ul class="multi-search nav nav-pills" role="tablist">';
                $j = 0;
                
                $new_services = array();

                for ($i=0; $i < count($services); $i++) { 
                    switch ($services[$i]) {
                        case 'st_rental':
                            $new_services[3] = $services[$i];
                            break;
                        case 'st_tours':
                            $new_services[2] = $services[$i];
                            break;
                        case 'st_activity':
                            $new_services[0] = $services[$i];
                            break;
                        case 'st_cars':
                            $new_services[4] = $services[$i];
                            break;
                        case 'st_cartransfer':
                            $new_services[5] = $services[$i];
                            break;
                        default:
                            $new_services[1] = $services[$i];
                            break;
                    }
                }

                // ksort($services);
                // echo "<pre>";
                // print_r($new_services);
                // echo "</pre>";

                // // $services = $new_services;

                // // echo "<pre>";
                // // print_r($services);
                // // echo "</pre>";
                // ksort($services);

                //  echo "<pre>";
                // print_r($services);
                // echo "</pre>";

                for ($i=0; $i < count($new_services); $i++) { 
                    $vtab = $new_services[$i];
                    switch ($vtab) {
                        case 'st_rental':
                            $tab_title = __('Rental','traveler');
                            break;
                        case 'st_tours':
                            $tab_title = __('Tours','traveler');
                            break;
                        case 'st_activity':
                            $tab_title = __('Activity','traveler');
                            break;
                        case 'st_cars':
                            $tab_title = __('Cars Rental','traveler');
                            break;
                        case 'st_cartransfer':
                            $tab_title = __('Car Transfer','traveler');
                            break;
                        default:
                            $tab_title = __('Hotel','traveler');
                            break;
                    }
                    $active_class = ($j == 0) ? 'active' : '';
                    echo '<li class="nav-item" role="presentation">
                        <a class="nav-link ' . esc_attr($active_class) . '" data-bs-toggle="pill" href="#" data-bs-target="#nav-' . esc_attr($vtab) . '" type="button" role="tab" aria-controls="nav-' . esc_attr($vtab) . '"  data-bs-target="#tab' . esc_attr($vtab) . '">' . esc_attr($tab_title) . '</a>
                        </li>';
                    $j++;
                }
            echo '</ul>';

            echo '<div class="tab-content">';
                $jj = 0;
                for ($i=0; $i < count($new_services); $i++) { 
                    $vtabcontent = $new_services[$i];
                    switch ($vtabcontent) {
                        case 'st_rental':
                            $folder_name = 'rental';
                            break;
                        case 'st_tours':
                            $folder_name = 'tour';
                            break;
                        case 'st_activity':
                            $folder_name = 'activity';
                            break;
                        case 'st_cars':
                            $folder_name = 'car';
                            break;
                        case 'st_cartransfer':
                            $folder_name = 'car_transfer';
                            break;
                        default:
                            $folder_name = 'hotel';
                            break;
                    }
                    $active_class = ($jj == 0) ? 'show active' : '';
                    echo '<div role="tabpanel" class="tab-pane fade' . esc_attr($active_class) . '" id="nav-' . esc_attr($vtabcontent) . '" role="tabpanel">'; ?>
                        <div class="st-search-form-el st-border-radius">
                            <div class="st-search-el">
                                <?php echo apply_filters('get_search_form_tab', st()->load_template('layouts/elementor/' . esc_attr($folder_name) . '/elements/search-form', '', array('in_tab' => true, 'vtabcontent' => $vtabcontent)),array('in_tab' => true, 'vtabcontent' => $vtabcontent));
                                ?>
                            </div>
                        </div>
                    
                   <?php echo '</div>';
                    $jj++;
                }
            echo '</div>';
        }
    } else {
        ?>
    
        <div class="st-search-form-el st-border-radius">
            <div class="st-search-el">
                <?php 
                    switch ($service) {
                        case 'st_rental':
                            $folder_name = 'rental';
                            break;
                        case 'st_tours':
                            $folder_name = 'tour';
                            break;
                        case 'st_activity':
                            $folder_name = 'activity';
                            break;
                        case 'st_cars':
                            $folder_name = 'car';
                            break;
                        case 'st_cartransfer':
                            $folder_name = 'car_transfer';
                            break;
                        default:
                            $folder_name = 'hotel';
                            break;
                    }
                    echo st()->load_template('layouts/elementor/' . esc_attr($folder_name) . '/elements/search-form');
                ?>
            </div>
        </div>
    <?php }?>
</div>