<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\RolesHasUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
            'name' => ['required', 'string','min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'country' => ['required', 'string', 'max:50'],
            'street' => ['required', 'string', 'max:50'],
            'flat' => ['required', 'string', 'max:10'],
            'postcode' => ['required', 'string','min:6', 'max:6'],
            'city' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'numeric', 'digits:9'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return void
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'country' => $data['country'],
            'street' => $data['street'],
            'flat' => $data['flat'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        RolesHasUsers::create([
            'users_id' => $user->id,
            'roles_id' => 1,
        ]);

        return $user;
    }



}
