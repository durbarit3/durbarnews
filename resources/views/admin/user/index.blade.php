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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Users</span>
							</div>
                        </div>
                        
                  
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="{{route('admin.user.create')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>Add News</span></a>
							</div>
						</div>

					</div>
				</div>

				
					<div class="panel_body">
						<div class="table-responsive">
							<table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
								<thead>
									<tr>
										<th>
											SL
										</th>
										<th>Name</th>
										<th>Email</th>
										<th>Designation</th>
										<th>Status</th>
										<th>Online Status</th>
										<th>Action</th>
			
							
									</tr>
								</thead>
								<tbody>
									@foreach($users as $data)
									<tr>
										<td>
                                            {{$loop->iteration}}	
										</td>
									
										<td>{{$data->adminname}}</td>
										<td>{{$data->email}}</td>
                                        <td>{{$data->designation}}</td>
                                        <td>
                                            @if($data->status ==1)
                                            <a href="{{route('admin.user.status.update',$data->id)}}" class="btn btn-success btn-sm ">
                                                <i class="fas fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{route('admin.user.status.update',$data->id)}}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @endif

                                        </td>
                                        @if($data->isOnline())
                                        <td><b style="color:green">Online</b></td>
                                        @else
                                        <td><b style="color:red">Offline</b></td>
                                        @endif

                                        <td>
                                            |<a href="{{route('admin.user.edit',$data->id)}}" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                            <a id="delete" href="{{route('admin.user.delete',$data->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
			
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