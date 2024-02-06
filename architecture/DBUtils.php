<?php

namespace WpMigrations\Architecture;

/**
 * Class with database utilities. Use it whenever you need to interact with the database,
 * but remember to keep your sql only inside repositories.
 * @author Tudorache Leonard Valentin
 * @since 1.0
 */
trait DBUtils
{
    protected \wpdb $db;

    // TODO: check setting
    private string $TABLE_PREFIX = 'your_prefix_here'; // TODO make this const in php 8.2

    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
    }

    /**
     * Quick utility for creating a table if it doesn't exist.
     * @param string $tableName
     * @param string $sql
     * @return void
     */
    public function maybeCreateTable(string $tableName, string $sql): void
    {
        maybe_create_table($this->realTable($tableName), $this->realTable($sql));
    }

    /**
     * Returns the real table name with the user's WordPress instance prefix.
     * This way we get autosuggestions from PHPStorm.
     * @param string $table
     *
     * @return string
     */
    public function realTable(string $table): string
    {
        // TODO: check setting
        // change wp_your_prefix_here to your prefix on your dev environment
        return str_replace('wp_your_prefix_here', $this->db->prefix . $this->TABLE_PREFIX, $table);
    }
}
