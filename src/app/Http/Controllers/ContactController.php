<?php

namespace Laravia\Contact\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravia\Contact\App\Models\Contact;
use Laravia\Core\App\Laravia;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderByDesc('id')->with('tags')->get();
        return view('laravia.contact::admin.index', ['contacts' => $contacts]);
    }

    public function edit(Request $request, $id)
    {
        $contact = Contact::with('tags')->find($id);

        return view('laravia.contact::admin.edit', ['contact' => $contact]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        $request->merge(['user_id' => auth()->user()->id]);
        $contact = Contact::create($request->all());
        $contact->addTags($request->get('tags'));
        return back()->with('message', Laravia::trans('core.storeSuccess'));
    }

}
