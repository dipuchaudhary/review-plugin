<h1>Custom Settings Api</h1>
<h5>Here's some custom field options below. </h5>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields( 'custom-setting-group' ) ?>
    <?php do_settings_sections( 'email_slug' ); ?>
    <?php submit_button();?>
    
</form>