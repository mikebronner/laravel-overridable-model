<?php

namespace GeneaLabs\LaravelOverridableModel\Contracts;

interface OverridableModel
{
    public static function ignoreMigrations() : void;
    public static function runsMigrations() : bool;
    public static function useModel(string $model) : void;
    public static function model() : string;
}
