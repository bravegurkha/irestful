<?php
namespace iRESTful\Rodson\Domain\Inputs\Authors\Adapters;

interface AuthorAdapter {
    public function fromDataToAuthors(array $data);
    public function fromDataToAuthor(array $data);
}
