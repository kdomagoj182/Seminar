@extends('layouts.layout')

@section('title', 'Unos novog korisnika')

@section('content')


<div style="text-align:center">
<h1>Unos novog korisnika</h1>

<strong>Napomena: Sva polja su obavezna!</strong>
  <p align="center">
      <button class="button" style="border-radius: 20px"><a href="{{ route('home') }}">Početna stranica</a></button>
  </p>
</div>

  <form method="post" action="{{ route('clients.store') }}" enctype="multipart/form-data">
    <div class="row" >
      <div class="column">
      @csrf
    Ime:<br>
    <input type="text" id="name" name="name" value="{{ old('name') }}" align="center">
    <br>
    Prezime:<br>
    <input type="text" id="surname" name="surname" value="{{ old('surname') }}">
    <br>
    Datum rođenja:<br>
    <input type="date" id="birthday" name="birthday" value="{{ old('birthday') }}">
    <br>
    OIB:<br>
    <input type="number" id="oib" name="oib" value="{{ old('oib') }}">
    <br>
  </div>
  <div class="column">
    Adresa stanovanja:<br>
    <input type="text" id="address" name="address" value="{{ old('address') }}">
    <br>
    Kućni broj:<br>
    <input type="number" id="homenumber" name="homenumber" value="{{ old('homenumber') }}">
    <br>
    Grad:<br>
    <input type="text" id="hometown" name="hometown" value="{{ old('hometown') }}">
    <br>
    <br>
    <button class="button btn btn-primary">Spremi</button>
  </div>
</div>
</form>
<br>
<br>
<div style="text-align:center; display=inline-block">
@if(count($errors)>0)
@foreach($errors->all() as $error)
<button type="button" class="btn btn-danger btn-sm">{{ $error }}</button>
@endforeach
@endif
</div>
@endsection
