<?php


/**
 * Converts PSI to kpa (with 2 decimal places)
 *
 * @param  float  $value
 * @return float
 */
function psi_to_kpa($value)
{
    // 1 PSI = 6.894757293168361 kPa
    $kpa = $value * 6.894757293168361;
    return round($value,2);
}

/**
 * Converts mbar to kPa (with 2 decimal places)
 *
 * @param float $value Value in millibars
 * @return float
 */
function mbar_to_kpa($value)
{
    // 1 mbar = 0.1 kPa
    $kpa = $value * 0.1;
    return round($value,2);
}


if (is_string($sensor_value)) {
    // for pressure sensors, try to detect psi or mbar values
    if (Str::endsWith($sensor_value, ['psi', 'PSI'])) {
        $sensor_value = psi_to_kpa($sensor_value);
    }
    if (Str::endsWith($sensor_value, ['mbar'])) {
        $sensor_value = mbar_to_kpa($sensor_value);
    }
}
