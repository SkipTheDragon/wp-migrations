<?php

namespace WpMigrations\Migration;

use WpMigrations\Architecture\DBUtils;
use WpMigrations\Architecture\Migration;

/**
 * Migration example.
 *
 * Migration must:
 *  - be in the migration folder that you specified in the config file
 *  - have a unique timestamp in its name
 *  - implement the Migration interface
 *  - have MigrationV in its name
 *
 * @author Tudorache Leonard Valentin
 * @since 1.0
 */
class MigrationV1707157782 implements Migration {
	use DBUtils;

	public function up(): void {

	}

	public function down(): void {

	}
}
