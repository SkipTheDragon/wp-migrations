## WordPress Migration

Heavily inspired by Symfony/Doctrine migrations, this package provides a simple way to manage your WordPress database schema and data.

### Installation

1. Copy the folders in your plugin and change the namespaces if your app has autoloading.
2. Search for @todo in the code and replace with your own values.
3. Check `Usage` for more details.

### Dependencies

As this package is meant to be used in a WordPress environment, it depends on the following packages:
  - `wpdb` (WordPress database)

### Prerequisites

Migrations must:
  - be in the migration folder that you specified in the config file (`service/MigrationManagerService.php`)
  - have a unique timestamp in its name
  - implement the Migration interface (`WpMigrations\Architecture\Migration`)
  - have `MigrationV` in its name

### Usage

To run the migrations, you can use the following code:

```php
 use  WpMigrations\Service\MigrationManagerService;
 
 $migrationManagerService = new MigrationManagerService();
 $migrationManagerService->migrate();
```

Check the `migrate()` method in `service/MigrationManagerService.php` for more options and types of migration.

