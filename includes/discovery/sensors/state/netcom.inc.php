<?php

/*
 * Small helper to decode the Alarm String
 *
 *
 */

$oid = ".1.3.6.1.4.1.32185.2.1.6.0";
$alarmsString = snmp_get($device, $oid, '-Ovq', 'ADH-NETCOM-MIB');
$current_value=1;
$state_index_name = "alarmState";

/*
 * alarms OBJECT-TYPE
 *         SYNTAX     DisplayString (SIZE (30))
 *         MAX-ACCESS read-only
 *         STATUS     current
 *         DESCRIPTION
 *                 "Current alarm conditions: is a list of them
 *                  Each character has a - for no alarm, or an A or W if there
 *                  is an alarm.  A means alarm (serious), W means a warning
 *                  (not so serious).  Severity levels may later change.
 * 		 List of alarms: (later versions may add more):
 * 		 A1:  Low pressure
 * 		 A2:  High pressure
 * 		 W3:  High duty cycle
 * 		 W4:  High temperature
 * 		 W5:  Low temperature
 * 		 W6:  Unused
 * 		 A7:  Canister 1 won't heat
 * 		 A8:  Canister 1 won't cool
 * 		 A9:  Canister 2 won't heat
 * 		 A10: Canister 2 won't cool
 * 		 A11: Unable to pressurize
 * 		 A12: Dew point alarm
 * 		 W13: Compressor timeout (for future use)
 * 		 W14: Communications error
 * 		 A15: Canister 1 thermistor bad
 * 		 A16: Canister 2 thermistor bad
 * 		 A17: Ambient thermistor bad
 * 		 A18: Overpressure
 * 		 A19: Bad calibrations in EEPROM
 * 		 A20: Bad limits in EEPROM
 * 		 A21: Short cycling
 * 		 A22: Pump shut down due to error condition"
 *         ::= { statusInfo 6 }
 */


#
$states = [
    ['value' => 0, 'generic' => 0, 'graph' => 1, 'descr' => 'Unknown'],
    ['value' => 1, 'generic' => 1, 'graph' => 1, 'descr' => 'OK'],
    ['value' => 2, 'generic' => 2, 'graph' => 1, 'descr' => 'Warning'],
    ['value' => 3, 'generic' => 3, 'graph' => 1, 'descr' => 'Alarm'],
];
#
create_state_index($state_index_name, $states);

discover_sensor(null, 'state', $device, $oid, '0', $state_index_name, "Low pressure", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '1', $state_index_name, "High pressure", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '2', $state_index_name, "High duty cycle", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '3', $state_index_name, "High temperature", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '4', $state_index_name, "Low temperature", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '6', $state_index_name, "Canister 1 won't heat", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '7', $state_index_name, "Canister 1 won't cool", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '8', $state_index_name, "Canister 2 won't heat", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '9', $state_index_name, "Canister 2 won't cool", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '10', $state_index_name, "Unable to pressurize", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '11', $state_index_name, "Dew point alarm", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '12', $state_index_name, "Compressor timeout (for future use)", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '13', $state_index_name, "Communications error", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '14', $state_index_name, "Canister 1 thermistor bad", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '15', $state_index_name, "Canister 2 thermistor bad", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '16', $state_index_name, "Ambient thermistor bad", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '17', $state_index_name, "Overpressure", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '18', $state_index_name, "Bad calibrations in EEPROM", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '19', $state_index_name, "Bad limits in EEPROM", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '20', $state_index_name, "Short cycling", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');
discover_sensor(null, 'state', $device, $oid, '21', $state_index_name, "Pump shut down due to error condition", 1, '1', null, null, null, null, $current_value, 'snmp', null, null, null, 'Alarms', 'GAUGE');




# {
#    $low_limit = set_null($low_limit);
#    $low_warn_limit = set_null($low_warn_limit);
#    $warn_limit = set_null($warn_limit);
#    $high_limit = set_null($high_limit);
#    $current = Number::cast($current);
#
#    if (! is_numeric($divisor)) {
#        $divisor = 1;
#    }
#
#    app('sensor-discovery')->discover(new \App\Models\Sensor([
#        'poller_type' => $poller_type,
#        'sensor_class' => $class,
#        'device_id' => $device['device_id'],
#        'sensor_oid' => $oid,
#        'sensor_index' => $index,
#        'sensor_type' => $type,
#        'sensor_descr' => $descr,
#        'sensor_divisor' => $divisor,
#        'sensor_multiplier' => $multiplier,
#        'sensor_limit' => $high_limit,
#        'sensor_limit_warn' => $warn_limit,
#        'sensor_limit_low' => $low_limit,
#        'sensor_limit_low_warn' => $low_warn_limit,
#        'sensor_current' => $current,
#        'entPhysicalIndex' => $entPhysicalIndex,
#        'entPhysicalIndex_measured' => $entPhysicalIndex_measured,
#        'user_func' => $user_func,
#        'group' => $group,
#        'rrd_type' => $rrd_type,
#    ]));
#
#    return true;
#}
