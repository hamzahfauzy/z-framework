<?php
namespace app\controllers\Auth;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;

class AuthController extends Controller
{

	function login()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : '';
		return $this->view->render('auth.login')->with("error",$error);
	}

	function doLogin(Request $request)
	{
		$user = User::where('username',$request->username)->where('password',md5($request->password))->first();
		if(!empty($user))
		{
			Session::set('id',$user->id);
			$this->redirect()->url('/login');
			return;
		}

		$this->redirect()->url('/login',['error' => 'not_valid']);
		return;
	}

	function register()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : '';
		return $this->view->render('auth.register')->with("error",$error);
	}

	function doRegister(Requets $request)
	{
		$user = User::where("username",$request->username)->first();
		if(!empty($user))
		{
			$this->redirect()->url('/register',['error' => 'exists']);
			return;
		}

		$user = new User;
		$user->save([
			'name' => $request->name,
			'username' => $request->username,
			'password' => md5($request->password),
		]);

		$this->redirect()->url('/login',['success' => 1]);
		return;
	}

	function logout(Request $request)
	{
		Session::destroy();
		$this->redirect()->url('/');
	}

}