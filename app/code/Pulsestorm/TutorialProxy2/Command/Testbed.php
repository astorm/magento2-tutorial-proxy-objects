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
        
        $om = $this->getObjectManager();
        
        
        $output->writeln("About to Create Service");
        $time = microtime(true);
        $service = $om->get('Pulsestorm\TutorialProxy1\Model\Example');
        $to_load = microtime(true) - $time;
        $output->writeln("Created Service, aproximate time to load: " . round($to_load, 4) . ' seconds');
        
        
        
    }
} 