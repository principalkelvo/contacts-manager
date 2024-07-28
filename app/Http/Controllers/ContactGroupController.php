<?php

namespace App\Http\Controllers;

use App\Models\ContactGroup;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactGroupController extends Controller
{
    public function index()
    {
        $groups = ContactGroup::all();
        return Inertia::render('Groups/Index', [
            'groups' => $groups,
        ]);
    }

    public function create()
    {
        return Inertia::render('Groups/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:contact_groups,name',
        ]);

        ContactGroup::create($request->all());

        return redirect()->route('contact_groups.index')->with('success', 'Contact group created successfully.');
    }

    public function show(ContactGroup $group)
    {
        return Inertia::render('Groups/Show', [
            'group' => $group,
        ]);
    }

    public function edit(ContactGroup $group)
    {
        return Inertia::render('Groups/Edit', [
            'group' => $group,
        ]);
    }

    public function update(Request $request, ContactGroup $group)
    {
        $request->validate([
            'name' => 'required|unique:contact_groups,name,' . $group->id,
        ]);

        $group->update($request->all());

        return redirect()->route('contact_groups.index')->with('success', 'ContactGroup updated successfully.');
    }

    public function destroy(ContactGroup $group)
    {
        $group->delete();

        return redirect()->route('contact_groups.index')->with('success', 'ContactGroup deleted successfully.');
    }
}
