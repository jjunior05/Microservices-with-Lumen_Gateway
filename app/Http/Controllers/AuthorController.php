<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create one new author
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthors($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one single author
     * @return illuminate\Http\Response
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    /**
     * Update an existing author
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $author), Response::HTTP_OK);
    }


    /**
     * Delete an existing author
     * @return illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
