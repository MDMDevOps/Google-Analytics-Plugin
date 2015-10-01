<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.midwestdigitalmarketing.com
 * @since      1.0.0
 *
 * @package    Mpress_Analytics
 * @subpackage Mpress_Analytics/admin/partials
 */
?>
<div class="wrap">
    <form method="post" action="options.php">
        <?php wp_nonce_field( 'update-options' ); ?>
        <?php settings_fields( $this->settings_key ); ?>
        <?php do_settings_sections( $this->settings_key ); ?>
        <?php submit_button(); ?>
    </form>
    <iframe width="100%" height="166" scrolling="no" frameborder="no" style="max-width: 720px;" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/187671035&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
</div>

