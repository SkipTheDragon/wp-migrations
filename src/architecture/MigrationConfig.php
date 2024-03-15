<?php

namespace WpMigrations\Architecture;

/**
 * Configuration for the migration system.
 */
class MigrationConfig
{
    /**
     * @param string $migrationFolder The folder where the migrations are stored.
     * @param string $migrationNamespace The namespace of the migrations.
     * @param string $pluginTableName The prefix of the table used for development.
     * @param bool $skipMigrationTableCreation Skip the creation of the migration table.
     */
    public function __construct(
        private readonly string $migrationFolder,
        private readonly string $migrationNamespace,
        private readonly string $pluginTableName,
        private readonly bool $skipMigrationTableCreation = false
    )
    {
    }

    public function isSkipMigrationTableCreation(): bool
    {
        return $this->skipMigrationTableCreation;
    }

    /**
     * @return string
     */
    public function getMigrationNamespace(): string
    {
        return $this->migrationNamespace;
    }


    /**
     * @return string
     */
    public function getMigrationFolder(): string
    {
        return $this->migrationFolder;
    }

    /**
     * @return string
     */
    public function getPluginTableName(): string
    {
        return $this->pluginTableName;
    }
}
