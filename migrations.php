<?php

return [
    'name' => 'Curso de Doctrine Alura',
    'migrations_namespace' => 'Alura\Doctrine\Migrations',
    'table_name' => 'doctrine_migration_versions',
    'column_name' => 'version',
    'column_length' => 14,
    'executed_at_column_name' => 'executed_at',
    'migrations_directory' => __DIR__ . '/src/Migrations',
    'all_or_nothing' => true,
];