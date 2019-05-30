<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\ClientService;
use App\Http\Requests\ClientRequest;
use App\Models\Client;


class ClientController extends Controller
{
  /** @var App\Services\Admin\ClientService */
  protected $clientService;

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
    # Middleware
        $this->middleware('auth');
    # Dependancy injection
    $this->clientService=$clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->clientService->showClients();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->clientService->createClient();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        return $this->clientService->storeClient($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $this->clientService->showClient($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return $this->clientService->editClient($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $this->clientService->updateClient($request, $client);
        return redirect()->route('clients.index');
        # ova ruta ne radi iz CLientService-a iz nekog razloga, isto kao i destroy()
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $this->clientService->deleteClient($client);
        return redirect()->route('clients.index');
        # ova ruta ne radi iz CLientService-a iz nekog razloga
    }
}
