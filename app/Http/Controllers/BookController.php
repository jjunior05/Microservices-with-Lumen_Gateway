<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * The service for consume the books microservice
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return the list of books
     * @return illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create one new book
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Get an instance of book
     * @return illuminate\Http\Response
     */
    public function show($book)
    {
    }

    /**
     * Update an instance of book
     * @return illuminate\Http\Response
     */
    public function update($book, Request $request)
    {
    }

    /**
     * Delete an instance of book
     * @return illuminate\Http\Response
     */
    public function destroy($book)
    {
    }
}
