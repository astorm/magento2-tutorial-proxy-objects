<?php
namespace Pulsestorm\TutorialProxy1\Model;
class Example
{
    protected $fast;
    protected $slow;
    public function __construct(FastLoading $fast, SlowLoading $slow)
    {
        $this->fast = $fast;
        $this->slow = $slow;
    }
}