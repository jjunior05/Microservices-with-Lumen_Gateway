<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    /**
     * Return the list of books
     * @return illuminate\Http\Response
     */
    public function index()
    {
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
