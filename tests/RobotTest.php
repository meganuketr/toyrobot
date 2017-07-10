<?php
require_once __DIR__ . '/../src/Robot.php';

use PHPUnit\Framework\TestCase;

class RobotTests extends TestCase 
{
    
    public function testCanBeCreated() 
    {
        $this->assertInstanceOf(
            Robot::class,
            new Robot(5,5)
            );
    }
    
    public function testCanBePlaced()
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'NORTH');
        
        $report = $robot->getReport();
        
        $this->assertEquals([0,0, 'NORTH'], $report);
    }
    
    public function testCantBePlacedInInvalidPosition()
    {
        $robot = new Robot(5, 5);
        $robot->place(10,0, 'NORTH');
        
        $report = $robot->getReport();
        
        $this->assertNull($report);        
    }
    
    public function testWillNotFallFromTable()
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'WEST');
        
        $robot->move();
        
        $report = $robot->getReport();
        $this->assertEquals([0, 0, 'WEST'], $report);
    }
    
    public function testMove()
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'NORTH');
        
        $robot->move();
        
        $report = $robot->getReport();
        $this->assertEquals([0, 1, 'NORTH'], $report);
        
    }
    
    public function testMoveSixTimesAndNotFall()
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'NORTH');
        
        $robot->move();
        $robot->move();
        $robot->move();
        $robot->move();
        $robot->move();
        $robot->move();
        
        $report = $robot->getReport();
        $this->assertEquals([0, 5, 'NORTH'], $report);        
    }
    
    public function testCanRotate() 
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'NORTH');
        
        $robot->right();
        
        $report = $robot->getReport();
        $this->assertEquals([0, 0, 'EAST'], $report);   
    }
    
    public function testCanRotateLeft()
    {
        $robot = new Robot(5, 5);
        $robot->place(0,0, 'NORTH');
        
        $robot->left();
        
        $report = $robot->getReport();
        $this->assertEquals([0, 0, 'WEST'], $report);
    }
}
