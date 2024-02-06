<?php

namespace WpMigrations\Repository;

use WpMigrations\Architecture\Repository;

/**
 * Repository for migration operations.
 * @author Tudorache Leonard Valentin
 * @since 1.0
 */
final class MigrationRepository extends Repository {

    /**
     * Retrieve all migrations from the database.
     * @return array
     */
	public function findAll(): array {
		return $this->db->get_results( $this->realTable( "SELECT * FROM wp_your_prefix_here_migrations" ), ARRAY_A );
	}

    /**
     * Persist a migration in the database.
     * Called on upgrading a plugin.
     * @param string $class
     * @param int $timestamp
     * @return void
     */
	public function persist( string $class, int $timestamp ): void {
		$this->db->insert(
			$this->realTable( 'wp_your_prefix_here_migrations' ),
			[
				'class'     => $class,
				'timestamp' => $timestamp,
				'run_date'  => time()
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
			$this->realTable( 'wp_your_prefix_here_migrations' ),
			[ $by => $value ]
		);
	}
}
