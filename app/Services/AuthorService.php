<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * The base URI to consume the authors services
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    /**
     * Obtain the full list of authors service
     * @return string
     */
    public function obtainAuthors()
    {

        return $this->performRequest('GET', '/authors');
    }
}
