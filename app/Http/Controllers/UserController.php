<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Monolog\Handler\SyslogUdp\UdpSocket;
use Request;


class UserController extends Controller
{
    public function registerShow()
    {
        return view('PersonlCenter/Register');
    }

    public function register()
    {
        //return 'nihao';
        $input = Request::all();

        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];

        $re = User::create($input);

        if($re){
            $data = [
                'status' => 0,
                'msg' => '注册成功！',
            ];
        }
        else{
            $data = [
                'status' => 1,
                'msg' => '注册失败!',
            ];
        }

        return $data;
    }

    public function loginShow()
    {
        return view('PersonlCenter/Login');
    }

    public function login()
    {
        $input = Request::all();
        $email = $input['email'];
        $pwd = $input['password'];
        $re = User::where(['email'=>$email,'password'=>$pwd])->first();

        if($re){

            session(['loginState' => '1']);
            session(['name' => $re['name']]);
            session(['email' => $re['email']]);
            session(['password' => $re['password']]);

            $data = [
                'status' => 0,
                'msg' => '登录成功！',
            ];
        }
        else{

            session(['loginState' => '0']);

            $data = [
                'status' => 1,
                'msg' => '登录失败!',
            ];
        }

        return $data;
    }

    public function signOut()
    {
        session(['loginState' => '0']);
        session(['name' => '']);
        session(['email' => '']);
        session(['password' => '']);
    }

}
