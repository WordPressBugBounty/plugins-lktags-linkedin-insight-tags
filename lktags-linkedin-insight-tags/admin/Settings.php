<?php
namespace Pagup\Lktags;
use Pagup\Lktags\Core\Asset;

class Settings {

    public function __construct()
    {

        $settings = new \Pagup\Lktags\Controllers\SettingsController;
        $metabox = new \Pagup\Lktags\Controllers\MetaboxController;

        // Add settings page
        add_action( 'admin_menu', array( &$settings, 'add_settings' ) );

        // Add metabox to post-types
        add_action( 'add_meta_boxes', array(&$metabox, 'add_metabox') );

        // Save meta data
        add_action( 'save_post', array(&$metabox, 'metadata'));

        // Add setting link to plugin page
        $plugin_base = LKTAGS_PLUGIN_BASE;
        add_filter( "plugin_action_links_{$plugin_base}", array( &$this, 'setting_link' ) );

        // Add the Pagup ecosystem row meta link on the plugins screen
        add_filter( 'plugin_row_meta', array( &$this, 'agent_control_row_meta' ), 10, 2 );

        // Add styles and scripts
        add_action( 'admin_enqueue_scripts', array( &$this, 'assets') );

    }

    public function setting_link( $links ) {

        array_unshift( $links, '<a href="options-general.php?page=lktags">Settings</a>' );

        return $links;
    }

    /**
     * Ajoute un lien de decouverte de l ecosysteme Pagup sous la ligne du plugin.
     *
     * Destination interne si Agent Control est installe, sinon la page produit du site, dans la
     * locale du site d administration. Conforme au contrat de liens : hote canonique unique,
     * aucun parametre de requete externe, aucun identifiant.
     *
     * @param array  $links Liens existants de la ligne.
     * @param string $file  Fichier du plugin traite par le filtre.
     * @return array
     */
    public function agent_control_row_meta( $links, $file ) {

        if ( LKTAGS_PLUGIN_BASE !== $file ) {
            return $links;
        }

        $active = defined( 'PAC_VERSION' ) || class_exists( '\\Pagup\\AgentControl\\Plugin', false );

        if ( $active ) {
            $url = admin_url( 'admin.php?page=pagup-agent-control' );
            $attributes = '';
        } else {
            $locale = function_exists( 'determine_locale' ) ? determine_locale() : get_locale();
            $map = array(
                'fr_FR' => '/fr/produit/',
                'fr_CA' => '/fr/produit/',
                'de_DE' => '/de/produkt/',
                'es_ES' => '/es/producto/',
                'it_IT' => '/it/prodotto/',
                'nl_NL' => '/nl/product/',
                'pt_BR' => '/pt-br/produto/',
                'pt_PT' => '/pt-br/produto/',
            );
            $path = isset( $map[ $locale ] ) ? $map[ $locale ] : '/product/';
            $url = 'https://wpagentcontrol.com' . $path;
            $attributes = ' target="_blank" rel="noopener noreferrer"';
        }

        $label = sprintf(
            /* translators: 1: Pagup ecosystem label, 2: product name. */
            __( '%1$s · %2$s', 'lktags-linkedin-insight-tags' ),
            __( 'Part of the Pagup ecosystem', 'lktags-linkedin-insight-tags' ),
            __( 'Agent Control', 'lktags-linkedin-insight-tags' )
        );

        $links[] = sprintf(
            '<a href="%1$s"%2$s>%3$s</a>',
            esc_url( $url ),
            $attributes,
            esc_html( $label )
        );

        return $links;
    }

    public function assets( $hook ) {

        if ( 'settings_page_lktags' !== $hook ) {
            return;
        }

        Asset::style('lktags_styles', 'app.css');
        Asset::script('lktags_script', 'app.js');
    
    }
}

$settings = new Settings;
