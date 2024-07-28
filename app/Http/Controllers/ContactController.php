<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $groups = ContactGroup::all();
        $contacts = Contact::with('group')->get();
        return Inertia::render('Contacts/Index', [
            'contacts' => $contacts,
            'groups' => $groups,
        ]);
    }

    public function create()
    {
        $groups = ContactGroup::all();
        return Inertia::render('Contacts/Create', [
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required',
            'group_id' => 'nullable|exists:contact_groups,id',
        ]);

        $contact = Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function show(Contact $contact)
    {
        return Inertia::render('Contacts/Show', [
            'contact' => $contact,
        ]);
    }

    public function edit(Contact $contact)
    {
        $groups = ContactGroup::all();
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact,
            'groups' => $groups,
        ]);
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required',
            'group_id' => 'nullable|exists:contact_groups,id',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
