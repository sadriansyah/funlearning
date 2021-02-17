<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
        Validator::make($input, [
            'nim_nip' => ['required', 'string', 'max:90'],
            'nama_user' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'nim_nip' => $input['nim_nip'],
            'nama_user' => $input['nama_user'],
            'email' => $input['email'],
            'hak_akses' => $input['hak_akses'],
            'jumlah_poin' => 0,
            'displaynim' => $input['nim_nip'],
            'exp'=>0,
            'level' => 0,
            'password' => Hash::make($input['password']),
        ]);
    }
}
