<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use Illuminate\Support\Facades\Auth;
use App\Comments;

class CommentController extends Controller
{
    //

    public function create(CreateCommentRequest $request){

    	try{
    		$comments 			 = new Comments();
    		$comments->comment 	 = $request->comment;
    		$comments->page_id 	 = $request->page_id;
    		
    		if($request->parent_id && $request->level){
    			$comments->parent_id = $request->comment;
    			$comments->level 	 = $request->level;
    		}
    		
    		$comments->updated_by = $request->user()->id;
	 		$comments->created_by = $request->user()->id;
	 		$comments->save();

	 		$new_comment = $comments->find($comments->comment_id);
	 		$new_comment->order = $new_comment->order == "" ? $comments->comment_id : $new_comment->order."-".$comments->comment_id;
	 		$new_comment->save();

	 		$data = array(	'comment_id'		 => $comments->comment_id, 
	 		 				'date_created'		 => $comments->date_created,
	 		 				'created_by_username'=> $comments->created_by_username,
	 		 				'comment'			 => $comments->comment);

	 		$response = array('success' => true, 'data' => $data);

    	}catch(\Exception $e){
    		$response = array('success'=> false, 'error' => $e->getMessage());
    	}

    	return response()->json($response);
    }
}
