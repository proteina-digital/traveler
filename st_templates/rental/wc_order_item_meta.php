<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 14/07/2015
 * Time: 3:17 CH
 */
$item_data=isset($item['item_meta'])?$item['item_meta']:array();
$format=TravelHelper::getDateFormat();
?>
<ul class="wc-order-item-meta-list">
    <?php if(isset($item_data['_st_check_in'])): $data= $item_data['_st_check_in']; ?>
        <li>
            <span class="meta-label"><?php _e('Date:','traveler') ?></span>
            <span class="meta-data"><?php
                echo esc_html($data);
                ?>
                <?php if(isset($item_data['_st_check_out'])){ $data=$item_data['_st_check_out']; ?>
                    <i class="fa fa-long-arrow-right"></i>
                    <?php echo esc_html($data); ?>
                <?php }?>


            </span>
        </li>
    <?php endif;?>

    <?php if(isset($item_data['_st_adult_number'])):?>
        <li>
            <span class="meta-label"><?php _e('Adult:','traveler') ?></span>
            <span class="meta-data"><?php echo esc_html($item_data['_st_adult_number']) ?></span>
        </li>
    <?php endif; ?>    
    <?php if(isset($item_data['_st_child_number'])):?>
        <li>
            <span class="meta-label"><?php _e('Children:','traveler') ?></span>
            <span class="meta-data"><?php echo esc_html($item_data['_st_child_number']) ?></span>
        </li>
    <?php endif;?>
    <?php if(isset($item_data['_st_extras']) and ($extra_price = $item_data['_st_extra_price'])): $data=$item_data['_st_extras'];?>
        <li>
        <p><?php echo __("Extra prices"  ,'traveler') .": "; ?></p>
        <ul>
        <?php 
        if(!empty($data['title']) and  is_array($data['title'])){
            foreach ($data['title'] as $key => $title) { ?>
                <?php if($data['value'][$key]){ ?>
                    <li style="padding-left: 10px "> <?php echo esc_attr($title) ;?>: 
                    <?php 
                        echo esc_html($data['value'][$key]) ;?> x <?php echo TravelHelper::format_money($data['price'][$key]) ;
                    ?> 
                </li>
                <?php }?>                
            <?php }
        }        
        ?>
        </ul>
        </li>
    <?php endif; ?>
    <?php  if(isset($item_data['_st_discount_rate'])): $data=$item_data['_st_discount_rate'];?>
        <?php  if (!empty($data)) {?><li><p>
            <?php echo __("Discount"  ,'traveler') .": "; ?>
            <?php echo esc_attr($data) ."%";?>
        <?php } ;?></p></li>
    <?php endif; ?>
    <?php  if(isset($item_data['_line_tax'])): $data=$item_data['_line_tax'];?>
            <?php  if (!empty($data)) {?><li><p>
            <?php echo __("Tax"  ,'traveler') .": "; ?>
            <?php echo TravelHelper::format_money($data) ;?>
        <?php } ;?></p></li>
    <?php endif; ?>
    
</ul>