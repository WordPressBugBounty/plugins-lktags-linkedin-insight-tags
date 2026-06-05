=== Add LinkedIn Insight Tag for LinkedIn Ads ===
Contributors: the-rock, pagup, freemius
Tags: linkedin insight tag, linkedin advertising, linkedin ads, linkedin tag, linkedin conversion tracking
Requires at least: 4.1
Requires PHP: 5.6
Tested up to: 7.0
Stable tag: 1.2.9
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add the LinkedIn Insight Tag to WordPress without editing code. Paste your Partner ID, enable the tag, and keep B2B tracking simple.

== Description ==

Install the LinkedIn Insight Tag on WordPress in minutes, without editing theme files, touching header templates, or maintaining custom JavaScript.

This plugin is built for B2B websites, consultants, agencies, marketing teams, and WordPress site owners who want a simple way to add the LinkedIn Insight Tag from the WordPress admin.

Paste your LinkedIn Partner ID, enable the tag, save your settings, clear your cache, and verify the result in LinkedIn Campaign Manager.

The LinkedIn Insight Tag helps you measure website activity from LinkedIn campaigns, support conversion tracking, and build matched audiences in LinkedIn Campaign Manager.

This plugin does not replace LinkedIn Campaign Manager. It gives you a focused WordPress interface for placing the tag safely and predictably.

This plugin is an independent WordPress tool. It is not affiliated with, endorsed by, or sponsored by LinkedIn.

= Why use a plugin for this? =

LinkedIn provides a JavaScript snippet, but many WordPress users do not want to edit theme files, paste code into headers, or risk losing tracking after a theme change.

This plugin keeps the setup inside WordPress settings, so the LinkedIn Insight Tag is easier to manage and easier to verify.

It is useful for:

* B2B websites running LinkedIn Ads.
* Agencies setting up tracking for client sites.
* Consultants generating leads from LinkedIn.
* Corporate websites that need LinkedIn conversion tracking.
* WordPress users who do not want to edit code.
* Marketing teams that want a simple, repeatable setup.

= What the free version does =

The free version focuses on the base LinkedIn Insight Tag setup:

* Add your LinkedIn Partner ID from the WordPress admin.
* Inject the base LinkedIn Insight Tag without editing your theme.
* Keep the setup in one WordPress settings screen.
* Accept a numeric Partner ID directly.
* Help extract the Partner ID if you paste the full LinkedIn Insight Tag code.
* Provide guidance for verifying the tag in LinkedIn Campaign Manager.
* Preserve settings unless you choose to remove them on deactivation.

The free version is designed for a simple base tag setup on regular public pages.

WooCommerce product, cart, checkout, purchase confirmation, and conversion ID support are handled by the premium version.

= Premium features =

The premium version is connected through Freemius and focuses on WooCommerce conversion tracking, custom event placement, and local setup diagnostics.

Premium features include:

* LinkedIn Tag Health and B2B Readiness panel in the plugin settings.
* Local checks for Partner ID, base tag activation, WooCommerce coverage, custom event placement, and WordPress visibility.
* LinkedIn Insight Tag support on WooCommerce product, cart, checkout, and purchase confirmation pages.
* Optional LinkedIn conversion ID fields for WooCommerce product view, cart, checkout, and purchase confirmation steps.
* Custom LinkedIn event code placement through a post, page, or product metabox.
* Premium updates and licensing through Freemius.

Before upgrading, review the plan shown in the Freemius checkout. Premium availability, licensing, trial terms, renewals, account management, and billing are handled through Freemius.

= B2B and machine-readable site readiness =

Many users install the LinkedIn Insight Tag because their B2B website needs to be measurable.

Measurement is one layer. Your site should also be technically clear for search engines, crawlers, and modern discovery systems.

After installing your LinkedIn Insight Tag, you can also review your robots.txt, sitemap, and AI crawler rules with Better Robots.txt or run a free audit on better-robots.com.

This plugin does not promise AI rankings, AI citations, or better ad performance.

It helps with LinkedIn tracking setup. Better Robots.txt and the audit are separate tools for checking the machine-readable layer of your WordPress site.

= What this plugin does not do =

This plugin does not:

* Create or manage LinkedIn campaigns.
* Replace LinkedIn Campaign Manager.
* Guarantee that LinkedIn will immediately mark the tag as active.
* Create LinkedIn conversion actions automatically.
* Manage cookie consent or legal compliance for you.
* Promise better rankings, AI citations, or ad performance.
* Replace a consent management platform, analytics strategy, or legal review.

You remain responsible for LinkedIn campaign setup, conversion rules, privacy notices, cookie consent, and legal compliance for your jurisdiction and audience.

= Important setup note =

After saving your Partner ID, clear your cache if your site uses a caching plugin, server cache, CDN cache, or optimization plugin.

Then verify your domain and tag status in LinkedIn Campaign Manager.

LinkedIn may need real site traffic before it confirms that the tag is active.

== Installation ==

= Install from WordPress =

1. Go to `Plugins > Add New`.
2. Search for `LinkedIn Insight Tag`.
3. Install and activate `Lktags - Linkedin Insight Tags`.
4. Go to `Settings > Linkedin Insight Tag`.
5. Paste your LinkedIn Partner ID.
6. Enable the tag and save.
7. Clear your cache.
8. Verify the tag in LinkedIn Campaign Manager.

= Install manually =

