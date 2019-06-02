@extends('layouts.layout')

@section('content')

<div style="text-align:center">
  <br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('home') }}">Početna stranica</a></button>
  <br><br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('clients.index') }}">Popis korisnika</a></button>
  <br><br>
</div>


<div style="text-align:center">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Ime i prezime korisnika</th>
        <th scope="col">{{ $client->name }} {{ $client->surname }}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Datum rođenja</th>
        <td>{{ \Carbon\Carbon::parse($client->birthday)->format('d.m.Y') }}</td>
      </tr>
      <tr>
        <th scope="row">Adresa</th>
        <td>{{ $client->address }} {{ $client->homenumber }}, {{ $client->hometown }}</td>
      </tr>
      <tr>
        <th scope="row">OIB korisnika</th>
        <td>{{ $client->oib }}</td>
      </tr>
    </tbody>
  </table>
</div>

<div style="text-align:center">
    <button type="button" class="btn btn-dark"><a href="{{ route('clients.edit', $client) }}">Promijeni podatke</a></button>
  <br><br>
    <button type="button" class="btn btn-dark"><a href="{{ route('results.create', $client->id) }}">Izvrši procjenu</a></button>
  <br><br>
  <form method="post" action="{{ route('clients.destroy', $client) }}">
     @csrf
     @method('DELETE')
    <button type="submit" class="btn btn-danger">Izbriši korisnika</a></button>
  </form>

    @if(count($client->result)>0)
      @foreach($client->result as $result)
        @php
        $sum=$result->result;
        @endphp
          @if($sum<=3)
          <br>
            <br>Korisnik/ca je procijenjen/a na <strong>niskoj</strong> razini rizika.
            <br>Procjena je izvršena {{ $result->created_at->diffForHumans() }}.<br>
            Procjenu je izvršio/la: {{$client->user->name}}.
           <br>
          @elseif($sum>3 && $sum<=6)
            <br>Korisnik/ca je procijenjen/a na <strong>srednjoj</strong> razini rizika.
            <br>Procjena je izvršena {{ $result->created_at->diffForHumans() }}.<br>
            Procjenu je izvršio/la: {{$client->user->name}}.
          <br>
          @else
            <br>Korisnik/ca je procijenjen/a na <strong>visokoj</strong> razini rizika.
            <br>Procjena je izvršena {{ $result->created_at->diffForHumans() }}.<br>
            Procjenu je izvršio/la: {{$client->user->name}}.
          <br>
          @endif
      @endforeach
    @else
    <br>Procjena nije izvršena.
    @endif
</div>

@endsection
