<?php

namespace App\Services\Admin;

use Auth;
use Exception;
use Storage;
use App\Models\Result;

class ResultService
{
	 /**
     *
     *
     * @return View
     */
    public function showResults()
    {
        //
    }

	 /**
     * Show form for evaluate a Client.
     *
     * @return View
     */
	 public function createResult($id)
    {
        return view('admin.results.create')->with('client_id',$id);
    }

	/**
     * Store a newly created result for a Cslient.
     *
     * @return Redirect
     */
	 public function storeResult($request)
    {
     if(isset($_POST['submit'])){
       $isolation = $_POST['isolation'];  // Storing Selected Value In Variable
       $going_out = $_POST['going_out'];
       $school = $_POST['school'];
       $sum=$isolation+$going_out+$school;

       # Data to be stored after evaluation
       $data=[
       'result' =>$sum,
       'client_id' =>$request->get('client_id')
     ];}
     # Instance Result model
     $result=new Result();
     # Save new Result
     try {
       $resultId=$result->saveResult($data)->id;
     } catch(Exception $e){
       session()->flash('danger', $e->getMessage());
       return redirect()->back();
     }

     session()->flash('success', 'Uspješno ste izvršili procjenu.');
     return redirect()->route('clients.index');
      }

	 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result
     * @return view
     */
    public function showResult(Client $client)
    {
        //
    }


	/**
     * Show the form for editing the specified resource from storage.
     * @param App\Models\Result
     * @return View
     */
	 public function editResult($client)
    {
        return view('admin.clients.edit')->with('client', $client);
    }

	 /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Result
     * @return Redirect
     */
    public function updateResult($request, $client)
    {
        //
    }

	 /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Result
     * @return  Redirect
     */
    public function deleteResult(Client $client)
    {
        //
    }
}



 ?>
