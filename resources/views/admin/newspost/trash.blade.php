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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Deleted News</span>
							</div>
						</div>
						
					</div>
				</div>
				<form action="{{route('admin.news.multihearddelete')}}" method="post">
					@csrf
					<button type="submit" style="margin: 5px;" class="btn btn-danger btn-sm" name="submit" value="delete"><i class="fa fa-trash"></i> Delete All</button>
					<button type="submit" style="margin: 5px;" class="btn btn-info btn-sm" name="submit" value="restore"><i class="fas fa-recycle"></i> Restore All</button>
					<a href="{{route('admin.news.all')}}" style="margin: 5px;" class="btn btn-success btn-sm"><i class="fas fa-backward"></i> Back</a>
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
											<img src="{{asset('public/uploads/newspost/'.$data->image)}}" height="25px">
										</td>
									
										
										<td>
											<a href="{{url('admin/news/recycle/'.$data->id)}}" class="btn btn-sm btn-info"title="edit"><i class="fas fa-recycle"></i></a> |
											 <a class="btn btn-sm btn-danger" href="{{url('admin/news/delete/'.$data->id)}}" id="delete"><i class="fa fa-trash"></i> </a> |
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