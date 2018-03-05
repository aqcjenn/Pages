<table class="table table-striped" id="pages">
	<thead>
		<tr>
			<th>Title</th>
			<th>Author</th>
			<th>Date Created</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody id="pages_rows">
		@if (count($pages) > 0)
			@foreach($pages as $page)
				<tr class="pages" id="{{ $page->page_id}}">
					<td>{{ $page->title }}</td>
					<td>{{ $page->created_by_username }}</td>
					<td>{{ $page->date_created }}</td>
					<td>{{ $page->status }}</td>
				</tr>
			@endforeach	
		@endif
	</tbody>
</table>
 
<div class="float-right">{{ $pages->links() }}</div>