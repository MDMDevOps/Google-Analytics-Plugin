
<?php $field = $this->settings_key . '[' . esc_attr( $args['key'] ) . ']'; ?>

<?php if( $args['type'] === 'radio' ) {
    $options = isset( $args['options'] ) ? $args['options'] : null;

    if( $options ) {
        foreach( $options as $index => $option ) {
            $checked = ( $args['value'] == $index ) ? ' checked' : null; ?>
            <label for="<?php echo $field . '[value]'; ?>" class="mpress-radio-label"><input data-target="<?php echo $index; ?>" name="<?php echo $field . '[value]'; ?>" type="radio" value="<?php echo $index; ?>" class="tog mpress-analytics-tog"<?php echo $checked; ?>>&nbsp;<?php echo $option; ?></label>
       <?php } ?>
        <p class="description margin-top">For standard tracking, choose <em>"standard"</em> and paste in <strong>UA-CODE</strong> below.</p>
        <p class="description"> For other tracking options, choose <em>"custom"</em> and paste <strong>tracking script</strong> below</p>
       <?php
    } // endif
}

elseif( $args['type'] == 'text' ) { ?>
    <input data-selector="<?php echo $args['selector']; ?>" id="<?php echo esc_attr( $args['field_id'] ); ?>" type="text" class="regular-text" name="<?php echo $field . '[value]'; ?>" value="<?php echo esc_attr( $args['value'] ); ?>" placeholder="<?php echo esc_attr( $args['label'] ); ?>">
    <p class="description">Paste your <a href="https://support.google.com/analytics/answer/1032385?hl=en" target="_blank">UA-CODE</a> from google analytics</p>
<?php }


elseif( $args['type'] == 'textarea' ) { ?>
    <textarea data-selector="<?php echo $args['selector']; ?>" id="<?php echo esc_attr( $args['field_id'] ); ?>" name="<?php echo $field . '[value]'; ?>" rows="5" cols="50"><?php echo esc_attr( $args['value'] ); ?></textarea>
    <p class="description">Paste your <em>entire</em> tracking script, including the <code>&#60;script&#62;&#60;/script&#62;</code> tags <strong>(important!)</strong></p>
<?php }