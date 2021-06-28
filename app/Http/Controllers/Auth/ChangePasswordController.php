<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class ChangePasswordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    protected function validator(array $data){
      return Validator::make($data, [
          'new_password' => 'required|string|min:6|confirmed',
      ]);
    }


    public function edit(){
        return view('auth.passwords.edit')
                ->with('user', \Auth::user());
    }

    public function update(Request $request){
        if ($request->id != \Auth::user()->id) {
            return redirect('/home')
                ->with('warning', '致命的なエラーです');
        }
        $user = \Auth::user();
        if (!password_verify($request->current_password, $user->password)) {
        return redirect('/password/change')
            ->with('warning', 'パスワードが違います');
        }
        $this->validator($request->all())->validate();
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect('/home')
                ->with('status', 'パスワードを変更しました');
    }
}
