<?php
namespace Pulsestorm\TutorialProxy1\Model;
class SlowLoading
{
    public function __construct()
    {
        echo "Constructing SlowLoading Object","\n";
        //simulate slow loading object with sleep
        sleep(3);
    }
    
    public function hello()
    {
        echo "Hello","\n";
    }
    
    public function goodbye()
    {
        echo "Goodbye","\n";
    }    
}