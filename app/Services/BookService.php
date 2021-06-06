<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
    use ConsumesExternalService;

    /**
     * The base URI to consume the books services
     * @var string
     */
    public $baseUri;

    public function _construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}
