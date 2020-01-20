<?php

namespace Mgh\Section\Console;

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Illuminate\Support\Str;
use Mgh\Section\SectionOption;

class SectionMiddleware extends MiddlewareMakeCommand
{
    use SectionOption;

    protected function getDefaultNamespace($rootNamespace)
    {
        $namespace = $rootNamespace.'\Http';
        if (!is_null($this->option('section'))) {
            $namespace = $namespace.'\Controllers\\'.Str::studly($this->option('section'));
        }

        return $namespace.'\Middlewares';
    }
}
