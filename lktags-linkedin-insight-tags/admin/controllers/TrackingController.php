<?php

namespace Pagup\Lktags\Controllers;

use Pagup\Lktags\Core\Option;
class TrackingController {
    public function __construct() {
        add_action( 'wp_head', array(&$this, 'linkedin_pixel') );
    }

    public function linkedin_pixel() {
        if ( Option::check( 'enable_lktags' ) && Option::check( 'lktags_id' ) ) {
            if ( class_exists( 'woocommerce' ) ) {
                if ( !is_singular( 'product' ) && !is_cart() && !is_checkout() ) {
                    echo $this->linkedin( Option::get( 'lktags_id' ) ) . "\n";
                }
            } else {
                echo $this->linkedin( Option::get( 'lktags_id' ) ) . "\n";
            }
        }
        if ( lktags_fs()->can_use_premium_code__premium_only() && Option::check( 'lktags_id' ) ) {
            echo $this->linkedin_event();
        }
    }

    private function normalize_partner_id( $tag ) {
        $tag = html_entity_decode( (string) $tag, ENT_QUOTES, 'UTF-8' );

        if ( preg_match( '/^\s*(\d+)\s*$/', $tag, $matches ) ) {
            return $matches[1];
        }

        if ( preg_match( '/_linkedin_partner_id\s*=\s*[\'"]?(\d+)[\'"]?/i', $tag, $matches ) ) {
            return $matches[1];
        }

        if ( preg_match( '/[?&]pid=(\d+)/i', $tag, $matches ) ) {
            return $matches[1];
        }

        return '';
    }

    protected function linkedin( $tag ) {
        $partner_id = $this->normalize_partner_id( $tag );

        if ( '' === $partner_id ) {
            return '';
        }

        $collect_url = add_query_arg(
            array(
                'pid' => $partner_id,
                'fmt' => 'gif',
            ),
            'https://dc.ads.linkedin.com/collect/'
        );

        return "<!-- LinkedIn Insight Base Code --><script type='text/javascript'>_linkedin_partner_id = '" . esc_js( $partner_id ) . "';window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];window._linkedin_data_partner_ids.push(_linkedin_partner_id);</script><script type='text/javascript'>(function(l){if(!l){window.lintrk=function(a,b){window.lintrk.q.push([a,b])};window.lintrk.q=[]}var s=document.getElementsByTagName('script')[0];var b=document.createElement('script');b.type='text/javascript';b.async=true;b.src='https://snap.licdn.com/li.lms-analytics/insight.min.js';s.parentNode.insertBefore(b,s)})(window.lintrk);</script><noscript><img height='1' width='1' style='display:none;' alt='' src='" . esc_url( $collect_url ) . "' /></noscript><!-- End LinkedIn Insight Base Code -->";
    }

    protected function linkedin_event() {
        return;
    }

}

$TrackingControllers = new TrackingController();
