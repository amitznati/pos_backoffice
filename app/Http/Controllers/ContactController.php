<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Repositories\ContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Person;
use App\Models\Contact;
use App\Models\Address;

class ContactController extends AppBaseController
{
    /** @var  ContactRepository */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepo)
    {
        $this->contactRepository = $contactRepo;
    }

    /**
     * Display a listing of the Contact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactRepository->pushCriteria(new RequestCriteria($request));
        $contacts = $this->contactRepository->all();

        return view('contacts.index')
            ->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created Contact in storage.
     *
     * @param CreateContactRequest $request
     *
     * @return Response
     */
    public function store(CreateContactRequest $request)
    {
        $input = $request->all();
        
        $this->validate($request,array(
        		'first_name'       => 'required|max:50|min:2',
        		'last_name'        => 'required|max:50|min:2',
        		'identifier'       => 'required|min:4|max:50|unique:persons,identifier',
        ));
        
        //Contact
        $contact = new Contact();
        $contact->save();
        //Person
        $person = new Person($input);
        $person->personable()->associate($contact);
        $person->save();
        //Address
        $address = new Address($input);       
        $address->addressable()->associate($person);
        $address->save();

        Flash::success('Contact saved successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified Contact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }
        $contact->load('person.address');
        return view('contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  int              $id
     * @param UpdateContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactRequest $request)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }
        
        $input = $request->all();
        
        if($contact->person->identifier != $input->identifier)
        {
        	$identifier_validation = 'required|min:4|max:50|unique:persons,identifier';
        }
        else
        {
        	$identifier_validation = '';
        }
        $this->validate($request,array(
        		'first_name'       => 'required|max:50|min:2',
        		'last_name'        => 'required|max:50|min:2',
        		'identifier'       => $identifier_validation,
        ));

        //Person
        $contact->person->update($input);
        
        //Address
        $contact->person->address->update($input);

        Flash::success('Contact updated successfully.');

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified Contact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->contactRepository->findWithoutFail($id);

        if (empty($contact)) {
            Flash::error('Contact not found');

            return redirect(route('contacts.index'));
        }

        $this->contactRepository->delete($id);

        Flash::success('Contact deleted successfully.');

        return redirect(route('contacts.index'));
    }
}
