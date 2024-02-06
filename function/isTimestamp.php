<?php

namespace WpMigrations\Function;

/**
 * Helper function to check if a string is a valid timestamp.
 * Used to check if a migration file has a valid timestamp in its name.
 * @param $timestamp
 * @return bool
 */
function isTimestamp($timestamp): bool {
	if(ctype_digit($timestamp) && strtotime(date('Y-m-d H:i:s',$timestamp)) === (int)$timestamp) {
		return true;
	} else {
		return false;
	}
}
