<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\View;
use App\Contact;

class ContactsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($name)
	{

	}

    public function getStatus()
    {
        return 'status method';
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
    public function getLogin($named)
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email','password');
        $credentials = array_add($credentials,'active',1);

        if(Auth::attempt($credentials))
        {
            $user = Contact::find(Auth::user()->id)->first();
            if($user->hasRole('administrator'))
            {
                return redirect('admin/dashboard');
            }
            else
            {
                return redirect('dashboard');
            }
        }
        else
        {
            return redirect('/')->with('message','Identifiants incorrects');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');

    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($route = null,$id)
	{

        $contact = Contact::find($id);





        $view = ($this->isAdminRequest() ? 'admin.contactshow' : 'contacts.show');

        return view($view)->with('contact',$contact);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
