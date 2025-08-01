<?php

use App\Facades\LibrenmsConfig;

require 'includes/html/graphs/common.inc.php';

$i = 0;
$scale_min = 0;
$nototal = 1;
$unit_text = 'Query/s';
$rrd_filename = Rrd::name($device['hostname'], ['app', 'unbound-queries', $app->app_id]);
$array = [
    'type0',
    'A',
    'NS',
    'CNAME',
    'SOA',
    'NULL',
    'WKS',
    'PTR',
    'MX',
    'TXT',
    'AAAA',
    'SRV',
    'NAPTR',
    'DS',
    'DNSKEY',
    'SPF',
    'ANY',
    'other',
];

$colours = 'merged';
$rrd_list = [];

LibrenmsConfig::set('graph_colours.merged', array_merge(LibrenmsConfig::get('graph_colours.greens'), LibrenmsConfig::get('graph_colours.blues')));

foreach ($array as $ds) {
    $rrd_list[$i]['filename'] = $rrd_filename;
    $rrd_list[$i]['descr'] = strtoupper($ds);
    $rrd_list[$i]['ds'] = $ds;
    $i++;
}
require 'includes/html/graphs/generic_multi_simplex_seperated.inc.php';
