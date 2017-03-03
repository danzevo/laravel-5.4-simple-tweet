<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\tweet;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$tweet = tweet::with('user')->get();
				
        return view('home', ['tweet' => $tweet]);
    }
	
	public function store(request $request)
	{
		$this->validate($request, [
			'update_status' => 'required'
		]);
		
		$tweet = new tweet;
		
		$tweet->text = $request->update_status;
		$tweet->user_id = Auth::user()->id;
		$tweet->save();
		
		return redirect('home');
	}
	
	public function profile()
	{
		return view('profile');
	}
	
	public function save_profile(request $request)
	{
		$this->validate($request, [
			'name'	=> 'required|min:4',
			'email'	=> 'required|email',
			'password' => 'required|min:5'
		]);
		
		$tweet = User::find(Auth::user()->id);
		$tweet->name = $request->name;
		$tweet->email = $request->email;
		$tweet->password = bcrypt($request->password);
		$tweet->save();
		
		return redirect('home/profile');
	}
}
