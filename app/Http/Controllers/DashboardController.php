<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Organisation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Contact;
use App\Process;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contact = Contact::with('organisations.processes')->find(Auth::user()->id);

        $orgArray = $contact->organisations->lists('processes');

        $processes = (new Collection($orgArray))->collapse()->unique();

        $contorg = Contact::find(Auth::user()->id)->organisations()->get();


        return view('dashboard.index')->with(['processes' => $processes,'contorg' => $contorg]);
    }

    public function adminIndex()
    {

    }
}