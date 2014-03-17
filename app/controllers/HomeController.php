 <?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex() {
		return View::make('dashboard');
	}

	public function getLogin() {
		return View::make('login');
	}

	public function getRegister() {
		return View::make('register');
	}

	public function postLogin() {

		// get all input values and store them into $input
		$input = Input::all();

		// rules for validation
		$rules = array(
			'email' => 'required|email',
			'password' => 'required|alpha_num|min:4'
		);

		// run the validation rules on the inputs on the log in form
		$validator = Validator::make($input, $rules);

		// if validator fails, send back all errors and redirect to the log in form
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator);
		}
		else {
			$credentials = array(
				'email' => $input['email'],
				'password' => $input['password']
			);

			if (Auth::attempt($credentials)) {
				Session::put('sequences_num', 0);
				return Redirect::to('/');
			}
			else {
				return Redirect::to('login');
			}
		}

	}

	public function postRegister() {

		// get all input values and store them into $input
		$input = Input::all();

		// rules for validation
		$rules = array(
			'username' => 'required|alpha_num',
			'email' => 'required|email|unique:users',
			'password' => 'required|alpha_num|min:4'
		);

		// run the validation rules on the inputs on the registration form
		$validator = Validator::make($input, $rules);

		if ($validator->fails()) {
			return Redirect::to('register')->withErrors($validator);
		}
		else {
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User;
			$user->email = $input['email'];
			$user->username = $input['username'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}
		
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('login');
	}

}