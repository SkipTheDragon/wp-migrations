## WordPress Migration

Heavily inspired by Symfony/Doctrine migrations, this package provides a simple way to manage your WordPress database schema and data.

### Installation

```bash
 composer require skipthedragon/wp-migrations
```

### Pre-requisites

This package requires:
  - `wpdb` (WordPress database)
  - at least PHP 8.1

### Prerequisites

Migrations must:
  - be in the migration folder that you specified in the config
  - have a unique timestamp in its name
  - implement the Migration interface (`WpMigrations\Architecture\Migration`)
  - have `MigrationV` in its name

### Usage

To run the migrations, you can use the following code:

```php
 use WpMigrations\service\MigrationManagerService;
 
 $config = new \WpMigrations\Architecture\MigrationConfig(
        'path/to/migrations',
        'WpMigrations\\Migrations\\',
        'my_plugin_name'
 );
 
 $migrationManagerService = new MigrationManagerService($config);
 $migrationManagerService->migrate();
```

Check the `migrate()` method in `service/MigrationManagerService.php` for more options and types of migration.

