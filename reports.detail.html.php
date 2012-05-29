<div style="float:left;width:500px;">
	<h3><?php echo __('Email Summary', 'benchmark-email-lite'); ?></h3>
	<p>
		<strong><?php echo __('Email name', 'benchmark-email-lite'); ?>:</strong> <?php echo $response['emailName']; ?>
		<br /><strong><?php echo __('Subject', 'benchmark-email-lite'); ?>:</strong> <?php echo $response['subject']; ?>
	</p>
	<div style="height:400px;">
		<div id="chart_div" style="display:none;"></div>
	</div>
	<h3><?php echo __('Email Reports', 'benchmark-email-lite'); ?></h3>
	<p>
		<form method="post" action="">
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Opens', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['opens']) { echo ' disabled="disabled"';} ?> />
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Clicks', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['clicks']) { echo ' disabled="disabled"';} ?> />
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Bounces', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['bounces']) { echo ' disabled="disabled"';} ?> />
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Unsubscribes', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['unsubscribes']) { echo ' disabled="disabled"';} ?> />
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Forwards', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['forwards']) { echo ' disabled="disabled"';} ?> />
		<input type="submit" class="button-primary" name="show" value="<?php echo __('Unopens', 'benchmark-email-lite'); ?>"
			title="<?php echo __('Click to view report', 'benchmark-email-lite'); ?>"
			<?php if (!$response['unopens']) { echo ' disabled="disabled"';} ?> />
		</form>
	</p>
</div>
<div style="float:left;">
	<h3><?php echo __('Email Statistics', 'benchmark-email-lite'); ?></h3>
	<table class="widefat" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo __('Statistic', 'benchmark-email-lite'); ?></th>
				<th><?php echo __('Value', 'benchmark-email-lite'); ?></th>
				<th><?php echo __('Percent', 'benchmark-email-lite'); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo __('Total Emails Sent', 'benchmark-email-lite'); ?></td>
				<td><?php echo $response['mailSent']; ?></td>
				<td> </td>
			</tr>
			<tr>
				<td><?php echo __('Opened Emails', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['opens']) ? "<a href='{$url}opens' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['opens']}</a>" : 0; ?>
				</td>
				<td>
					<?php echo number_format(100*$response['opens']/$response['mailSent'], 1); ?>%
				</td>
			</tr>
			<tr>
				<td><?php echo __('Links Clicked', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['clicks']) ? "<a href='{$url}clicks' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['clicks']}</a>" : 0; ?>
				</td>
				<td>
					<?php echo number_format(100*$response['clicks']/$response['opens'], 1); ?>%
				</td>
			</tr>
			<tr>
				<td><?php echo __('Emails Forwarded', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['forwards']) ? "<a href='{$url}forwards' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['forwards']}</a>" : 0; ?>
				</td>
				<td> </td>
			</tr>
			<tr>
				<td><?php echo __('Emails Bounced', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['bounces']) ? "<a href='{$url}bounces' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['bounces']}</a>" : 0; ?>
				</td>
				<td>
					<?php echo number_format(100*$response['bounces']/$response['mailSent'], 1); ?>%
				</td>
			</tr>
			<tr>
				<td><?php echo __('Unsubscribes', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['unsubscribes']) ? "<a href='{$url}unsubscribes' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['unsubscribes']}</a>" : 0; ?>
				</td>
				<td>
					<?php echo number_format(100*$response['unsubscribes']/$response['mailSent'], 1); ?>%
				</td>
			</tr>
			<tr>
				<td><?php echo __('Unopened', 'benchmark-email-lite'); ?></td>
				<td>
					<?php echo ($response['unopens']) ? "<a href='{$url}unopens' title='" . __('Click to view report', 'benchmark-email-lite') . "'>{$response['unopens']}</a>" : 0; ?>
				</td>
				<td>
					<?php echo number_format(100*$response['unopens']/($response['mailSent']), 1); ?>%
				</td>
			</tr>
			<tr>
				<td><?php echo __('Abuse Reports', 'benchmark-email-lite'); ?></td>
				<td><?php echo $response['abuseReports']; ?></td>
				<td> </td>
			</tr>
		</tbody>
	</table>
	<?php self::showLocations(); ?>
</div>
<div style="clear:both;"> </div>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
// http://code.google.com/apis/chart/interactive/docs/gallery/piechart.html
function drawChart() {
	var data = new google.visualization.DataTable();
	data.addColumn('string', 'Statistic');
	data.addColumn('number', 'Number');
	data.addRows([
		['<?php echo __('Opened', 'benchmark-email-lite'); ?>', <?php echo $response['opens'];?>],
		['<?php echo __('Bounced', 'benchmark-email-lite'); ?>', <?php echo $response['bounces'];?>],
		['<?php echo __('Unopened', 'benchmark-email-lite'); ?>', <?php echo $response['unopens'];?>],
	]);
	var options = {
		//animation:{duration:1000,easing:'out'},
		chartArea:{width:400,height:365},
		width:500,
		height:400,
		is3D:true,
		//legend:{position:'bottom'},
		colors:['77D9A1','F2A81D','1C8DDE'],
	};
	var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
	chart.draw(data, options);
	jQuery('#chart_div').fadeIn(2500);
}
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(drawChart);
</script>
