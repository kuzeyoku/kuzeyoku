<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            "email" => "required|email|unique:newsletters,email"
        ]);

        if ($request->errors()) {
            return redirect()->back()->with("error", "You have already subscribed to our newsletter.");
        }

        Newsletter::create([
            "email" => $request->email
        ]);


        return redirect()->back()->with("success", "Thank you for subscribing to our newsletter.");
    }
}
