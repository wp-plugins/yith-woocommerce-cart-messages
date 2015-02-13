<?php
/**
 * Created by PhpStorm.
 * User: Your Inspiration
 * Date: 20/01/2015
 * Time: 12:04
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

return array(
    'label'    => __( 'Message Settings', 'ywcm' ),
    'pages'    => 'ywcm_message', //or array( 'post-type1', 'post-type2')
    'context'  => 'normal', //('normal', 'advanced', or 'side')
    'priority' => 'default',
    'tabs'     => array(
        'settings' => array(
            'label'  => __( 'Settings', 'ywcm' ),
            'fields' => apply_filters( 'ywcm_message_metabox', array(
                    'ywcm_message_type' => array(
                        'label' => __( 'Message Type', 'ywcm' ),
                        'desc'  => __( 'Choose the type of the message', 'ywcm' ),
                        'type'  => 'select',
                        'options' => YWCM_Cart_Message()->get_types(),
                        'std'   => 'minimum_amount' ),


                    /* Products in Cart ____________________________________________________________________________*/

                    'ywcm_message_products_cart_text'       => array(
                        'label' => __( 'Message', 'ywcm' ),
                        'desc'  => __( 'You can edit the text using the following placeholder: <br>
{remaining_amount} indicates the remaining amount to reach the minimum order amount;<br>
{products} specifies which of the listed product is in the cart;<br>
{required_quantity} states the exact number of product to purchase.', 'ywcm' ),
                        'type'  => 'textarea',
                        'std'   => 'To benefit from free shipping, add <strong>{remaining_quantity}</strong> quantity more of <strong>{products}</strong>!',
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'products_cart'
                        )
                    ),

                    'ywcm_message_products_cart_minimum'    => array(
                        'label' => __( 'Required quantity', 'ywcm' ),
                        'desc'  => __( 'The minimum total amount of above selected products.', 'ywcm' ),
                        'type'  => 'text',
                        'std'   => '',
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'products_cart'
                        )
                    ),

                    'ywcm_products_cart_threshold_quantity' => array(
                        'label' => __( 'Threshold amount', 'ywcm' ),
                        'desc'  => __( 'The minimum total amount of above selected products.', 'ywcm' ),
                        'type'  => 'text',
                        'std'   => '',
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'products_cart'
                        )
                    ),


                    'ywcm_products_cart_products'   => array(
                        'label' => __( 'Select products', 'ywcm' ),
                        'desc'  => '',
                        'type'  => 'ajax-products',
                        'multiple' => true,
                        'options'  => array(),
                        'std'      => array(),
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'products_cart'
                        )
                    ),


                    /* Category in Cart  ___________________________________________________________________________*/
                    'ywcm_message_categories_cart_text'     => array(
                        'label' => __( 'Message', 'ywcm' ),
                        'desc'  => __( 'You can edit the message using <br>{categories} to state the list of categories.', 'ywcm' ),
                        'type'  => 'textarea',
                        'std'   => 'Do you like <strong>{categories}</strong>? Discovery our outlet!',
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'categories_cart'
                        )
                    ),


                    'ywcm_message_category_cart_categories' => array(
                        'label' => __( 'Select categories', 'ywcm' ),
                        'desc'  => '',
                        'type'     => 'chosen',
                        'multiple' => true,
                        'options'  => ywcm_get_shop_categories(false),
                        'std'      => array(),
                        'deps'  => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'categories_cart'
                        )
                    ),



                    /* Simple message ____________________________________________________________________________*/
                    'ywcm_message_simple_message_text' => array(
                        'label' => __( 'Message', 'ywcm' ),
                        'desc'  => __( 'Edit the message', 'ywcm' ),
                        'type'  => 'textarea',
                        'std'   => '',
                        'deps'     => array(
                            'ids'    => '_ywcm_message_type',
                            'values' => 'simple_message'
                        )
                    ),



                    /* Common options  ____________________________________________________________________________*/
                    'ywcm_message_button' => array(
                        'label' => __( 'Button Text (optional)', 'ywcm' ),
                        'desc'  => __( 'The text of the button for the action call. Leave it empty if you do not want to show it.', 'ywcm' ),
                        'type'  => 'text',
                        'std'   => '' ),

                    'ywcm_message_button_url' => array(
                        'label' => __( 'Button URL (optional)', 'ywcm' ),
                        'desc'  => __( 'The URL of the button of the call to action', 'ywcm' ),
                        'type'  => 'text',
                        'std'   => '' ),

                    'ywcm_message_expire' => array(
                        'label' => __( 'Expire date (optional)', 'ywcm' ),
                        'desc'  => __( 'Choose a date until this message will appear', 'ywcm' ),
                        'type'  => 'datepicker',
                        'std'   => '' ),


                )
            )
        )
    )
);