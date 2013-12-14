<div class="wrap">
	<?php echo get_screen_icon('plugins'); ?>
	<h2>Benchmark Email Lite</h2>
	<h2 class="nav-tab-wrapper">&nbsp;
	<?php

	// Show Tabs
	foreach( $tabs as $tab => $name ) {
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab{$class}' href='admin.php?page={$tab}'>{$name}</a>";
	}

	?>
	</h2>
	<?php

	// Handle Server Down On Either Tab
	if( $val = get_transient( 'benchmark-email-lite_serverdown' ) ) {

	?>
	<br />
	<div class="fade error">
		<h3><?php echo __( 'Connection Timeout', 'benchmark-email-lite' ); ?></h3>
		<p><?php echo __( 'Due to sluggish communications, the Benchmark Email connection is automatically suspended for up to 5 minutes.', 'benchmark-email-lite' ); ?></p>
		<p><?php echo __( 'You may click this button to retry communications now:', 'benchmark-email-lite' ); ?></p>
		<form method="post" action="">
		<input type="submit" class="button-primary" name="force_reconnect" value="<?php echo __( 'Attempt to Reconnect', 'benchmark-email-lite' ); ?>" />
		</form>
		<p><?php echo __( 'If you encounter this error often, you may set the Connection Timeout setting to a higher value.', 'benchmark-email-lite' ); ?></p>
	</div>
	<?php

	// Server Up
	}

	// Show Selected Tab Content
	switch( $current ) {
		case 'benchmark-email-lite':
			benchmarkemaillite_reports::show();
			break;
		case 'benchmark-email-lite-settings':
			benchmarkemaillite_settings::print_settings();
			break;
	}

	?>
	<br />
	<hr />
	<p><?php echo __('Need help? Please call Benchmark Email at 800.430.4095.', 'benchmark-email-lite'); ?></p>
</div>