@extends('layouts.logged')

@section('title') My Resume @endsection()

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12 m-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title text-center">Job Experience</h4>
					<a href="{{ url('/users',$user->id) }}/add"
						class="btn btn-success">
						ADD
					</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<th>Id</th>
								<th>Name</th>
								<th>Description</th>
								<th>Business</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Edit</th>
								<th>Delete</th>
							</thead>
							<tbody>
								@foreach($jobs as $row)
								<tr>
									<td>{{ $row->id }}</td>
									<td>{{ $row->NAME }}</td>
									<td>{{ $row->DESCRIPTION }}</td>
									<td>
										{{ $row->ORGANIZATION }}
									</td>
									<td>{{ $row->START_DATE }}</td>
									<td>{{ $row->END_DATE }}</td>
									<td>
										<a
											href="{{ url('/users', $user->id) }}/{{ $row->id }}/edit"
											class="btn btn-success">
											EDIT
										</a>
									</td>
									<td>
										<form
											action="{{ url('/users',$user->id) }}/{{ $row->id }}/delete"
											method="post">
											{{ csrf_field() }} {{method_field('DELETE')}}
											<button type="submit"
												class="btn btn-danger">
												DELETE
											</button>
										</form>
									</td>
								</tr>
								@endforeach()
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 m-4">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title text-center">
						Educational Experience
					</h4>
					<a href="{{ url('/users',$user->id) }}/add"
						class="btn btn-success">
						ADD
					</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<th>Id</th>
								<th>Name</th>
								<th>Description</th>
								<th>School</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Edit</th>
								<th>Delete</th>
							</thead>
							<tbody>
								@foreach($education as $row)
								<tr>
									<td>{{ $row->id }}</td>
									<td>{{ $row->NAME }}</td>
									<td>{{ $row->DESCRIPTION }}</td>
									<td>
										{{ $row->ORGANIZATION }}
									</td>
									<td>{{ $row->START_DATE }}</td>
									<td>{{ $row->END_DATE }}</td>
									<td>
										<a
											href="{{ url('/users',$user->id) }}/{{ $row->id }}/edit"
											class="btn btn-success">
											EDIT
										</a>
									</td>
									<td>
										<form
											action="{{ url('/users',$user->id) }}/{{ $row->id }}/delete"
											method="post">
											{{ csrf_field() }} {{method_field('DELETE')}}
											<button type="submit"
												class="btn btn-danger">
												DELETE
											</button>
										</form>
									</td>
								</tr>
								@endforeach()
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 m-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title text-center">
								Additional Talents
							</h4>
							<a
								href="{{ url('/users',$user->id) }}/add"
								class="btn btn-success">
								ADD
							</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table">
									<thead class=" text-primary">
										<th>Id</th>
										<th>Name</th>
										<th>Description</th>
										<th>Edit</th>
										<th>Delete</th>
									</thead>
									<tbody>
										@foreach($talent as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>
												{{ $row->NAME }}
											</td>
											<td>
												{{ $row->DESCRIPTION
												}}
											</td>
											<td>
												<a
													href="{{ url('/users',$user->id) }}/{{ $row->id }}/edit"
													class="btn btn-success">
													EDIT
												</a>
											</td>
											<td>
												<form
													action="{{ url('/users',$user->id) }}/{{ $row->id }}/delete"
													method="post">
													{{ csrf_field() }} {{ method_field('DELETE') }}
													<button
														type="submit" class="btn btn-danger">
														DELETE
													</button>
												</form>
											</td>
										</tr>
										@endforeach()
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endsection
