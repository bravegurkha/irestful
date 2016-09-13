<?php
namespace iRESTful\Rodson\Tests\Inputs\Helpers\Objects;
use iRESTful\Rodson\Domain\Inputs\Projects\Codes\Code;

final class CodeHelper {
    private $phpunit;
    private $codeMock;
    public function __construct(\PHPUnit_Framework_TestCase $phpunit, Code $codeMock) {
        $this->phpunit = $phpunit;
        $this->codeMock = $codeMock;
    }

    public function expectsGetClassName_Success($returnedClassName) {
        $this->codeMock->expects($this->phpunit->once())
                        ->method('getClassName')
                        ->will($this->phpunit->returnValue($returnedClassName));
    }

}
