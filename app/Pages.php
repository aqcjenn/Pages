<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    
    protected $primaryKey = 'page_id';

    protected $fillable = [
        'title', 'content', 'status','created_by', 'updated_by'
    ];

    protected $appends = [ 'created_by_username', 'updated_by_username', 'date_created'];

    public function author(){
    	return $this->belongsTo('App\User', 'created_by');
    }

    public function getCreatedByUsernameAttribute(){
    	$user = User::find($this->created_by);
    	return $this->attributes['created_by_username'] = $user->username;
    }

    public function getUpdatedByUsernameAttribute(){
    	$user = User::find($this->updated_by);
    	return $this->attributes['updated_by_username'] = $user->username;
    }

    public function getDateCreatedAttribute(){
    	return date('F d, Y', strtotime($this->created_at));
    }






}
