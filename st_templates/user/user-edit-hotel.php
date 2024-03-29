<?php
/**
 * @package WordPress
 * @subpackage Traveler
 * @since 1.0
 *
 * User Update hotel
 *
 * Created by ShineTheme
 *
 */
$hotel_add_fields = ST_Config::get('partner.add.hotel');
$post_id = STInput::request('id', '');
$data_status = 'new';
if(!empty($post_id)){
    $data_status = 'edit';
    $inventory = get_template_directory() . '/inc/plugins/ot-custom/fields/inventory/inventory.php';
    if(file_exists($inventory)){
        require_once $inventory;
    }
}
?>
<div class="st-create-service">
    <h2 class="st-header">
        <?php
        $class_content = '';
        if(!empty($post_id)) {
            echo __('Edit Hotel', 'traveler'); 
        }else{
            echo __('Add Hotel', 'traveler');
            $class_content = ' add';
        }
        ?>
    </h2>
    <?php echo STTemplate::message(); ?>
    <div class="st-create-service-content <?php echo $class_content;?>">
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php
                    if(!empty($hotel_add_fields['tabs'])){
                        foreach ($hotel_add_fields['tabs'] as $k => $v){
                            $class_active = '';
                            if($k == 0)
                                $class_active = 'active';
                            $icon = '<img src="'. get_template_directory_uri() . '/v2/images/svg/ico_check_badge.svg' .'" />';
                            echo '<li role="presentation" class="'. esc_attr($class_active) .'" data-obj="tab"><a href="#'. esc_attr($v['name']) .'" aria-controls="'. esc_attr($v['name']) .'" role="tab" data-toggle="tab">'. balanceTags($v['label'] . $icon) . '</a></li>';
                        }
                    }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                    if(!empty($hotel_add_fields['content'])){
                        $ic = 0;
                        foreach ($hotel_add_fields['content'] as $k => $v){
                            $class_active = '';
                            if($ic == 0)
                                $class_active = 'active';
                            ?>
                            <div role="tabpanel" class="tab-pane <?php echo esc_attr($class_active); ?>" id="<?php echo esc_attr($k); ?>" data-order="<?php echo esc_attr($ic); ?>">
                                <div class="row">
                                    <form method="post" action="" class="st-partner-create-form">
                                <?php
                                    $fields = $hotel_add_fields['content'][$k];
                                    if(!empty($fields)){
                                        foreach ($fields as $kk => $vv){
                                            $class_col = 'col-lg-12';
                                            if(!empty($vv['col']))
                                                $class_col = 'col-lg-' . $vv['col'];

                                            if(isset($vv['clear'])){
                                                $class_col .= ' st-clear-fix';
                                            }
                                            ?>

                                            <div name="<?php echo $vv['type']; ?>" class="<?php echo esc_attr($class_col); ?> st-partner-field-item">
                                                <?php echo st()->load_template('fields/' . esc_html($vv['type']), '', array('data' => $vv, 'post_id' => $post_id)); ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    if($ic < count($hotel_add_fields['content']) - 1) {
                                        echo '<input type="hidden" name="step" value="' . ($ic + 1) . '"/>';
                                    }else{
                                        echo '<input type="hidden" name="step" value="final"/>';
                                    }
                                    echo '<input type="hidden" name="step_name" value="'. esc_attr($k) .'" />';
                                    if(isset($_GET['id'])&& !empty($_GET['id'])){
                                        echo '<input type="hidden" name="btn_update_post_type_hotel" value="1"/>';
                                        echo '<input type="hidden" name="post_id" value="'. esc_attr($_GET['id']) .'"/>';
                                    }else{
                                        echo '<input type="hidden" name="btn_insert_post_type_hotel" value="1"/>';
                                        echo '<input type="hidden" class="st-partner-input-post-id" name="post_id" value=""/>';
                                    }
                                ?>
                                        <input type="hidden" name="action" value="st_partner_create_service"/>
                                    </form>
                                </div>
                            </div>
                            <?php
                            $ic++;
                        }
                    }
                ?>
            </div>

            <div class="st-partner-action">
                <input type="submit" class="form-control btn btn-primary st-btn-back" value="<?php echo __('BACK', 'traveler'); ?>"/>
                <button type="submit" class="form-control btn btn-primary st-btn-continue" data-obj="button" data-status="<?php echo esc_attr($data_status); ?>"><span><?php echo __('CONTINUE', 'traveler'); ?></span> <i class="fa fa-spin fa-spinner"></i></button>
            </div>
        </div>
    </div>
</div>
