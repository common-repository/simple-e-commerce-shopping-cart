<?php

/**
 * WP_NONCE handling class
 * @since 3.1.2
 * @author Naim-Ul-Hassan
 */
class SimpleEcommNonce
{
    public static string $ajax_nonce = "ajax_nonce";
    public static string $tax_save_nonce = "save_tax";
    public static string $shipping_save_nonce = "save_shipping";
    public static string $settings_save_nonce = "save_settings";
    public static string $reports_nonce = "save_reports";
    public static string $promotions_save_nonce = "save_promotions";
    public static string $products_save_nonce = "save_products";
    public static string $orders_save_nonce = "save_orders";
    public static string $inventory_save_nonce = "save_inventory";
    public static string $category_save_nonce = "category_save_nonce";
    public static string $general_sales_nonce = "general_sales_nonce";
    public static string $individual_product_sales_nonce = "individual_product_sales_nonce";
    public static string $monthy_sales_report_nonce = "monthy_sales_report_nonce";
    public static string $daily_sales_report_nonce = "daily_sales_report_nonce";
    public static string $promotion_use_coupon_nonce = "promotion_use_coupon_nonce";


    /**
     * add nonce field in any form
     * @param string $nonce_name
     * @return void
     */
    public static function nonce_field(string $nonce_name): void
    {
        wp_nonce_field( $nonce_name );
    }

    /**
     * verify given nonce and if failed print notice
     * @param string $nonce_name
     * @return void
     */
    public static function verify_admin_nonce(string $nonce_name): void
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            if ( ! isset($_GET['_wpnonce']) || ! wp_verify_nonce( $_GET['_wpnonce'], $nonce_name ) )
            {
                SimpleEcommAdminLog::error(SimpleEcommErrorMessage::NONCE_ERROR());
                wp_die();
            }
        }
        else if($_SERVER["REQUEST_METHOD"] == "POST"){
            if ( ! isset($_POST['_wpnonce']) || ! wp_verify_nonce( $_POST['_wpnonce'], $nonce_name ) )
            {
                SimpleEcommAdminLog::error(SimpleEcommErrorMessage::NONCE_ERROR());
                wp_die();
            }
        }
    }

    /**
     * verify given nonce and if failed show error
     * @param string $nonce_name
     * @return void
     */
    public static function verify_nonce(string $nonce_name): void
    {
        if ( ! isset($_REQUEST['_wpnonce']) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], $nonce_name ) )
        {
            wp_die(SimpleEcommErrorMessage::NONCE_ERROR());
        }
    }

    /**
     * verify given nonce and if failed show error
     * @param string $nonce_name
     * @return void
     */
    public static function verify_ajax_nonce(string $nonce_name, string $error = "SimpleEcommCartErrorModal", string $nonce_field = "nonce"): void
    {
        if ( ! isset($_REQUEST[$nonce_field]) || ! wp_verify_nonce( $_REQUEST[$nonce_field], $nonce_name ) )
        {
            $result[0] = $error;
            $result[1] = SimpleEcommErrorMessage::NONCE_ERROR();

            $out = json_encode($result);
            echo $out;
            die();
        }
    }

    public static function verify_ajax_nonce_send_json_error(string $nonce_name, string $nonce_field = "nonce"): void
    {
        if ( ! isset($_REQUEST[$nonce_field]) || ! wp_verify_nonce( $_REQUEST[$nonce_field], $nonce_name ) )
        {
            $result['message'] = SimpleEcommErrorMessage::NONCE_ERROR();
            wp_send_json_error($result, 401);
            die();
        }
    }

    public static function create_nonce($nonce_name): string
    {
        return wp_create_nonce( $nonce_name );
    }
}