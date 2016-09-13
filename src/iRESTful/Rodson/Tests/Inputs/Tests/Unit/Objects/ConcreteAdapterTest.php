<?php
namespace iRESTful\Rodson\Tests\Inputs\Tests\Unit\Objects;
use iRESTful\Rodson\Infrastructure\Inputs\Objects\ConcreteAdapter;
use iRESTful\Rodson\Domain\Inputs\Projects\Converters\Exceptions\ConverterException;

final class ConcreteAdapterTest extends \PHPUnit_Framework_TestCase {
    private $typeMock;
    private $methodMock;
    public function setUp() {
        $this->typeMock = $this->getMock('iRESTful\Rodson\Domain\Inputs\Projects\Types\Type');
        $this->methodMock = $this->getMock('iRESTful\Rodson\Domain\Inputs\Projects\Codes\Methods\Method');
    }

    public function tearDown() {

    }

    public function testCreate_withFromType_Success() {

        $adapter = new ConcreteAdapter($this->methodMock, $this->typeMock);

        $this->assertEquals($this->methodMock, $adapter->getMethod());
        $this->assertTrue($adapter->hasFromType());
        $this->assertEquals($this->typeMock, $adapter->fromType());
        $this->assertFalse($adapter->hasToType());
        $this->assertNull($adapter->toType());


    }

    public function testCreate_hasToType_Success() {

        $adapter = new ConcreteAdapter($this->methodMock, null, $this->typeMock);

        $this->assertEquals($this->methodMock, $adapter->getMethod());
        $this->assertFalse($adapter->hasFromType());
        $this->assertNull($adapter->fromType());
        $this->assertTrue($adapter->hasToType());
        $this->assertEquals($this->typeMock, $adapter->toType());

    }

    public function testCreate_Success() {

        $adapter = new ConcreteAdapter($this->methodMock, $this->typeMock, $this->typeMock);

        $this->assertEquals($this->methodMock, $adapter->getMethod());
        $this->assertTrue($adapter->hasFromType());
        $this->assertEquals($this->typeMock, $adapter->fromType());
        $this->assertTrue($adapter->hasToType());
        $this->assertEquals($this->typeMock, $adapter->toType());

    }

    public function testCreate_withoutTypes_throwsConverterException() {

        $asserted = false;
        try {

            new ConcreteAdapter($this->methodMock);

        } catch (ConverterException $exception) {
            $asserted = true;
        }

        $this->assertTrue($asserted);

    }

}
