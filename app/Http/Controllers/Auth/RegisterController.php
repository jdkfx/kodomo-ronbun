<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use DB;

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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'account_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:user_details',
            'password' => 'required|string|min:6|confirmed',
            'display_name' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'account_name' => $data['account_name'],
                'password' => bcrypt($data['password']),
            ]);

            $user->user_detail()->create([
                'user_id' => $user->id,
                'display_name' => $data['display_name'],
                'email' => $data['email'],
                'status' => 99,
                'profile_text' => 'よろしくお願いします。',
                'profile_image' => '未設定',
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        $user_detail = UserDetail::find($user->id);
        $display_name = $user_detail->display_name;
        // Mail::to($user_detail->email)->send(new UserRegistered($display_name));

        return $user;
    }
}
