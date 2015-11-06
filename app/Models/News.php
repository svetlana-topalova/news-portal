<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public static $_statuses = array(
        1 => '',
        2 => '',
        3 => '',
    );

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'news';

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function createdBy() 
	{
		return $this->belongsTo('App\User', 'created_by');
	}
        
        /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function approvedBy() 
	{
		return $this->belongsTo('App\User', 'approved_by');
	}
        
        /**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function status() 
	{
		return $this->belongsTo('App\Models\Status', 'status_id');
	}

}
