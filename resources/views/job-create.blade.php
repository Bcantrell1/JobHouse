@extends('layouts.logged')

 @section('title') Create Job Posting @endsection()

 @section('content')



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>Post A New Job</h3>
				</div>
				<div class="card-body">
					<form action="{{ url('/jobs/add') }}"
						method="post">
						{{ csrf_field() }}
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">
									Name
								</label>
								<input type="text" name="name"
									class="form-control" placeholder="Name" required>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">
									Description
								</label>
								<input type="text"
									name="description" class="form-control"
									placeholder="Tell us about this group, who is it for?..."
									required>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">
									Organization
								</label>
								<input type="text"
									name="organization" class="form-control"
									placeholder="What company or organization?" required>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">
									Start Date
								</label>
								<input type="date" name="startDate"
									class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">
									Type
								</label>
								<input type="text" name="type"
									class="form-control"
									placeholder="Some value to group this job posting with others like it.">
							</div>
						</div>
						<button type="submit"
							class="btn btn-danger">
							ADD
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection()
