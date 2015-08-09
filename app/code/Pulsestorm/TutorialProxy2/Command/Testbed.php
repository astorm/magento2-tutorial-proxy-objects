<?php
namespace Pulsestorm\TutorialProxy2\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Magento\Framework\ObjectManagerInterface;

class Testbed extends Command
{
    protected $objectManager;
    public function __construct(ObjectManagerInterface $manager)
    {
        $this->objectManager = $manager;
        parent::__construct();
    }

    protected function getObjectManager()
    {
        return $this->objectManager;
    }
    
    protected function configure()
    {
        $this->setName("ps:tutorial-proxy");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Hello World");  
        
        $service = $this->createService($output);
        
        $this->sayHelloWithFastObject($service, $output);
        $this->sayHelloWithSlowObject($service, $output);
    }
    
    protected function sayHelloWithFastObject($service, $output)
    {
        $output->writeln("About to say hello with fast object");
        $time = microtime(true);
        $service->sayHelloWithFastObject();
        $to_run = microtime(true) - $time;
        $output->writeln("Said hello with fast object, approximate time to load: " . round(($to_run*1000),4) . ' ms');
        $output->writeln('');
    }
    
    protected function sayHelloWithSlowObject($service, $output)
    {
        $time = microtime(true);
        $output->writeln("About to say hello with slow object");    
        $service->sayHelloWithSlowObject();
        $to_run = microtime(true) - $time;
        $output->writeln("Said hello with slow object, approximate time to load: " . round(($to_run * 1000),4) . ' ms');
        $output->writeln('');
    }
    
    protected function createService($output)
    {
        $output->writeln("About to Create Service");
        $om = $this->getObjectManager();
        $time = microtime(true);
        $service = $om->get('Pulsestorm\TutorialProxy1\Model\Example');
        $to_load = microtime(true) - $time;
        $output->writeln("Created Service, aproximate time to load: " . round(($to_load*1000),4) . ' ms');        
        $output->writeln('');
        return $service;    
    }
} 