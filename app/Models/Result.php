<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = ['result', 'client_id'];

 public function saveResult($data)
  {
    return $this->create($data);
  }

  ################# Begin relations ####################
  /**
     * Get the author that make the result
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

  ################# End relations ######################
}
