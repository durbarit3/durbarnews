@extends('admin.master')
@section('content')

	<!--middle content wrapper-->
	<!-- page content -->
	<div class="middle_content_wrapper">
		<section class="page_content">
			<!-- panel -->
			<div class="panel mb-0">
				<div class="panel_header">
					<div class="row">
						<div class="col-md-6">
							<div class="panel_title">
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All News</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add News</span></a>
							</div>
						</div>
					</div>
				</div>
				<form action="{{route('admin.category.multiDelete')}}" method="post">
					@csrf
					<button type="submit" style="margin: 5px;" class="btn btn-danger"><i class="fa fa-trash"></i>Delete All</button>
					<div class="panel_body">
						<div class="table-responsive">
							<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
								<thead>
									<tr>
										<th>
											<label class="chech_container mb-4">
												<input type="checkbox" id="check_all">
												<span class="checkmark"></span>
											</label>
										</th>
										<th>#</th>
										<th>Category Name</th>
										<th>Position</th>
										<th>manage</th>
									</tr>
								</thead>
								<tbody>
									{{--
									@foreach($allCategory as $key => $data)
									<tr>
										<td>
											<label class="chech_container mb-4">
												<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
												<span class="checkmark"></span>
											</label>
										</td>
										<td>{{++$key}}</td>
										<td>{{$data->name}}</td>
										<td>
											@if($data->is_top==1)
											<span class="btn btn-success">Top Menu</span>
											@else
											<span class="btn btn-primary">Main Menu</span>
											@endif
										</td>
										
										<td>
												<a class="editcat btn btn-sm btn-info" data-id="{{$data->id}}" title="edit"  data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
		                                      	@if($data->is_top==1)
		                                      	<a class="btn btn-sm btn-success" href="{{url('admin/category/deactive/'.$data->id)}}" id="TopbarActive"><i class="fas fa-thumbs-up"></i> </a> 
		                                      	@else
		                                      	<a class="btn btn-sm btn-secondary" href="{{url('admin/category/active/'.$data->id)}}" id="TopbarActive"><i class="fas fa-thumbs-down"></i> </a>
		                                      	@endif
		                                       | <a class="btn btn-sm btn-danger" href="{{url('admin/category/delete/'.$data->id)}}" id="delete"><i class="fa fa-trash"></i> </a> |
										</td>
									</tr>
									@endforeach
									--}}
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {

		$('#check_all').on('click', function(e) {

			if ($(this).is(':checked', true))

			{
				$(".checkbox").prop('checked', true);

			} else {

				$(".checkbox").prop('checked', false);

			}

		});

	});
</script>

<script>
    @error('cate_name')
    toastr.error("{{ $errors->first('cate_name') }}";
    @enderror
</script>
@endpush