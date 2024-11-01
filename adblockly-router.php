<?php 

add_action('wp_head', 'adblockly_head_script_callback', 0);
add_action('template_redirect', 'adblockly_block_redirect');

/* Render Landing Page */
function adblockly_landing_render_callback(){
	ob_start();

	$title = get_option('adblockly_title', 'AdBlocker Detected!');
	$message = get_option('adblockly_message', "You're using an AdBlocker. Kindly disable it on our website.");

	?>
		<h1><?php echo $title ?></h1>
		<p><?php echo nl2br($message) ?></p>
		<a href="<?php echo home_url(); ?>">&larr; Return to Homepage.</a>
	<?php

	return ob_get_clean();
}

/* Header Script */
function adblockly_head_script_callback(){
	$url_js = esc_js( home_url('/?adblock=true') );

	?>
		<script type="text/javascript" src="<?php echo plugins_url( '/adservice.wp/ads.js', __FILE__ ); ?>"></script>
		<script type="text/javascript">
		if( window.AdBlockly === undefined ){ window.location = "<?php echo $url_js; ?>"; }
		</script>
	<?php

}

/* Redirect to Landing Page */
function adblockly_block_redirect(){
	if( isset($_GET['adblock']) && $_GET['adblock'] == 'true' ){
		$message = adblockly_landing_render_callback
	();
		$title = get_option('adblockly_title', 'AdBlocker Detected!');
		wp_die($message, $title);
	}
}
