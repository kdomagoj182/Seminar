@extends('layouts.layout')
@section('title', 'Uredi podatke')
@section('content')

<div style="text-align:center">
  <h1>Promjena osobnih podataka korisnika</h1>
    <p align="center">
      <button class="button" style="border-radius: 20px"><a href="{{ route('home') }}" style="float-right">Početna stranica</a></button>
    </p>
</div>

    <form method="post" action="{{ route('clients.update', $client) }}" enctype="multipart/form-data">
      @csrf
      <div class="row" >
        <div class="column">
        Ime:<br>
        <input type="text" id="name" name="name" value="{{ $client->name }}" align="center">
        <br>
        Prezime:<br>
        <input type="text" id="surname" name="surname" value="{{ $client->surname }}">
        <br>
        Datum rođenja:<br>
        <input type="date" id="birthday" name="birthday" value="{{ $client->birthday }}">
        <br>
        OIB:<br>
        <input type="number" id="oib" name="oib" value="{{ $client->oib }}">
      </div>
        <div class="column">
        Adresa stanovanja:<br>
        <input type="text" id="address" name="address" value="{{ $client->address }}">
        <br>
        Kućni broj:<br>
        <input type="number" id="homenumber" name="homenumber" value="{{ $client->homenumber }}">
        <br>
        Grad:<br>
        <input type="text" id="hometown" name="hometown" value="{{ $client->hometown }}">
        <br>
        <br>
        <button class="button btn btn-warning">Spremi promjene</button>
      </div>
      </div>
      @method('PUT')
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
