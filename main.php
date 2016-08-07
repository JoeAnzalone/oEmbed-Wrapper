<?php
/*
Plugin Name: oEmbed Wrapper
Plugin URI: https://github.com/JoeAnzalone/oEmbed-Wrapper
Description: Wraps automatic oEmbeds with a div that includes a data-host attribute
Version: 0.0.1
Author: Joe Anzalone
Author URI: http://JoeAnzalone.com
License: GPL2
*/

class oEmbedWrapper {
    function __construct() {
        $this->add_filters();
    }

    function add_filters() {
        add_filter('embed_oembed_html', [$this,'filter_embed_oembed_html'], null, 2);
    }

    function filter_embed_oembed_html($html, $url) {
        $host = parse_url($url, PHP_URL_HOST);
        $html = '<div class="oembed" data-host="' . $host . '">' . $html . '</div>';
        return $html;
    }
}

new oEmbedWrapper();
