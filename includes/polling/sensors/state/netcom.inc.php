<?php

/*
 * Small helper to decode the Alarm String
 */

$oid = ".1.3.6.1.4.1.32185.2.1.6.0";
$alarmsString = snmp_get($device, $oid, '-Ovq', 'ADH-NETCOM-MIB');
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
#    $rate_states = [
#        ['value' => 1, 'generic' => 2, 'graph' => 1, 'descr' => '1X (QPSK+SFBC)'],
#        ['value' => 2, 'generic' => 2, 'graph' => 1, 'descr' => '2X (QPSK)'],
#        ['value' => 4, 'generic' => 1, 'graph' => 1, 'descr' => '4X (16QAM)'],
#        ['value' => 6, 'generic' => 1, 'graph' => 1, 'descr' => '6X (64QAM)'],
#        ['value' => 8, 'generic' => 0, 'graph' => 1, 'descr' => '8X (256QAM)'],
#        ['value' => 10, 'generic' => 0, 'graph' => 1, 'descr' => '10X (1024QAM)'],
#        ['value' => 12, 'generic' => 0, 'graph' => 1, 'descr' => '12X (4096QAM)'],
#    ];
#
#    create_state_index($txrate_state_name, $rate_states);
#    create_state_index($rxrate_state_name, $rate_states);

if ($device['os'] == 'netcom' && $sensor['sensor_oid'] == $oid) {
        $sensor_value = $sensor_valuearray[$sensor['sensor_index']];

        if ($sensor_value == '-') {
            $sensor_value = 1;
        } elseif ($sensor_value == 'W') {
            $sensor_value = 2;
        } elseif ($sensor_value == 'A') {
            $sensor_value = 3;
        } else {
            $sensor_value = 0;
        }

        unset($sensor_valuearray, $alarmsString, $oid, $state_index_name);

}
