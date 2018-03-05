@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="post_container">
			<div class="mb-4">
				<div >
					<h2>{{ $page->title }}</h2>
					<small class="text-muted">created by <span >{{ $page->created_by_username }} </span> on {{$page->date_created }}</small>
				</div>
			</div>
			<div>
				<p class="lead ">
				  {{ $page->content }}
				</p>
			</div>
		</div>
		<div class="comments_container">
			<div class="comment_form_container">
			@guest
                   Please <a  href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to join in the discussion.
            @else
				<label>Comments</label>
				<form id="commentForm">
					<div class="form-group">
						<input type="hidden" name="page_id" value="{{ $page->page_id }}" />
						<textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
					</div>
					<input class="btn btn-primary" type="button" id="postComment" value="Post"/> 
				</form>
			@endguest
			</div>
			@include('comments.list') 
		</div>
	</div>

@endsection