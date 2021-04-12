@extends('layouts.logged')

@section('title') Edit Resume @endsection()

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>Edit User {{ $user->EMAIL }}</h3>
				</div>
				<div class="card-body">
					<form action="{{ url('/users', $user->id) }}/{{ $item->id }}/update" method="POST">
						{{ csrf_field() }}
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">Name</label>
								<input type="text" name="name" class="form-control" value="{{ $item->NAME }}" required>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">Description</label>
								<input type="text" name="description" class="form-control" value="{{ $item->DESCRIPTION }}" required>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">Organization</label>
								<input type="text" name="organization" class="form-control" value="{{ $item->ORGANIZATION }}">
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
								<label class="form-label">End Date</label>
								<input type="date" name="endDate" value="{{ $item->END_DATE }}" class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3">
								<label class="form-label">Type</label>
								<select type="select" name="type" value="{{ $item->TYPE }}" class="form-control" required>
									<option value="SKILL">SKILL</option>
									<option value="JOB">JOB</option>
									<option value="EDUCATION">Education</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-danger">UPDATE</button>
					</form>
				</div>
			</div>
		</div>
	</div>