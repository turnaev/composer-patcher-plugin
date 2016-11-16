<?php

namespace Tvi\Composer\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Composer\Command\BaseCommand;

class DevCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('code-patcher:dev')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        v(1);

    }
}
