<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\User;

class QuoteController extends Controller
{
    public function show(User $user, Quote $quote)
    {
        return view('quote.show', ['user' => $user, 'quote' => $quote]);
    }
}
