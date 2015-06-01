<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\CreateFileRequest;
use Auth;
use App\Contact;
use App\Organisation;
use App\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;


class ContactsOrganisationsController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $contact = Contact::findOrFail(Auth::user()->id);

        return view('organisations.orgdropdown', ['contact' => $contact]);
	}


    public function formToPrint($route = null, $id)
    {
        $contact = Contact::find(Auth::user()->id);

        $organisations = $contact->organisations()->where('organisation_id','=',$id)->firstOrFail()->toArray();

        $bankaccount = Organisation::find($id)->bankaccount()->get()->first();
        return view('organisations.recap')->with(['contact' => $contact,'organisations' => $organisations,'bankaccount' => $bankaccount]);
    }

    public function sepaToPrint($route = null, $id)
    {
        $contact = Contact::find(Auth::user()->id);

        $organisations = $contact->organisations()->where('organisation_id','=',$id)->firstOrFail()->toArray();

        $bankaccount = Organisation::find($id)->bankaccount()->get()->first();
        return view('organisations.sepa')->with(['contact' => $contact, 'organisations' => $organisations,'bankaccount' => $bankaccount]);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

    public function anyUpload($route, $contactId,$orgId, CreateFileRequest $request)
    {
        $dir = 'storage/'.$orgId.'/documents/ouverture-de-compte';
        $archive = 'storage/'.$orgId.'/documents/archives/ouverture-de-compte';

        $org = Organisation::find($orgId);

        if($request->isMethod('post'))
        {
            foreach($request->file() as $name => $file)
            {
                $f = new File();

                $extension = $file->getClientOriginalExtension();
                $fullPath = $dir.'/'.$name.'.'.$extension;

                //DEPLACE LE FICHIER UPLOADER SUR LE DISK LOCAL//
                if(file_exists($dir.'/'.$name.'.'.$extension))
                {
                    $oldFile = File::where('path',$fullPath)->get()->first();

                    if(!file_exists($archive))
                    {
                        mkdir($archive,0777,true);
                    }
                    rename($oldFile->path, $archive .'/' . date('Y-m-d H-i-s').'_'.$name .'.'.$extension);
                    $oldFile->path = $archive . '/' . $name . '.' . $extension;
                    $oldFile->archived = 1;
                    $oldFile->save();
                }

                    $file->move($dir, $name .'.'. $extension);

                    //AJOUT EN BASE DONNES DES INFORMATIONS RELATIVES AUX FICHIERS//

                    $f->name = $name;
                    $f->mime = $file->getClientMimeType();
                    $f->extension = $extension;
                    $f->path = $dir .'/'. $name .'.'. $extension;

                    $org->files()->save($f);
            }
        }
        return view('upload.uploadform')->with(['domain' => $route,'contactId' => $contactId, 'orgId' => $orgId]);
    }
	public function create()
	{
		//
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
		$contact = Contact::find(Auth::user()->id);

        $organisation = $contact->organisations()->where('id',$id)->get()->first();
        return view('organisations.show')->with(['organisation' => $organisation]);
	}

    public function fileManager($route = null,$id)
    {
        $archive = 'storage/'.$id.'/documents/ouverture-de-compte';

        $org = Organisation::findOrFail($id);
        $files = $org->files()->whereArchived(0)->get();

        return view('admin.orgfiles')->with(['files' => $files,'path' => $archive]);
    }
    public function downloadFile($route, $filename)
    {
        $filentry = File::where(['name' => $filename,'archived' => 0])->firstOrFail();
        $header = ['Content-Type' => $filentry->mime];
        $file = Storage::disk('local2')->get($filentry->path);
        $filename = $filentry->name.'.'.$filentry->extension;
        return Response()->download($filentry->path,$filename,$header);
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
