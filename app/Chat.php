<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
	 /**
	 * Fields that are mass assignable
	 *
	 * @var array
	 */
	protected $fillable = [

	'message','user_id','friends_id','pic_id','read','deleted'

	];

	/**
	 * A message belong to a user
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
	  return $this->belongsTo('App\User');
	}
    public function friend()
    {
        return $this->belongsTo('App\User');
    }


}
