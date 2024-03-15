<?php

namespace WpMigrations\Repository;

use WpMigrations\Architecture\MigrationConfig;

/**
 * Repository for migration operations.
 * @author Tudorache Leonard Valentin
 * @since 1.0
 */
final class MigrationRepository {
    // The migration table name. Should be unique for each plugin.
    private string $table;

    // The WordPress database class.
    private \wpdb $db;

    public function __construct(MigrationConfig $config)
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->table = $wpdb->prefix. $config->getPluginTableName() . '_migrations';

        // Create the migration table if it does not exist.
        if (!$config->isSkipMigrationTableCreation()) {
            $this->createTable();
        }
    }

    /**
     * Retrieve all migrations from the database.
     * @return array
     */
	public function findAll(): array {
		return $this->db->get_results( "SELECT * FROM " . $this->table, ARRAY_A );
	}

    /**
     * Persist a migration in the database.
     * Called on upgrading a plugin.
     * @param string $class
     * @param int $timestamp
     * @return void
     */
	public function persist( string $class, int $timestamp ): void {

        // Check if the migration is already in the database.
        if ( $this->db->get_row( "SELECT * FROM " . $this->table . " WHERE class = '" . $class . "'", ARRAY_A ) ) {
            return;
        }

		$this->db->insert(
            $this->table,
			[
				'class'     => $class,
				'timestamp' => $timestamp,
				'run_date'  => date('Y-m-d H:i:s')
			]
		);
	}

    /**
     * Remove a migration from the database.
     * Called on downgrading a plugin.
     * @param string $by
     * @param int $value
     * @return void
     */
	public function removeBy( string $by, int $value ): void {
		$this->db->delete(
            $this->table,
			[ $by => $value ]
		);
	}

    /**
     * Create the migration table in the database.
     *
     * @return void
     */
    public function createTable(): void
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "
            CREATE TABLE IF NOT EXISTS $this->table (
                class VARCHAR(255) NOT NULL UNIQUE,
                timestamp INT NOT NULL,
                run_date DATETIME NOT NULL
            );
        ";

        dbDelta($sql);
    }
}
