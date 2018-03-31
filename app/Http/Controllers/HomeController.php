<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hackzilla\PasswordGenerator\Generator\HybridPasswordGenerator;
use Hackzilla\PasswordGenerator\RandomGenerator\Php7RandomGenerator;


class HomeController extends Controller {

    public function index($password = '') {
        return 
            view('home.index')
                ->with(['password' => $password]);
    }

    public function store(Request $request) {
        // validation
        $this->validate($request, [
            'number-of-words' => 'required|integer|min:1|max:6'
        ]);

        $numberOfWords = $request->input('number-of-words');
        $hasNumber =$request->has('has-number');
        $hasSymbol = $request->has('has-symbol');

        $generator = new HybridPasswordGenerator();

        $generator
            ->setRandomGenerator(new Php7RandomGenerator())
            ->setNumbers(false)
            ->setSymbols(false)
            ->setSegmentLength(3)
            ->setSegmentCount(4);
        
        $password = $generator->generatePassword(1);

        return redirect('/')->with('password', $password);
            
        // dump($request);
    }
}