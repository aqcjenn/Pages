<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePageRequest;
use Illuminate\Support\Facades\Auth;
use App\Pages;

class PageController extends Controller
{
	
    public function create(CreatePageRequest $request){

    	try{
    		 $pages = new Pages();
	    	 $pages->title 		= $request->title;
	    	 $pages->content 	= $request->content;
	    	 $pages->status 	= $request->visible;
	 		 $pages->updated_by	= $request->user()->id;
	 		 $pages->created_by = $request->user()->id;
	 		 $pages->save();
	 		 $data = array(	'page_id'=>$pages->page_id, 
	 		 				'date_created'=>$pages->date_created,
	 		 				'created_by_username'=>$pages->created_by_username,
	 		 				'title'=>$pages->title,
	 		 				'status'=> $pages->status);
	 		 $response = array('success' => true, 'data' => $data);
    	}catch(\Exception $e){
    		$response = array('success'=> false, 'error' => $e->getMessage());
    	}
    	 

    	return response()->json($response);

    }

    public function view(Request $request){
    	$page = Pages::find($request->page_id);
    	return view('pages.view', compact('page'))->render();
    }

    public function getAll(Request $request){
    	
    	$pages = Pages::orderBy('page_id','desc')->paginate(15);

    	if($request->ajax()){
    		return view('pages.list', ['pages' => $pages])->render();
    	}

    	return view('pages.list', compact('pages'))->render();

    
    }
}
