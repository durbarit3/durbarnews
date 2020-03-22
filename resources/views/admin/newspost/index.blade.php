@extends('admin.master')
@section('title', 'All News')
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
								<a href="{{route('admin.news.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add News</span></a>
							</div>
						</div>
					</div>
				</div>
				<form action="{{route('admin.news.multisoftdelete')}}" method="post">
					@csrf
					<button type="submit" style="margin: 5px;" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete All</button>
					<a href="{{route('admin.news.deletedpost')}}" style="margin: 5px;" class="btn btn-success btn-sm"><i class="fa fa-recycle"></i> Restore</a>
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
										<th>Title</th>
										<th>Description</th>
										<th>Category</th>
										<th>SubCategory</th>
										<th>Image</th>
										<th>status</th>
										<th>manage</th>
									</tr>
								</thead>
								<tbody>
									@foreach($allnews as $key => $data)
									<tr>
										<td>
											<label class="chech_container mb-4">
												<input type="checkbox" name="delid[]" class="checkbox" value="{{$data->id}}">
												<span class="checkmark"></span>
											</label>
										</td>
										<td>{{++$key}}</td>
										<td>{{Str::limit($data->title,25)}}</td>
										<td>{!! Str::limit($data->description,35) !!}</td>
										<td>{{$data->Cate->name}}</td>
										@if($data->subcategory_id==NULL)
										<td>NULL</td>
										@else
										<td>{{$data->SubCate->name}}</td>
										@endif
										<td>
											<img src="{{asset('public/uploads/newspost/bigthum/'.$data->image)}}" height="25px">
										</td>
										<td>
											@if($data->status==1)
											<span class="btn btn-success btn-sm">Active</span>
											@else
											<span class="btn btn-danger btn-sm">Deactive</span>
											@endif
										</td>

										<td>
											<a href="{{url('admin/news/edit/'.$data->id)}}" class="btn btn-sm btn-info"title="edit"><i class="fas fa-pencil-alt"></i></a> |
	                                      	@if($data->status==1)
	                                      	<a class="btn btn-sm btn-success" href="{{url('admin/news/deactive/'.$data->id)}}" id="TopbarActive"><i class="fas fa-thumbs-up"></i> </a>
	                                      	@else
	                                      	<a class="btn btn-sm btn-secondary" href="{{url('admin/news/active/'.$data->id)}}" id="TopbarActive"><i class="fas fa-thumbs-down"></i> </a>
	                                      	@endif
	                                       | <a class="btn btn-sm btn-danger" href="{{url('admin/news/softdelete/'.$data->id)}}" id="delete"><i class="fa fa-trash"></i> </a> |
										</td>
									</tr>
									@endforeach
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
