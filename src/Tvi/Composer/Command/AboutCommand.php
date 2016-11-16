<?php

namespace Tvi\Composer\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Composer\Command\BaseCommand;

class AboutCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('code-patcher:about')
            ->setDescription('Short information about CodePatcher')
            ->setHelp(<<<EOT
<info>php composer-patcher about</info>
EOT
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getIO()->write(<<<EOT
<info>CodePatcher - Plugin of Composer for path code</info>
EOT
        );
    }
}
