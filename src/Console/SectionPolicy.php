<?php

namespace Mgh\Section\Console;

use Illuminate\Foundation\Console\PolicyMakeCommand;
use Illuminate\Support\Str;
use Mgh\Section\SectionOption;

class SectionPolicy extends PolicyMakeCommand
{
    use SectionOption;

    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $rootNamespace.'\Http';
        if (!is_null($this->option('section'))) {
            $namespace = $namespace.'\Controllers\\'.Str::studly($this->option('section'));
        }

        return $namespace.'\Policies';
    }
}
