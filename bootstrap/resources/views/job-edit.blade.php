@extends('layouts.logged')

@section('title')
			Edit Job Posting
@endsection()

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div class="card-header">
					<h3>Edit A Job</h3>
				</div>
			<div class="card-body">
        		<form action="{{ url('/jobs', $item->id) }}/update" method="post">
                	{{ csrf_field() }}
        			<div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $item->NAME }}" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" value="{{ $item->DESCRIPTION }}" class="form-control" placeholder="Tell us about this group, who is it for?..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Organization</label>
                            <input type="text" name="organization" value="{{ $item->ORGANIZATION }}" class="form-control" placeholder="What company or organization?" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="startDate" value="{{ $item->START_DATE }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <input type="text" name="type" value="{{ $item->TYPE }}" class="form-control" placeholder="Some value to group this job posting with others like it.">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">UPDATE</button>
    			</form>
    			
			</div>
			<form action="{{ url('/jobs', $item->id) }}/delete" method="post">
            	{{ csrf_field() }} {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger">DELETE</button>
			</form>
		</div>
	</div>
</div>


@endsection()