<?php

namespace Mgh\Section\Console;

use Illuminate\Foundation\Console\JobMakeCommand;
use Illuminate\Support\Str;
use Mgh\Section\SectionOption;

class SectionJob extends JobMakeCommand
{
    use SectionOption;

    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $rootNamespace.'\Http';
        if (!is_null($this->option('section'))) {
            $namespace = $namespace.'\Controllers\\'.Str::studly($this->option('section'));
        }

        return $namespace.'\Jobs';
    }
}
