@extends('layouts.app')

@section('title', 'Početna')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div style="text-align:center">
                      <ol class="breadcrumb">
                    <div><h3><a href="{{ route('clients.index') }}">Popis korisnika</a></h3></div>
                      </ol>
                    </div>
                    <div style="text-align:center">
                      <ol class="breadcrumb">
                        <div><h3><a href="{{ route('clients.create') }}">Upis novog korisnika</a></h3></div>
                      </ol>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
