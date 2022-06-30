<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Privatization\Rector\Class_\FinalizeClassesWithoutChildrenRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelLevelSetList;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/public',
    ]);

    $rectorConfig->sets([
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::UNWRAP_COMPAT,
        SetList::CODING_STYLE,
        SetList::PRIVATIZATION,
        SetList::NAMING,
        LevelSetList::UP_TO_PHP_74,
        LaravelLevelSetList::UP_TO_LARAVEL_80,
        PHPUnitLevelSetList::UP_TO_PHPUNIT_90,
    ]);

    $rectorConfig->skip([
        __DIR__ . '/bootstrap/cache',
        FinalizeClassesWithoutChildrenRector::class => [
            __DIR__ . '/app/Http/Controllers/Controller.ph',
        ],
    ]);
};
