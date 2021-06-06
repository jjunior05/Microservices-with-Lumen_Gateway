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

    public function _construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }
}
