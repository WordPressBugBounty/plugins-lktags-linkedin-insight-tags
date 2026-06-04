<?php
$ai_visibility_url = 'https://better-robots.com/linkedin-b2b-ai-visibility/';
$ai_audit_url = 'https://better-robots.com/check';
?>

<div class="lktags-sidebar">

    <div class="box">
        <h2><?php echo esc_html__( 'LinkedIn traffic is measurable. Is your B2B site AI-ready?', $text_domain ); ?></h2>
        <p><?php echo esc_html__( 'You installed the LinkedIn Insight Tag to measure B2B visitors. Now check whether your robots.txt, sitemap, and AI crawler rules are clear enough for modern discovery systems.', $text_domain ); ?></p>
        <p>
            <a href="<?php echo esc_url( $ai_visibility_url ); ?>" target="_blank" rel="noopener noreferrer" class="lktags-btn"><?php echo esc_html__( 'Read the AI visibility guide', $text_domain ); ?></a>
        </p>
        <p>
            <a href="<?php echo esc_url( $ai_audit_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html__( 'Run the free AI crawl audit', $text_domain ); ?></a>
        </p>
    </div>

    <div class="box">
        <h2><?php echo esc_html__( 'Need conversion tracking on WooCommerce?', $text_domain ); ?></h2>
        <p><?php echo esc_html__( 'The premium version adds WooCommerce product, cart, checkout, and purchase confirmation coverage, plus LinkedIn conversion ID fields and custom event placement through the page metabox.', $text_domain ); ?></p>
        <p><a href="<?php echo esc_url( admin_url( 'options-general.php?page=lktags-pricing' ) ); ?>" class="lktags-btn"><?php echo esc_html__( 'View Pro options', $text_domain ); ?></a></p>
    </div>

    <div class="box">
        <h2><?php echo esc_html__( 'How to verify the tag', $text_domain ); ?></h2>
        <p><?php echo esc_html__( 'After saving your Partner ID, clear your cache and verify the domain in LinkedIn Campaign Manager. LinkedIn may need real traffic before showing the tag as active.', $text_domain ); ?></p>
    </div>

</div>
