<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Client extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
      return [
          'slug' => [
              'source' => 'name',
              'source' => 'surname'
          ]
      ];
    }

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = ['name', 'surname', 'birthday', 'oib', 'address', 'homenumber', 'hometown', 'user_id'];
   /**
     * Save new Client.
     *
     * @param array $data
	 * @return Client
     */

	public function saveClient($data)
	 {
		 return $this->create($data);
	 }

   /**
     * Update Clients information.
     *
     * @param array $data
	   * @return void
     */

	public function updateClient($data)
	 {
		$this->update($data);
	 }

   ################# Begin relations ####################
   /**
      * Get the name of the person that made the evaluation
      */
     public function user()
     {
         return $this->belongsTo('App\User');
     }
     /**
        * Get the results for client.
        */
      public function result()
      {
          return $this->hasMany('App\Models\Result');
      }


   ################# End relations ######################


}
