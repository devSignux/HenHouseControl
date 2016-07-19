<?php
// you must install zoneinfo-euope at first(or what you need):
// opkg update
// opkg install zoneinfo-europe

        date_default_timezone_set('Europe/Berlin');
	$now = time();
	$gmt_offset = 1;
	$zenith = 90+50/60;

	$sunset = date_sunset($now, SUNFUNCS_RET_TIMESTAMP, 51.345131, 12.381670, $zenith, $gmt_offset);
	$sunrise = date_sunrise($now, SUNFUNCS_RET_TIMESTAMP, 51.345131, 12.381670, $zenith, $gmt_offset);

	echo "sunrise=".date("H:i",$sunrise).";";
	echo "sunset=".date("H:i",$sunset);
?>
