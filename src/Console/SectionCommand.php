<?php

namespace Mgh\Section\Console;

use Illuminate\Foundation\Console\ConsoleMakeCommand;
use Illuminate\Support\Str;
use Mgh\Section\SectionOption;

class SectionCommand extends ConsoleMakeCommand
{
    use SectionOption;

    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $rootNamespace.'\Http';
        if (!is_null($this->option('section'))) {
            $namespace = $namespace.'\Controllers\\'.Str::studly($this->option('section'));
        }

        return $namespace.'\Commands';
    }
}
