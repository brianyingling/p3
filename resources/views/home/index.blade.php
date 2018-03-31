@extends('layouts.master')

@section('content')
    <h1>Password Generator!</h1>

    <form method="POST" action="/">
        {{csrf_field()}}

        <div class="form-group">
            <label for="number-of-words">Number of Words *required</label>
            <input class='form-control' type="text" name="number-of-words" id="number-of-words">
            
        </div>

        <div class="form-check">
            <input type="checkbox" class='form-check-input' value='' id='has-number'>
            <label for="has-number" class="form-check-label">
                Include a number
            </label>
        </div>

        <div class="form-check">
            <input type="checkbox" class='form-check-input' value='' id='has-symbol'>
            <label for="has-symbol" class="form-check-label">
                Include a symbol
            </label>
        </div>

        <button type='submit' class='btn btn-primary'>
            Generate a password
        </button>   
    </form>

    <div id="result">
        Result goes here
    </div>
@endsection