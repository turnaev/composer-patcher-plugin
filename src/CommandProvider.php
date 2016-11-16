<?php

namespace Tvi\Composer;

use Composer\Plugin\Capability\CommandProvider as BaseProviderCapability;
use Composer\Command\BaseCommand;
use Tvi\Composer\Command;

class CommandProvider implements BaseProviderCapability
{
    /**
     * @return BaseCommand[]
     */
    public function getCommands()
    {
        return array(
            new Command\AboutCommand,
            new Command\DevCommand
        );
    }
}
