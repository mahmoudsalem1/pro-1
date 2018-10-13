<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Contact as ContactRequest;
use App\Models\Contact;
class ContactController extends Controller
{
    public function showContact()
    {
    	return view('site.page.contact');
    }

    public function sendContact(ContactRequest $request)
    {
    	$inputs = $request->only(['name', 'phone', 'message', 'title', 'email']);
    	Contact::create($inputs);
    	 if(!session()->has('thanks')){
            session()->put('thanks', trans('site.sent_success'));
        }
        return redirect(route('site.thanks'));
    }

    public function thanks()
    {
        if(session()->has('thanks')){
            $text = session()->get('thanks');
            session()->forget('thanks');
            return view('site.page.thanks', compact('text'));
        }
        return redirect(url('/'));
    }

    public function closed()
    {
    	return getSettings('website_status', true) == 0 ? view('site.page.closed') : redirect('/');
    }
}
