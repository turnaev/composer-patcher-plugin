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

        $treeBuilder = new \Symfony\Component\Config\Definition\Builder\TreeBuilder();
        $rootNode = $treeBuilder->root('database');

        $rootNode
            ->children()
                ->booleanNode('auto_connect')
                    ->defaultTrue()
                ->end()
                ->scalarNode('default_connection')
                    ->defaultValue('default')
                ->end()
                ->scalarNode('test')
                    ->defaultValue('default')
                ->end()
            ->end();


        $config1 = \Symfony\Component\Yaml\Yaml::parse(
            file_get_contents(__DIR__.'/test.yml')
        );

        v($config1);
        $configs = array($config1);

        $processor = new \Symfony\Component\Config\Definition\Processor();

        $r = $processedConfiguration = $processor->process(
            $treeBuilder->buildTree(),
            $configs
        );

        v($r);


    }
}
