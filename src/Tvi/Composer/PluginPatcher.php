<?php

namespace Tvi\Composer;

use Symfony\Component\Finder\Finder;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Script\Event;
use Composer\Plugin\Capable;

class PluginPatcher implements PluginInterface, EventSubscriberInterface, Capable
{
    /**
     * @var IOInterface
     */
    protected $io;

    /**
     * @var Composer
     */
    protected $composer;

    /**
     * @var string
     */
    private $baseDir;

    /**
     * Activate the plugin (called from {@see \Composer\Plugin\PluginManager})
     *
     * @param \Composer\Composer $composer
     * @param \Composer\IO\IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->io = $io;
        $this->composer = $composer;


    }

    /**
     * @return array
     */
    public function getCapabilities()
    {
        return array(
            'Composer\Plugin\Capability\CommandProvider' => 'Tvi\Composer\CommandProvider',
        );
    }

    /**
     * @return string
     */
    public function getBaseDir()
    {
        if(!$this->baseDir) {

            $config = $this->composer->getConfig();

            $reflectionClass = new \ReflectionClass($config);
            $reflectionProperty = $reflectionClass->getProperty('baseDir');
            $reflectionProperty->setAccessible(true);
            $this->baseDir = $reflectionProperty->getValue($config);
        }

        return $this->baseDir;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            'pre-install-cmd' => array(
                array('preInstall', 0)
            ),
            'post-install-cmd' => array(
                array('postInstall', 0)
            ),
            'pre-update-cmd' => array(
                array('preUpdate', 0)
            ),
            'post-update-cmd' => array(
                array('postUpdate', 0)
            ),
        );
    }

    /**
     * @param Event $event
     */
    public function preInstall(Event $event)
    {
        v(__METHOD__);
    }

    /**
     * @param Event $event
     */
    public function postInstall(Event $event)
    {
        v(__METHOD__);
    }

    /**
     * @param Event $event
     */
    public function preUpdate(Event $event)
    {
        v(__METHOD__);
    }

    /**
     * @param Event $event
     */
    public function postUpdate(Event $event)
    {
        v(__METHOD__);
    }
}
