<?php

namespace Test\PostIt;

use PostIt\Application\Application;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    protected $app;

    public function setUp()
    {
        $containerMock = $this->getMockBuilder('PostIt\\Application\\Container')
            ->setMethods(array('get', 'set'))
            ->getMock();

        $containerMock->method('get')
            ->willReturn('bar');

        $routesMock = $this->getMock('\\IteratorAggregate');

        $this->app = new Application($containerMock, $routesMock);
    }

    public function tearDown()
    {
        $this->app = null;
    }

    public function testItProxiesContainerGetCalls()
    {
        $this->assertTrue($this->app->containerGet('foo') === 'bar');
    }
}
