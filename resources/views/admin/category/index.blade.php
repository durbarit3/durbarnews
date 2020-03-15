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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Category</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Category</span></a>
							</div>
						</div>
					</div>
				</div>
				<form action="{{route('admin.category.multiDelete')}}" method="post">
					@csrf
					<button type="submit" style="margin: 5px;" class="btn btn-danger"><i class="fa fa-trash"></i> Delete All</button>
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
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>

<!-- modal start-->
<!-- The Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal1">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Add Category</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form class="form-horizontal" action="{{route('admin.category.submit')}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">CategoryName</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="cate_name" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Slug</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="cate_slug">
							<p style="font-size: 10px;">(If you leave it blank, it will be generated automatically)</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Meta Description</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="meta_description">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Meta Keyword</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="meta_keyword">
						</div>
					</div>
					<div class="form-group row">
		                <label for="example-text-input" class="col-sm-4 col-form-label text-right">Show On TopMenu</label>
		                <div class="col-sm-8">
		                   <div class="skin-flat">
		                      <div class="row">
		                      
		                          <div class="col-sm-6">
		                              <div class="i-check">
		                                  <input tabindex="15" type="radio" id="flat-radio-1" name="is_top" value="1" checked> 
		                                  <label for="flat-radio-1">Yes</label>
		                              </div>
		                              <div class="i-check">
		                                  <input tabindex="16" type="radio" id="flat-radio-2" name="is_top" value="0">
		                                  <label for="flat-radio-2">No</label>
		                              </div>
		                          </div>
		                      </div>
		                  </div>
		                </div>
               		</div>
		

					<div class="form-group text-right">
						<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
						<button type="submit" class="btn btn-blue">Submit</button>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<!-- <div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div> -->

		</div>
	</div>
</div>
<!-- modal end -->

<!-- edit modal -->

<!-- edit modal start-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{url('admin/category/update')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">CategoryName</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="cate_name" id="cate_name">
							<input type="hidden" name="id" id="id">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Slug</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="cate_slug" id="cate_slug">
							<p style="font-size: 10px;">(If you leave it blank, it will be generated automatically)</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Meta Description</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="meta_description" id="meta_description">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right">Meta Keyword</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="meta_keyword" id="meta_keyword">
						</div>
					</div>
				<!-- 	<div class="form-group row">
		                <label for="example-text-input" class="col-sm-4 col-form-label text-right">Show On TopMenu</label>
		                <div class="col-sm-8">
		                   <div class="skin-flat">
		                      <div class="row">
		                      
		                          <div class="col-sm-6" id="is_top">
		                             
		                          </div>
		                      </div>
		                  </div>
		                </div>
               		</div> -->

					<div class="form-group text-right">
						<!-- <input type="" value="Reset" class="btn btn-warning"> -->
						<button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
						<button type="submit" class="btn btn-blue">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- edit modal end -->

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
<script type="text/javascript">
	$(document).ready(function() {
		$('.editcat').on('click', function() {
			var id = $(this).data('id');
			//alert(id);

			if (id) {
				$.ajax({
					url: "{{ url('admin/category/edit/') }}/" + id,
					type: "GET",
					dataType: "json",
					success: function(data) {

						$("#cate_name").val(data.name);
						$("#id").val(data.id);
						$("#cate_slug").val(data.slug);
						$("#meta_description").val(data.meta_description);
						$("#meta_keyword").val(data.meta_keyword);

						

					}
				});
			} else {
				alert('danger');
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