<?php
namespace huerta\Http\Controllers\Auth;
use huerta\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';        //The redirectTo method will take precedence over the redirectTo attribute.
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
     * Redirect to previous url after login
     * 
     * @return void
     */
    protected function redirectTo()         // Modify user navigation.
    { 
        if (Auth::user()->isProducer()) {
            return view('producer.index'); 
        
        } elseif (Auth::user()->isCustomer()) {
            return view('customer.index');
        
        } else return view('home');

    }
}