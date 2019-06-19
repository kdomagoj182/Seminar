<?php

namespace App\Services\Admin;

use Auth;
use Exception;
use Storage;
use App\Models\Client;

class ClientService
{
	 /**
     * Get all clients.
     *
     * @return View
     */
    public function showClients()
    {
      # Get current user id
      $currentUserId=Auth::user()->id;

      # Fetch Client from databse
      $clients=Client::where('user_id', $currentUserId)->orderBy('surname')->with('user')->paginate(7);
      return view('admin.clients.index')->with('clients', $clients);

    }

	 /**
     * Show form for creating a new client.
     *
     * @return View
     */
	 public function createClient()
    {
        return view('admin.clients.create');
    }

	/**
     * Store a newly created client in storage.
     *
     * @return Redirect
     */
	 public function storeClient($request)
    {

      # Get current user Id;
      $currentUserId=Auth::user()->id;

      # Data to be stored as a new Client
      $data=[
        'name'   =>trim($request->get('name')),
        'surname' =>trim($request->get('surname')),
        'birthday' =>$request->get('birthday'),
        'oib' =>$request->get('oib'),
        'address' =>$request->get('address'),
        'homenumber' =>$request->get('homenumber'),
        'hometown' =>$request->get('hometown'),
        'user_id' =>$currentUserId
      ];

      # Instance Client model
      $client=new Client();
      # Save new Client

      try {
        $clientId=$client->saveClient($data)->id;
      } catch(Exception $e){
        session()->flash('danger', $e->getMessage());
        return redirect()->back();
      }

      session()->flash('success','Uspješno ste spremili korisnika.');
      return redirect()->route('clients.index');
      }


	 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return view
     */
    public function showClient(Client $client)
    {
        return view('admin.clients.show')->with('client', $client);
    }


	/**
     * Show the form for editing the specified resource from storage.
     * @param App\Models\Client
     * @return View
     */
	 public function editClient($client)
    {
        return view('admin.clients.edit')->with('client', $client);
    }

	 /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Client
     * @return Redirect
     */
    public function updateClient($request, $client)
    {
      # Data to be updated form existing Client

      $data=[
        'name'   =>trim($request->get('name')),
        'surname' =>trim($request->get('surname')),
        'birthday' =>$request->get('birthday'),
        'oib' =>$request->get('oib'),
        'address' =>$request->get('address'),
        'homenumber' =>$request->get('homenumber'),
        'hometown' =>$request->get('hometown')
      ];

      try {
  			$client->updateClient($data);
  		} catch(Exception $e){
  			session()->flash('danger', $e->getMessage());
  			return redirect()->back();
  		}

      session()->flash('update', 'Korisniku su uspješno promijenjeni podaci.');

    }

	 /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Client
     * @return  Redirect
     */
    public function deleteClient(Client $client)
    {
      try{
      $client->delete();
    } catch(Exception $e){
			session()->flash('danger', $e->getMessage());
			return redirect()->back();
		}
      session()->flash('danger','Uspješno ste obrisali korisnika.');
    }
}



 ?>
