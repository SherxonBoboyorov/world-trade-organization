<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Callback;
use App\Models\Options;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact()
    {

        $options = Options::orderBy('created_at', 'DESC')->get();
        return view('front.contact', compact('options'));
    }


         /**
     * @throws ValidationException
     */
    public function saveCallback(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'content' => 'required'
        ])->validate();

        if (Callback::create($request->all())) {
            return back()->with('message', 'Your application has been successfully sent');
        }
        return back()->with('message', 'unable to sending');


    }
}
