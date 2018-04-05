@extends('layouts.master')

@section('content')
    <h1>Create a New Password!</h1>

    @if(count($errors) > 0)
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method='POST' action='/'>
        {{csrf_field()}}

        <div class='form-group row'>
            <label for='number-of-words' class='col-sm-3 col-form-label'>
                Number of Words
                <small>*required</small>
            </label>
            <input class='form-control col-sm-9' type='text' name='number-of-words' id='number-of-words'>
            
        </div>

        <div class='form-group row'>
            <div class='col-sm-3'>
                Includes
            </div>
            <div class='col-sm-9'>
                <div class='form-check'>
                    <input type='checkbox' class='form-check-input' id='has-number' name='has-number'>
                    <label for='has-number' class='form-check-label'>
                        Include a number
                    </label>
                </div>
            </div>
        </div>
        
        <div class='form-group row'>
            <div class='col-sm-3'>
            </div>
            <div class='col-sm-9'>
                <div class='form-check'>
                    <input type='checkbox' class='form-check-input' id='has-symbol' name='has-symbol'>
                    <label for='has-symbol' class='form-check-label'>
                        Include a symbol
                    </label>
                </div>
            </div>
        </div>
        
        <div class='form-group row'>
            <label for='delimiter' class='col-form-label col-sm-3'>Choose delimiter</label>
                <select name='delimiter' id='delimiter' class='form-control col-sm-9'>
                    <option value='@'>@</option>
                    <option value='--'>--</option>
                    <option value='|'>|</option>
                </select>
            
        </div>

        <button type='submit' class='btn btn-primary'>
            Generate a password
        </button>   
    </form>

    

    @if($password)
        <div class='alert alert-success' id='result'>
            {{$password}}
        </div>
    @endif
@endsection