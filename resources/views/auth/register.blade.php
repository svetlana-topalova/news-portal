@extends('front.template')

@section('body')
{!! Form::open(array('url' => 'auth/register', 'method' => 'post')) !!}
{!!Form::label('name','Name')!!}
{!!Form::text('name', null,array('class' => 'form-control'))!!}
{!!Form::label('email','Email')!!}
{!!Form::text('email', null,array('class' => 'form-control'))!!}
{!!Form::label('password','Password')!!}
{!!Form::password('password',array('class' => 'form-control'))!!}
{!!Form::label('password_confirmation','Confirm Password')!!}
{!!Form::password('password_confirmation',array('class' => 'form-control'))!!}
{!!Form::submit('Login', array('class' => 'btn btn-primary'))!!}
{!! Form::close() !!}

@endsection