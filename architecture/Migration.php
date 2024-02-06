<?php

namespace WpMigrations\Architecture;

/**
 * Migration interface, all migrations must implement this interface.
 * @author Tudorache Leonard Valentin
 * @since 1.0
 */
interface Migration {
    /**
     * The up method is called when upgrading a plugin.
     * Usually, this method is used to create tables, columns, etc.
     * @return void
     */
	public function up(): void;

    /**
     * The down method is called when downgrading a plugin.
     * Usually, this method is used to delete tables, columns, etc.
     * @return void
     */
	public function down(): void;
}
