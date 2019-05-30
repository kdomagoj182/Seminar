@extends('layouts.layout')

@section('title', 'Procjena korisnika')

@section('content')

<div style="text-align:center">
<h1>Procjena korisnika</h1>
<!-- Ovdje sam pokušao ubaciti ime korisnika kojeg se procjenjuje, ali nisam uspio pronaći način.
Ako me možete uputiti na rješenje ili direktno dodati u kod. Hvala -->
</div>
<p style="margin:40px">Odaberite na skali od 1 do 3 koliko se tvrdnja odnosi na korisnika.
<br>
1-nikad, 2-ponekad, 3-često</p>
<div style="margin:40px">
<form action="{{ route('results.store') }}" method='post'>
  @csrf

	<ol>
	<li>Maloljetnik/ca se izolira od drugih.<br>
<select name='isolation'>
<option value=''>Odaberite</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
</select>
	</li>

	<li>Maloljetnik/ca izlazi iz ustanove bez dozvole.<br>
<select name='going_out'>
<option value=''>Odaberite</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
</select>
	</li>

	<li>Maloljetnik/ca izbjegava nastavu.<br>
<select name='school'>
<option value=''>Odaberite</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
</select>
	</li>

	</ol>

<input type="hidden" name="client_id" value="{{ $client_id }}">
<p style="margin:40px"><input type='submit' name='submit' value='Procijeni!'/></p>

</div>
</form>
<div style="text-align:center; display=inline-block">
@if(count($errors)>0)
@foreach($errors->all() as $error)
<button type="button" class="btn btn-danger btn-sm">{{ $error }}</button>
@endforeach
@endif
</div>
<div style="text-align:center">
  <br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('clients.show', $client_id) }}">Nazad</a></button>
  <br>
  <br>
  <button class="button" style="border-radius: 20px"><a href="{{ route('clients.index') }}">Popis korisnika</a></button>
</div>
@endsection
