<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // Validate input
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'], // Use 'name' consistently
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'user_type' => ['required', 'in:alumni,professor'], // Validate user_type
            'role_name' => ['required_if:user_type,alumni,professor', 'string', 'max:255'], 
            'role_lastname' => ['required_if:user_type,alumni,professor', 'string', 'max:255'],
            'role_code' => [
                'required_if:user_type,alumni,professor',
                'string',
                'max:255',
                'unique:profesores,codigo',
                'unique:alumnos,codigo',
            ],
        ])->validate();

       
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'user_type' => $input['user_type'], 
        ]);

        
        if ($input['user_type'] === 'professor') {
            Profesor::create([
                'nombre' => $input['role_name'],
                'apellido' => $input['role_lastname'],
                'codigo' => $input['role_code'],
            ]);
        } elseif ($input['user_type'] === 'alumni') {
            Alumno::create([
                'nombre' => $input['role_name'],
                'apellido' => $input['role_lastname'],
                'codigo' => $input['role_code'],
            ]);
        }

        return $user;
    }
}
