<?php
namespace iRESTful\Rodson\Domain\Controllers\Adapters;

interface ControllerAdapter {
    public function fromDataToControllers(array $data);
    public function fromDataToController(array $data);
}
