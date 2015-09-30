
<?php $field = $this->settings_key . '[' . esc_attr( $args['key'] ) . ']'; ?>

<?php if( $args['type'] === 'radio' ) {
    $options = isset( $args['options'] ) ? $args['options'] : null;

    if( $options ) {
        foreach( $options as $index => $option ) {
            $checked = ( $args['value'] == $index ) ? ' checked' : null; ?>
            <p><label for=""><input data-target="<?php echo $index; ?>" name="<?php echo $field . '[value]'; ?>" type="radio" value="<?php echo $index; ?>" class="tog mpress-analytics-tog"<?php echo $checked; ?>>&nbsp;<?php echo $option; ?></label></p>
       <?php }
    } // endif
}

elseif( $args['type'] == 'text' ) { ?>
    <input data-selector="<?php echo $args['selector']; ?>" id="<?php echo esc_attr( $args['field_id'] ); ?>" type="text" class="regular-text" name="<?php echo $field . '[value]'; ?>" value="<?php echo esc_attr( $args['value'] ); ?>" placeholder="<?php echo esc_attr( $args['label'] ); ?>">
<?php }


elseif( $args['type'] == 'textarea' ) { ?>
    <textarea data-selector="<?php echo $args['selector']; ?>" id="<?php echo esc_attr( $args['field_id'] ); ?>" name="<?php echo $field . '[value]'; ?>" rows="5" cols="50"><?php echo esc_attr( $args['value'] ); ?></textarea>
<?php }