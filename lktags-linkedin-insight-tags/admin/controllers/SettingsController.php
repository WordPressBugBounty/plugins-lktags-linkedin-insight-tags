<?php

namespace Pagup\Lktags\Controllers;

use Pagup\Lktags\Core\Option;
use Pagup\Lktags\Core\Plugin;
use Pagup\Lktags\Core\Request;
class SettingsController {
    private $partner_id_error = '';

    private function extract_partner_id( $raw_input ) {
        $raw_input = (string) $raw_input;
        $decoded_input = html_entity_decode( $raw_input, ENT_QUOTES, 'UTF-8' );

        if ( preg_match( '/^\s*(\d+)\s*$/', $decoded_input, $matches ) ) {
            return $matches[1];
        }

        if ( preg_match( '/_linkedin_partner_id\s*=\s*[\'"]?(\d+)[\'"]?/i', $decoded_input, $matches ) ) {
            return $matches[1];
        }

        if ( preg_match( '/[?&]pid=(\d+)/i', $decoded_input, $matches ) ) {
            return $matches[1];
        }

        return '';
    }

    private function sanitize_partner_id() {
        if ( !isset( $_POST['lktags_id'] ) ) {
            return '';
        }

        $raw_input = wp_unslash( $_POST['lktags_id'] );

        if ( '' === trim( (string) $raw_input ) ) {
            return '';
        }

        $partner_id = $this->extract_partner_id( $raw_input );

        if ( '' !== $partner_id ) {
            return $partner_id;
        }

        $this->partner_id_error = __( 'The LinkedIn Partner ID could not be extracted. Other settings were saved, but the previous Partner ID was kept. Enter only the numeric Partner ID or paste the official LinkedIn Insight Tag code.', Plugin::domain() );

        return Option::check( 'lktags_id' ) ? Option::get( 'lktags_id' ) : '';
    }

    public function add_settings() {
        add_options_page(
            'Linkedin Insight Tags Settings',
            'Linkedin Insight Tag',
            'manage_options',
            'lktags',
            array(&$this, 'page')
        );
    }

    public function page() {
        $safe = [
            "lktags_event_yes",
            "lktags_event_no",
            "enable_lktags",
            "lktags_woo",
            "lktags-bigta",
            "lktags-mobilook",
            "lktags-vidseo",
            "boost-alt",
            "boost-robot",
            'lktags-settings',
            'lktags-faq',
            "lktags_remove_settings"
        ];
        $success = '';
        if ( isset( $_POST['update'] ) ) {
            if ( function_exists( 'current_user_can' ) && !current_user_can( 'manage_options' ) ) {
                die( 'Sorry, not allowed...' );
            }
            check_admin_referer( 'lktags__settings', 'lktags__nonce' );
            if ( !isset( $_POST['lktags__nonce'] ) || !wp_verify_nonce( $_POST['lktags__nonce'], 'lktags__settings' ) ) {
                die( 'Sorry, not allowed. Nonce doesn\'t verify' );
            }
            $options = [
                'enable_lktags'          => Request::post( 'enable_lktags', $safe ),
                'lktags_id'              => $this->sanitize_partner_id(),
                'lktags_woo'             => Request::post( 'lktags_woo', $safe ),
                'lktags_remove_settings' => Request::post( 'lktags_remove_settings', $safe ),
                'boost-robot'            => Request::post( 'boost-robot', $safe ),
                'boost-alt'              => Request::post( 'boost-alt', $safe ),
                'lktags-mobilook'        => Request::post( 'lktags-mobilook', $safe ),
                'lktags-bigta'           => Request::post( 'lktags-bigta', $safe ),
                'lktags-vidseo'          => Request::post( 'lktags-vidseo', $safe ),
            ];
            update_option( 'lktags', $options );
            // update options
            echo '<div class="notice lktags-notice notice-success is-dismissible"><p><strong>' . esc_html__( 'Settings saved.', 'lktags-linkedin-insight-tags' ) . '</strong></p></div>';
            if ( '' !== $this->partner_id_error ) {
                echo '<div class="notice lktags-notice notice-warning is-dismissible"><p><strong>' . esc_html( $this->partner_id_error ) . '</strong></p></div>';
            }
        }
        $options = new Option();
        $text_domain = Plugin::domain();
        $notification = new \Pagup\Lktags\Controllers\NotificationController();
        echo $notification->support();
        //set active class for navigation tabs
        $active_tab = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $safe ) ? sanitize_key( $_GET['tab'] ) : 'lktags-settings' );
        //Plugin::dd($_POST);
        //var_dump(Option::all());
        // purchase notification
        $purchase_url = "options-general.php?page=lktags-pricing";
        $get_pro = sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', $text_domain ), array(
            'a' => array(
                'href'   => array(),
                'target' => array(),
            ),
        ) ), esc_url( $purchase_url ) );
        // Return Views
        if ( $active_tab == 'lktags-settings' ) {
            return Plugin::view( 'settings', compact(
                'active_tab',
                'options',
                'text_domain',
                'get_pro',
                'success'
            ) );
        }
        if ( $active_tab == 'lktags-faq' ) {
            return Plugin::view( "faq", compact( 'active_tab', 'text_domain' ) );
        }
    }

}

$settings = new SettingsController();
