<?php namespace App\Http\Requests;

    use App\Http\Requests\Request;

    class CreateOrganisationRequest extends Request {

        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules()
        {
            return [
                    'org_name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|between:3,40',
                    'org_type' => 'required',
                    'org_siren' => 'required',
                     'org_ape_naf' => 'required|alpha_num|size:5',
                     'name' => 'required|min:2',
                     'firstname' => 'required|min:2',
                     'email' => 'required|email',
                     'telephone' => 'required|phone:FR,landline',
                     'mobile' => 'required|phone:FR,mobile',
                     'adress_1' => 'required|max:255',
                     'adress_2' => 'max:255',
                     'zipcode' => 'required|alpha_num|between:4,10',
                     'city' => 'required|alpha|max:150',
                     'country' => 'required|alpha|max:150',
                     'bic' => 'required|bic',
                     'iban' => 'required|iban',
                     'username' => 'unique:contacts'
            ];
        }

    }
