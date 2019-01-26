<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use View;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required',
            'password' => 'required',
            'ta' => 'required',
        ]);
        // $skpd = DB::select('select users.skpd_id, skpd.nmaSKPD from skpd, users where skpd.id = users.skpd_id
        // and users.email = "' . $request->email . '"');
        // foreach ($skpd as $instansi) {
        //   $request->session()->put('kodeSKPD',$instansi->skpd_id);
        //   $request->session()->put('namaSKPD',$instansi->nmaSKPD);
        // }
        // View::share('skpd',$instansi->nmaSKPD);
        // $request->session()->put('tahun_anggaran',$request->ta);

    }
    protected function attemptLogin(Request $request)
    {
        if (!is_null($request->thn)) {
            
        }
        // $request->add(['status' => 'A']);
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        if (!is_null($request->ta)) {
            $request->session()->put('thn_anggaran',$request->ta);
        }
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
}
