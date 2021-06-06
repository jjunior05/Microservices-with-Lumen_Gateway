<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service for consume the authors microservice
     * @var AuthorService
     */
    public $authorService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors
     * @return illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Create one new author
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Obtains and show on author
     * @return illuminate\Http\Response
     */
    public function show($author)
    {
    }

    /**
     * Update an existing author
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
    }


    /**
     * Delete an existing author
     * @return illuminate\Http\Response
     */
    public function destroy($author)
    {
    }
}
