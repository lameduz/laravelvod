<?php namespace App\Http\Controllers;

    //use App\Http\Requests\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Routing\Route;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Request;
    // FORM REQUEST //
    use App\Http\Requests\CreateOrganisationRequest;
    // MODEL //
    use App\Organisation;
    use App\Site;
    use App\Contact;
    use App\Country;
    use App\Process;
    use App\Bankaccount;
    use App\Role;
    use Illuminate\Support\Facades\View;
    use Mail;
    use App;
    use Auth;


    class OrganisationsController extends Controller {

        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            //$org = Organisation::all();

            $organisations = Organisation::with('contacts','processes')->get();







            return view('organisations.orglist')->with(['org' => $organisations]);
        }

        /**
         * Méthode pour accéder au formulaire qui permettra l'ajout d'un ressource en base de données
         *
         * @return Response
         */
        public function create($route)
        {
            $country = Country::all();
            return view('organisations.create')->with(['country' => $country,'subdomain' => $route ]);
        }


        /**
         * Methode qui enregistre une nouvelle resource en base de données
         *
         * @return Response
         */

        public function store(CreateOrganisationRequest $request, $route)
        {
            $org = new Organisation($request->except('name','firstname','email','function','telephone','mobile','bic','iban'));
            $site = new Site($request->only('adress_1','adress_2','zipcode','city','country'));
            $contact = new Contact($request->only('name','firstname','email','function','telephone','mobile'));
            $bankaccount = new Bankaccount($request->only('iban','bic'));
            $process = new Process(['name' => 'Ouverture de compte','status' => 0]);

            $org->save();
            $site->name = 'Siège';
            $site->siref = $org->org_siren;
            $i = 1;

            // On fait une requête en base de données pour savoir si un utilisateur avec le même nom existe déjà.
            // exemple : Si MZ1-VODO existe déjà, on ajoute un MZ2-VODO.

            $checkcontact = Contact::where('username','LIKE','%'. substr($this->usernameGen(Request::input('firstname'), Request::input('name'), Request::input('org_name'),$i),0,2) . '%')->get();

            // Si oui on incrémente le compteur de son username

            if($checkcontact)
            {
                $contact->username = $this->usernameGen(Request::input('firstname'), Request::input('name'), Request::input('org_name'),$checkcontact->count() + 1);
            }
            else
            {
                $contact->username = $this->usernameGen(Request::input('firstname'), Request::input('name'), Request::input('org_name'),1);
            }
            $contact->password = $plainpwd = bcrypt($this->passwordGenerator(10));
            $contact->confirmtoken = $token = md5( uniqid(mt_rand(), true) );

            $contact->save();
            $org->processes()->save($process);
            $org->bankaccount()->save($bankaccount);
            $org->sites()->save($site);
            $org->contacts()->attach($contact->id);
            $contact->roles()->attach(2);


            mkdir('storage/'. $org->id .'/documents/archives/ouverture-de-compte',0777,true);

            // Envoi du mail de confirmation

            Mail::send('emails.confirm',['firstname' => Request::input('firstname'),'username' => $contact->username,'password' => $plainpwd,'token' => $token, 'subdomain' => $route ],function($message)
            {
                $message->to(Request::input('email'))->subject("Confirmation d'ouverture de compte client");
            });

            return redirect('confirmation-requise')->with('message','Veuillez verifier vos mails afin de confirmer la création de votre compte utilisateur');

        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return Response
         */
        public function show($route = null,$id)
        {
            $org = Organisation::find($id);

            $view = ($this->isAdminRequest()) ? 'admin.showorga' : 'organisations.show';

            return view($view)->with(['organisation' => $org]);
        }

        public function usernameGen($firstname,$name,$corp,$i)
        {
            return substr($name,0,1) . substr($firstname,0,1) . $i . '-' . $corp;
        }

        /**
         * @param $route
         * @param $id
         * @return mixed
         */

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return Response
         */
        public function edit($id)
        {

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

        function passwordGenerator($chars = 8) {
            $letters = 'abcefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            return substr(str_shuffle($letters), 0, $chars);
        }

        public function confirm($route = null, $token)
        {
            $contact =  Contact::where('confirmtoken','=', $token)->first();
            if($token === $contact->confirmtoken)
            {
                $contact->active = 1;
                $contact->save();
            }
            return redirect('password/email')->with('message','Pour des raisons de sécurité, veuillez redéfinir votre mot de passe');
        }

        public function passGen($firstname,$name,$country)
        {
            return strtolower(substr($firstname,0,1)) . strtolower(substr($name,0)) . strtoupper(substr($country,0,2));
        }

        public function loadSettings()
        {
            ;
        }
    }
