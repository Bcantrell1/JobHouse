@extends('layouts.logged')
@section('title')
{{ $user->FIRSTNAME . " " . $user->LASTNAME }} | Resume Editor
@endsection()
			
@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center">
                <h2 class="text-center">
					{{ $user->FIRSTNAME . ' ' . $user->LASTNAME }}
				</h2>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>Add Item To Resume</h3>
				</div>
    			<div class="card-body">
        			<form action="{{url('/users', $user->id) }}/apply" method="post">
                	{{ csrf_field() }}
        			<div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Tell us about this skill..." required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Institution</label>
                            <input type="text" name="organization" class="form-control" placeholder="Some company/college">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Started</label>
                            <input type="date" name="startDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Ended</label>
                            <input type="date" name="endDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select type="select" name="type" class="form-control" required>
        						<option value="TALENT">Talent</option>
        						<option value="JOB">Job</option>
        						<option value="EDUCATION">Education</option>
        					</select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">ADD</button>
                	</form>
            	</div>
        	</div>
        </div>
    </div>
</div>
@endsection()