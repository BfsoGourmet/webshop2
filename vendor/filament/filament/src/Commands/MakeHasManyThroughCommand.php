<?php

namespace Filament\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeHasManyThroughCommand extends Command
{
    use Concerns\CanManipulateFiles;
    use Concerns\CanValidateInput;

    protected $description = 'Creates a Filament HasManyThrough relation manager class for a resource.';

    protected $signature = 'make:filament-has-many-through {resource?} {relationship?} {recordTitleAttribute?}';

    public function handle(): int
    {
        $resource = (string) Str::of($this->argument('resource') ?? $this->askRequired('Resource (e.g. `ProjectResource`)', 'resource'))
            ->studly()
            ->trim('/')
            ->trim('\\')
            ->trim(' ')
            ->replace('/', '\\');

        if (! Str::of($resource)->endsWith('Resource')) {
            $resource .= 'Resource';
        }

        $relationship = (string) Str::of($this->argument('relationship') ?? $this->askRequired('Relationship (e.g. `deployments`)', 'relationship'))
            ->trim(' ');
        $managerClass = (string) Str::of($relationship)
            ->studly()
            ->append('RelationManager');

        $recordTitleAttribute = (string) Str::of($this->argument('recordTitleAttribute') ?? $this->askRequired('Title attribute (e.g. `title`)', 'title attribute'))
            ->trim(' ');

        $path = app_path(
            (string) Str::of($managerClass)
                ->prepend("Filament\\Resources\\{$resource}\\RelationManagers\\")
                ->replace('\\', '/')
                ->append('.php'),
        );

        if ($this->checkForCollision([
            $path,
        ])) {
            return static::INVALID;
        }

        $this->copyStubToApp('HasManyThroughRelationManager', $path, [
            'namespace' => "App\\Filament\\Resources\\{$resource}\\RelationManagers",
            'managerClass' => $managerClass,
            'recordTitleAttribute' => $recordTitleAttribute,
            'relationship' => $relationship,
        ]);

        $this->info("Successfully created {$managerClass}!");

        $this->info("Make sure to register the relation in `{$resource}::getRelations()`.");

        return static::SUCCESS;
    }
}
