<?php

$name = 'hv-monitor';
$unit_text = 'Seconds';
$colours = 'psychedelic';
$dostack = 0;
$printtotal = 0;
$addarea = 0;
$transparency = 15;

if (isset($vars['vm'])) {
    $rrd_filename = Rrd::name($device['hostname'], ['app', $name, $app->app_id, 'vm', $vars['vm']]);
} else {
    $rrd_filename = Rrd::name($device['hostname'], ['app', $name, $app->app_id]);
}
$descr = 'Etimes';
$ds = 'etimes';

require 'includes/html/graphs/generic_stats.inc.php';
