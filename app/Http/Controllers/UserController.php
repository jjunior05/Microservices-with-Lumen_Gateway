<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
     * Return the list of userss
     * @return illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return $this->validResponse($users, Response::HTTP_OK);
    }

    /**
     * Create one new user
     * @return illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
        $messages = [
            'name.required' => 'Campo name é obrigatório!',
            'email.required' => 'Campo email é obrigatório!',
            'email.email' => 'Campo email é precisa ser válido!',
            'email.unique' => 'Já existe um usuário com este e-mail cadastrado!',
            'password.required' => 'Campo password é obrigatório!',
            'password.min' => 'Campo password precisa ser maior do que 8 caracteres!',
            'password.confirmed' => 'A password precisa ser confirmada!',
        ];


        $this->validate($request, $validate, $messages);
        $fields = $request->all();

        $fields['password'] = Hash::make($request->password);

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    /**
     * Get an instance of user
     * @return illuminate\Http\Response
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        return $this->validResponse($user);
    }

    /**
     * Update an instance of user
     * @return illuminate\Http\Response
     */
    public function update($user, Request $request)
    {

        $validate = [
            'name' => 'max:100',
            'email' => 'email|unique:users,email,' . $user,
            'password' => 'min:8|confirmed',
        ];
        $messages = [
            'email.email' => 'Campo email é precisa ser válido!',
            'email.unique' => 'Já existe um usuário com este e-mail cadastrado!',
            'password.min' => 'Campo senha precisa ser maior do que 8 caracteres!',
            'password.confirmed' => 'A senha precisa ser confirmada!',
        ];

        $this->validate($request, $validate, $messages);

        $user = User::findOrFail($user);

        $user->fill($request->all());

        if ($request->has('password')) {
            $user['password'] = Hash::make($request->password);
        }

        if ($user->isClean()) {
            return $this->errorResponse('Não foi possível alterar nenhum valor com as informações informadas.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    /**
     * Delete an instance of user
     * @return illuminate\Http\Response
     */
    public function destroy($user)
    {

        $user = User::findOrFail($user);
        if (!$user) {
            return $this->errorResponse('Não foi possível encontrar nenhum user com esse ID', Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        $user->delete();

        return $this->validResponse($user);
    }

    public function me(Request $request)
    {
        return $this->validResponse($request->user());
    }
}
