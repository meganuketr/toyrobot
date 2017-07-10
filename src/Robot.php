<?php

class Robot
{

    private $forward;

    private $posX;

    private $posY;

    private $maxX;

    private $maxY;
                                    
    private $isPlaced = false;
    
    private $cardinalPoints = ['NORTH', 'EAST', 'SOUTH', 'WEST'];
    
    const MAXCARDINALPOINT = 3;

    public function __construct($maxX, $maxY)
    {
        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }

    function place($x, $y, $forward)
    {
        if ($x < 0 || $x > $this->maxX || $y < 0 || $y > $this->maxY) {
            $this->isPlaced = false;
        } else {
            $this->isPlaced = true;
            $this->forward = $forward;
            $this->posX = $x;
            $this->posY = $y;
        }
    }
    
    function left() 
    {
        $this->rotate('left');
    }
    
    function right() 
    {
        $this->rotate('right');
    }

    function move()
    {
        if ($this->isPlaced) {
            switch ($this->forward) {
                case 'NORTH':
                    $this->internalMove(0, 1);
                    break;
                case 'SOUTH':
                    $this->internalMove(0, -1);
                    break;
                case 'EAST':
                    $this->internalMove(1, 0);
                    break;
                case 'WEST':
                    $this->internalMove(-1, 0);
                    break;
            }
        }
    }
    
    private function rotate($direction)
    {
        $currentDirection = array_search($this->forward, $this->cardinalPoints);
        if ($direction == 'left') {
            $currentDirection--;
            if ($currentDirection < 0) $currentDirection = MAXCARDINALPOINT;
        } else {
            $currentDirection++;
            if ($currentDirection > MAXCARDINALPOINT) $currentDirection = 0;            
        }
        
        $this->forward = $this->cardinalPoints[$currentDirection];        
    }
    
    private function internalMove($x, $y)
    {
        if (($this->posX + $x >= 0) && ($this->posX + $x <= $this->maxX))
            $this->posX += $x;
        if (($this->posY + $y >= 0) && ($this->posY + $y <= $this->maxY))
            $this->posY += $y;
    }

    function getReport()
    {
        if ($this->isPlaced) 
            return [$this->posX, $this->posY, $this->forward];      
        else
            return null;
    }
}
