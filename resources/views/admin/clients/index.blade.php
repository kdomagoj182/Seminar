
@extends('layouts.layout')

@section('title', 'Popis korisnika')

@section('content')

<div style="text-align:center">
  <br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('home') }}">Početna stranica</a></button>
  <br>
  <br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('clients.create') }}">Upis novog korisnika</a></button>
  <br>
  <br>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

        @if($clients->count()>0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Ime i prezime</th>
                    <th scope="col">Datum rođenja</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Grad</th>
                </tr>
            </thead>
    @foreach($clients as $client)
    <tr>
      <td><a href="{{ route('clients.show', $client) }}">{{ $client->name }} {{ $client->surname }}<a></td>
        <td>{{ \Carbon\Carbon::parse($client->birthday)->format('d.m.Y') }}</td>
        <td>{{ $client->address }} {{ $client->homenumber }}</td>
        <td>{{ $client->hometown }}</td>
    </tr>
    @endforeach
</table>
<div class="row justify-content-center">
{{ $clients->links() }}
</div>


				@else
        <div style="text-align:center" class="row justify-content-center">
            <div class="breadcrumb">
            Nije upisan ni jedan korisnik.
            </div>
        </div>
				@endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
