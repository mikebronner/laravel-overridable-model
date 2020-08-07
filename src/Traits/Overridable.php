<?php

namespace GeneaLabs\LaravelOverridableModel\Traits;

trait Overridable
{
    protected static $ignoreMigrations = false;
    protected static $modelClassName = self::class;

    public static function ignoreMigrations() : void
    {
        self::$ignoreMigrations = true;
    }

    public static function model() : string
    {
        return self::$modelClassName
            ?? self::class;
    }

    public static function runsMigrations() : bool
    {
        return ! self::$ignoreMigrations
            ?? true;
    }

    public static function useModel(string $model) : void
    {
        self::$modelClassName = $model;
    }
}
