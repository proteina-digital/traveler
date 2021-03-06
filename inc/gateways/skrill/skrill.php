<?php

/**

 * Created by PhpStorm.

 * User: Dungdt

 * Date: 12/15/2015

 * Time: 3:19 PM

 */

return;

use Omnipay\Omnipay;



if (!class_exists('ST_Skrill_Payment_Gateway')) {

    class ST_Skrill_Payment_Gateway extends STAbstactPaymentGateway

    {

        static private $_ints;

        private $default_status = true;

        private $_gatewayObject = null;

        private $_gateway_id = 'st_skrill';



        function __construct()

        {

            add_filter('st_payment_gateway_st_skrill_name', array($this, 'get_name'));

            try {

                $this->_gatewayObject = Omnipay::create('Skrill');



            } catch (Exception $e) {

                $this->default_status = false;

            }

            add_action('admin_notices', array($this, '_add_notices'));

            add_action('admin_init', array($this, '_dismis_notice'));

        }



        function _dismis_notice()

        {

            if (STInput::get('st_dismiss_skrill_notice')) {

                update_option('st_dismiss_skrill_notice', 1);

            }



        }



        function _add_notices()

        {

            if (get_option('st_dismiss_skrill_notice')) {

                return;

            }



            if (class_exists('STTravelCode')) {

                if (isset(STTravelCode::$plugins_data['Version'])) {

                    $version = STTravelCode::$plugins_data['Version'];

                    if (version_compare('1.3.2', $version, '>')) {

                        $url = admin_url('plugin-install.php?tab=plugin-information&plugin=traveler-code&TB_iframe=true&width=753&height=350');

                        ?>

                        <div class="error settings-error notice is-dismissible">

                            <p class=""><strong><?php _e('Traveler Notice:', 'traveler') ?></strong></p>

                            <p>

                                <?php printf(__('<strong>Skrill</strong> require %s version %s or above. Your current is %s', 'traveler'), '<strong><em>' . __('Traveler Code', 'traveler') . '</em></strong>', '<strong>1.3.2</strong>', '<strong>' . $version . '</strong>'); ?>

                            </p>

                            <p>

                                <a href="http://shinetheme.com/demosd/documentation/how-to-update-the-theme-2/"

                                   target="_blank"><?php _e('Learn how to update it', 'traveler') ?></a>

                                |

                                <a href="<?php echo admin_url('index.php?st_dismiss_payfast_notice=1') ?>"

                                   class="dismiss-notice"

                                   target="_parent"><?php _e('Dismiss this notice', 'traveler') ?></a>

                            </p>

                            <button type="button" class="notice-dismiss"><span

                                        class="screen-reader-text"><?php _e('Dismiss this notice', 'traveler') ?>

                                    .</span></button>

                        </div>

                        <?php

                    }

                }

            }

        }



        function get_option_fields()

        {

            return array(

                array(

                    'id' => 'skrill_email',

                    'label' => __('Email Address', 'traveler'),

                    'type' => 'text',

                    'section' => 'option_pmgateway',

                    'desc' => __('Your Skrill Email Address', 'traveler'),

                    'condition' => 'pm_gway_st_skrill_enable:is(on)'

                ),

                array(

                    'id' => 'skrill_password',

                    'label' => __('Password', 'traveler'),

                    'type' => 'text',

                    'section' => 'option_pmgateway',

                    'desc' => __('Password', 'traveler'),

                    'condition' => 'pm_gway_st_skrill_enable:is(on)'

                ),

                array(

                    'id' => 'skrill_enable_sandbox',

                    'label' => __('Enable Test Mode', 'traveler'),

                    'type' => 'on-off',

                    'section' => 'option_pmgateway',

                    'std' => 'on',

                    'desc' => __('Allow you to enable test mode', 'traveler'),

                    'condition' => 'pm_gway_st_skrill_enable:is(on)'

                ),

            );

        }



        function _pre_checkout_validate()

        {

            return true;

        }



        function do_checkout($order_id)

        {

            if (!$this->is_available()) {

                return

                    [

                        'status' => 0,

                        'complete_purchase' => 0,

                        'error_type' => 'card_validate',

                        'error_fields' => '',

                    ];

            }



            $gateway = $this->_gatewayObject;

            $gateway->setEmail(st()->get_option('skrill_email', ''));

            $gateway->setPassword(st()->get_option('skrill_password', ''));



            if (st()->get_option('skrill_enable_sandbox', 'on') == 'on') {

                $gateway->setTestMode(true);

            }



            $total = get_post_meta($order_id, 'total_price', true);

            $total = round((float)$total, 2);

            $order_token_code = get_post_meta($order_id, 'order_token_code', true);



            $purchase = [

                'language' => 'EN',

                'amount' => number_format((float)$total, 2, '.', ''),

                'currency' => TravelHelper::get_current_currency('name'),

                'details' => ['item' => get_the_title($order_id)],

                'notifyUrl' => $this->get_return_url($order_id),

                'returnUrl' => $this->get_return_url($order_id),

                'cancelUrl' => $this->get_cancel_url($order_id)

            ];



            $response = $gateway->purchase($purchase)->send();

            if ($response->isSuccessful()) {

                return ['status' => true];

            } elseif ($response->isRedirect()) {

                return ['status' => true, 'redirect' => $response->getRedirectUrl()];

            } else {

                return array('status' => false, 'message' => $response->getMessage(), 'data' => $purchase);

            }

        }



        function complete_purchase($order_id)

        {

            return true;

        }





        function check_complete_purchase($order_id)

        {

            $gateway = $this->_gatewayObject;

            $gateway->setEmail(st()->get_option('skrill_email', ''));

            $gateway->setPassword(st()->get_option('skrill_password', ''));



            if (st()->get_option('skrill_enable_sandbox', 'on') == 'on') {

                $gateway->setTestMode(true);

            }



            $total = get_post_meta($order_id, 'total_price', true);

            $total = round((float)$total, 2);

            $order_token_code = get_post_meta($order_id, 'order_token_code', true);



            $response = $gateway->completePurchase([

                'language' => 'EN',

                'amount' => number_format((float)$total, 2, '.', ''),

                'currency' => TravelHelper::get_current_currency('name'),

                'details' => ['item' => get_the_title($order_id)],

                'notifyUrl' => $this->get_return_url($order_id),

                'returnUrl' => $this->get_return_url($order_id),

                'cancelUrl' => $this->get_cancel_url($order_id)

            ])->send();



            if ($response->isSuccessful()) {

                return ['status' => true];

            } elseif ($response->isRedirect()) {

                return array('status' => false, 'redirect_url' => $response->getRedirectUrl(), 'func' => 'check_completePurchase');

            } else {

                return array('status' => false, 'message' => $response->getMessage());

            }

        }



        function html()

        {

            echo st()->load_template('gateways/skrill');

        }



        function get_name()

        {

            return __('Skrill', 'traveler');

        }



        function get_default_status()

        {

            return $this->default_status;

        }



        function is_available($item_id = false)

        {

            if (st()->get_option('pm_gway_st_skrill_enable') == 'off') {

                return false;

            } else {

                if (!st()->get_option('skrill_email')) {

                    return false;

                }

                if (!st()->get_option('skrill_password')) {

                    return false;

                }

            }



            if ($item_id) {

                $meta = get_post_meta($item_id, 'is_meta_payment_gateway_st_skrill', true);

                if ($meta == 'off') {

                    return false;

                }

            }



            return true;

        }



        function getGatewayId()

        {

            return $this->_gateway_id;

        }



        function is_check_complete_required()

        {

            return true;

        }



        function get_logo()

        {

            return get_template_directory_uri() . '/img/gateway/skrill-logo.svg';

        }



        static function instance()

        {

            if (!self::$_ints) {

                self::$_ints = new self();

            }



            return self::$_ints;

        }



        static function add_payment($payment)

        {

            $payment['st_skrill'] = self::instance();



            return $payment;

        }

    }



    add_filter('st_payment_gateways', array('ST_Skrill_Payment_Gateway', 'add_payment'));

}