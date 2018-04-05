<?php

namespace App\Http\Controllers;

use Hackzilla\PasswordGenerator\Generator\HybridPasswordGenerator;
use Hackzilla\PasswordGenerator\RandomGenerator\Php7RandomGenerator;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $password = $request->session()->get('password');
        return
        view('home.index')
            ->with(['password' => $password]);
    }

    public function store(Request $request)
    {
        // validation
        $this->validate($request, [
            'number-of-words' => 'required|integer|min:1|max:6',
        ]);

        $numberOfWords = (int) $request->input('number-of-words');
        $hasNumber = (boolean) $request->has('has-number');
        $hasSymbol = (boolean) $request->has('has-symbol');
        $delimiter = $request->input('delimiter');

        $generator = new HybridPasswordGenerator();

        $generator
            ->setRandomGenerator(new Php7RandomGenerator())
            ->setNumbers($hasNumber)
            ->setSymbols($hasSymbol)
            ->setSegmentLength(3)
            ->setSegmentCount($numberOfWords)
            ->setSegmentSeparator($delimiter);

        $password = $generator->generatePassword(1);

        return redirect('/')
            ->with(['password' => $password]);
    }
}
