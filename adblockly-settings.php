<?php

add_action('admin_menu', 'adblockly_add_admin_menu');
add_action('admin_init', 'adblockly_settings_init');

/* Settings Menu */
function adblockly_add_admin_menu()
{
    add_menu_page('AdBlockly', 'AdBlockly', 'manage_options', 'adblockly', 'adblockly_options_page', 'dashicons-shield');
}

/* Settings Initializer */
function adblockly_settings_init()
{
    // settings
    register_setting('adblockly_settings', 'adblockly_title');
    register_setting('adblockly_settings', 'adblockly_message');

    // landing section
    add_settings_section('adblockly_landing_section', 'Landing Page', 'adblockly_landing_section_callback', 'adblockly_settings');
    add_settings_field('adblockly_title', 'Title', 'adblockly_title_render', 'adblockly_settings', 'adblockly_landing_section');
    add_settings_field('adblockly_message', 'Message', 'adblockly_message_render', 'adblockly_settings', 'adblockly_landing_section');
    
    // about section
    add_settings_section('adblockly_about_section', 'About Us', 'adblockly_about_section_callback', 'adblockly_settings');
}

/* Settings Field Renderer */
function adblockly_title_render()
{
    $options = get_option('adblockly_title', 'AdBlocker Detected!'); ?>
	<input type='text' name='adblockly_title' value='<?php echo esc_attr($options); ?>'>
	<?php
}

function adblockly_message_render()
{
    $options = get_option('adblockly_message', "You're using an AdBlocker. Kindly disable it on our website."); ?>
	<textarea cols='40' rows='5' name='adblockly_message'><?php echo esc_textarea($options); ?></textarea>
	<?php
}

/* Settings Section Renderer */
function adblockly_landing_section_callback()
{
    echo 'Change your landing page error message to users.';
}

function adblockly_about_section_callback()
{
    ?>
    <p>This plugin is created by Kodesiana.com. Contribute to this project by forking this plugin on GitHub.</p>
    <p>Need help? Ask in plugin page or go to <a href="https://kodesiana.com">https://kodesiana.com</a><br>
    Copyright (C) Kodesiana.com 2018.</p>
    <?php
}

/* Settings Renderer */
function adblockly_options_page()
{
    ?>
	<form action='options.php' method='post'>
		<h1>AdBlockly</h1>

		<?php
        if (isset($_GET['settings-updated']))
        {
            ?>
            <div id="message" class="updated"><p>Settings saved.</p></div>
            <?php
        }

        settings_fields('adblockly_settings');
        do_settings_sections('adblockly_settings');
        submit_button(); ?>
	</form>
	<?php
}