1. Upload the plugin folder to `/wp-content/plugins/lktags-linkedin-insight-tags`.
2. Activate `Lktags - Linkedin Insight Tags` from the WordPress Plugins screen.
3. Go to `Settings > Linkedin Insight Tag`.
4. Paste your LinkedIn Partner ID.
5. Enable the tag and save.
6. Clear your cache.
7. Verify the tag in LinkedIn Campaign Manager.

== Frequently Asked Questions ==

= Where do I find my LinkedIn Partner ID? =

Open LinkedIn Campaign Manager, go to Account Assets, then Insight Tag. Your Partner ID is the numeric ID used by the LinkedIn Insight Tag.

= Can I paste the full LinkedIn Insight Tag code? =

The plugin is designed for the numeric Partner ID.

If you paste the full LinkedIn Insight Tag code, version 1.2.8 tries to extract the Partner ID from the script. You should still verify the saved ID before enabling the tag.

= Do I need to edit my theme files? =

No. The plugin is designed to avoid manual theme editing.

= Will the tag stay active if I change themes? =

The plugin stores the Partner ID in WordPress settings and injects the base tag from the plugin. This helps keep the setup separate from your theme.

You should still verify the tag after major theme, cache, CDN, or optimization changes.

= Does the plugin create my LinkedIn campaigns? =

No. Campaigns, audiences, and conversion rules are managed in LinkedIn Campaign Manager.

= Does the plugin validate my tag inside LinkedIn Campaign Manager? =

No. The plugin can check local WordPress-side setup details, especially in the premium version, but LinkedIn Campaign Manager is still the authority for confirming tag activity.

= Why does LinkedIn not show the tag as active immediately? =

LinkedIn may need real site traffic before confirming that the tag is active.

You may also need to clear cache layers, disable optimization conflicts, visit a public page, or wait for LinkedIn Campaign Manager to update its status.

= Does this plugin handle cookie consent? =

No. You remain responsible for consent, privacy notices, and compliance requirements for your jurisdiction and audience.

If your site requires consent before loading marketing tags, configure your consent system accordingly.

= Does the free version support WooCommerce conversion tracking? =

No. The free version focuses on the base LinkedIn Insight Tag.

WooCommerce product, cart, checkout, purchase confirmation, and conversion ID support are part of the premium version.

= What does the premium Tag Health and B2B Readiness panel check? =

The premium panel performs local WordPress-side checks for Partner ID, base tag activation, WooCommerce coverage, WooCommerce conversion IDs, custom event placement, and WordPress visibility.

It does not perform external LinkedIn Campaign Manager validation.

= Does Premium create LinkedIn conversion IDs for WooCommerce automatically? =

No. Create each conversion action in LinkedIn Campaign Manager, then paste the matching numeric conversion ID into the plugin.

These conversion IDs are not your base Partner ID.

If you only track purchases, fill only the purchase field. If you use several WooCommerce steps, each step should normally use its own LinkedIn conversion ID so reporting stays clear.

= Do I need a different conversion ID for each WooCommerce step? =

Usually, yes.

A product view, cart visit, checkout start, and purchase confirmation are different conversion actions.

You can leave unused fields empty. Reusing the same conversion ID in several fields is technically possible, but it will report those steps as the same LinkedIn conversion.

= Can I add a custom LinkedIn event to a specific page? =

The premium version includes a metabox for custom LinkedIn event code placement on posts, pages, or products.

This is intended for conversion tracking scenarios where a specific page needs an event code.

Only paste event code generated by LinkedIn Campaign Manager or code you understand and trust.

= Does Better Robots.txt improve LinkedIn Ads tracking? =

No. Better Robots.txt is a separate plugin for robots.txt and crawler-related configuration.

It is offered as a next-step audit for B2B sites that want clearer machine-readable signals.

= Does this plugin improve AI visibility? =

No direct claim is made.

This plugin installs the LinkedIn Insight Tag. AI visibility and crawler governance should be evaluated separately through your site structure, robots.txt, sitemap, content, structured data, and machine-readable signals.

== Screenshots ==

1. LinkedIn Insight Tag settings page.
2. Partner ID field and enable switch.
3. Free version with premium Tag Health and B2B Readiness teaser.
4. Premium Tag Health and B2B Readiness panel.
5. Premium WooCommerce conversion ID fields and custom event options.

== Changelog ==

= 1.2.9 =
* Updated the bundled Freemius SDK to version 2.13.1 for security and compatibility.
* Improved LinkedIn Partner ID handling.
* Improved frontend output escaping for the base LinkedIn Insight Tag.
* Scoped admin assets to the plugin settings page only.
* Removed unnecessary external font loading from the WordPress admin.
* Removed legacy cross-promotion from the Freemius opt-in message.
* Clarified Free versus Premium features.
* Clarified WooCommerce coverage between Free and Premium.
* Added a premium local Tag Health and B2B Readiness diagnostic panel.
* Added a locked Tag Health and B2B Readiness teaser in the free version.
* Added premium WooCommerce conversion ID fields for product, cart, checkout, and purchase confirmation steps.
* Clarified Better Robots.txt and AI visibility messaging without making ranking or citation claims.

Older changelog entries are kept in `changelog.txt`.

== Upgrade Notice ==

= 1.2.9 =
Improves Partner ID handling, admin hygiene, setup guidance, and Free/Premium positioning. Premium users also get local Tag Health and B2B Readiness checks plus WooCommerce conversion ID fields.