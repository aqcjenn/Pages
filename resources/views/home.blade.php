@extends('layouts.app')
@section('content')
    <div class="container">
    	<div class="row mb-4">
	    	<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  New Page
			</button>


			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">New Page</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="createPageForm">
			        	<div class="form-group">
			        		<label for="title">Title</label>
			        		<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Title">
			        	</div>
			        	<div class="form-group">
			        		<label for="content">Content</label>
			        		<textarea class="form-control" id="content" name="content" rows="5"></textarea>
			        	</div>
			        	<div class="form-group">
			        		<label for="visible" >Visible</label>
			        		<div class="form-check form-check-inline offset-sm-1" >
							  <input class="form-check-input" type="radio" name="visible" id="visibleYes" value="show">
							  <label class="form-check-label" for="visibleYes">
							    Yes
							  </label>
							</div>
							<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="visible" id="visibleNo" value="hide">
							  <label class="form-check-label" for="visibleNo">
							    No
							  </label>
							</div>
			        	</div>
			        </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" id="createPage">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="row">
			@include('pages.list',['pages'=> $pages]) 
		</div>
    </div>
@endsection