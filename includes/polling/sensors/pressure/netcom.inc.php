<?php

if (is_string($sensor_value)) {
    // for pressure sensors, try to detect psi or mbar values
    if (Str::endsWith($sensor_value, ['psi', 'PSI'])) {
        $sensor_value = round(explode(" ",$sensor_value)[0] * 6.894757293168361,2);
    }
    if (Str::endsWith($sensor_value, ['mbar'])) {
        $sensor_value = round(explode(" ",$sensor_value)[0] * 0.1);
    }
}
