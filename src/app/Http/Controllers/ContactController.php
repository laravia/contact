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
        $contacts = Contact::orderByDesc('id')->get();
        return view('laravia.contact::admin.index', ['contacts' => $contacts]);
    }

    public function edit(Request $request, $id)
    {
        $contact = Contact::find($id);

        return view('laravia.contact::admin.edit', ['contact' => $contact]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'body' => 'required'
        ]);
        $request->merge(['project'=>Route::current()->project]);
        Contact::create($request->all());
        return back()->with('message', Laravia::trans('core.storeSuccess'));
    }

}
