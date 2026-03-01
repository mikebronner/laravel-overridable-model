<?php

use GeneaLabs\LaravelOverridableModel\Contracts\OverridableModel;
use GeneaLabs\LaravelOverridableModel\Traits\Overridable;
use Illuminate\Database\Eloquent\Model;

beforeEach(function () {
    $this->model = new class extends Model implements OverridableModel {
        use Overridable;

        protected $table = 'test_models';
    };
});

it('returns the model class name via model()', function () {
    expect($this->model::model())->toBe(get_class($this->model));
});

it('allows overriding the model class', function () {
    $originalClass = get_class($this->model);
    $this->model::useModel('App\\Models\\CustomModel');

    expect($this->model::model())->toBe('App\\Models\\CustomModel');

    // Reset
    $this->model::useModel($originalClass);
});

it('runs migrations by default', function () {
    expect($this->model::runsMigrations())->toBeTrue();
});

it('can ignore migrations', function () {
    $this->model::ignoreMigrations();

    expect($this->model::runsMigrations())->toBeFalse();
});

it('implements the OverridableModel contract', function () {
    expect($this->model)->toBeInstanceOf(OverridableModel::class);
});
