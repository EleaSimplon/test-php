<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase {

    public function tearDown() :void {
        Mockery::close();
    }
    
    public function testCorrectAverageIsReturned() {

        $temp = $this->createMock('TemperatureService');
        $temp ->expects($this->any())
            ->method('getTemperature')
            ->willReturn(10);
        $weather = new WeatherMonitor($temp);
        $start = 10;
        $end = 10;
        $getTemp = $weather->getAverageTemperature($start, $end);
        
        $this->assertEquals(10 , $getTemp);
    }
    
    public function testCorrectAverageIsReturnedWithMockery() {

        $tempService = Mockery::mock('TemperatureService');
        $tempService->shouldReceive('getTemperature')
                    ->with('12:00')
                    ->andReturn(20);
        $tempService->shouldReceive('getTemperature')
                    ->with('14:00')
                    ->andReturn(26);
        $weatherMonitor = new WeatherMonitor($tempService);

        $this->assertEquals(23, $weatherMonitor->getAverageTemperature('12:00', '14:00'));
    }       
}