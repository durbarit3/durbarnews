@extends('admin.master')
@section('content')

<div class="middle_content_wrapper">
		<section class="page_content">
			<!-- panel -->
			<div class="panel mb-0">
				<div class="panel_header">
					<div class="row">
						<div class="col-md-6">
							<div class="panel_title">
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Update Advertisement</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="{{route('admin.advertisement.all')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>All Advertisement</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel_body">
					<form class="form-horizontal" action="{{route('admin.advertisement.update',$data->id)}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Advertiser Name</label>
						<div class="col-sm-7 {{$errors->has('ad_name')? ' has-error':''}}">
							<input type="text" name="ad_name" class="form-control" placeholder="Enter Company Name" value="{{$data->ad_name}}">
							 @if ($errors->has('ad_name'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
										<strong>{{ $errors->first('ad_name') }}</strong>
									</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Advertiser Phone</label>
						<div class="col-sm-7">
							<input type="text" name="ad_phone" class="form-control" placeholder="Enter phone Number" value="{{$data->ad_phone}}">
							
						</div>
					</div>
					
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Position</label>
						<div class="col-sm-7 {{$errors->has('cate_id')? ' has-error':''}}">
							<select class="form-control" name="position_id" id="position_id">
								<option disabled selected>Select</option>
								@foreach($allposition as $cate)
								<option value="{{$cate->id}}" @if($data->position_id==$cate->id) selected @endif>{{$cate->position_name}}</option>
								@endforeach
							</select>
							 @if ($errors->has('cate_id'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
										<strong>{{ $errors->first('cate_id') }}</strong>
									</span>
							@endif
						</div>
					</div>
					
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Advertise Type</label>
						<div class="col-sm-7">
							<select class="form-control" name="post_type" id="post_type">
								<option value="1" @if($data->ad_type==1) selected @endif>Ad Image</option>
								<option value="2" @if($data->ad_type==2) selected @endif>Ad Code</option>
							</select>
						</div>
					</div>
					<div id="videosection" @if($data->ad_type==2) @else style="display:none" @endif>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Ad Code</label>
							<div class="col-sm-7 {{$errors->has('advertisement')? ' has-error':''}}">
								  <textarea name="advertisement" class="form-control">{{$data->advertisement}}</textarea>
								   @if ($errors->has('advertisement'))
											<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
													<strong>{{ $errors->first('advertisement') }}</strong>
											</span>
									@endif
							</div>
						</div>
					</div>
					<div id="image_ad" @if($data->ad_type==1) @else style="display:none" @endif>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Ad Url</label>
							<div class="col-sm-7 {{$errors->has('url')? ' has-error':''}}">
								<input type="text" name="url" class="form-control" placeholder="Please Enter Ad Url" value="{{$data->url}}">
								@if ($errors->has('url'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
											<strong>{{ $errors->first('url') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Ad Start Date</label>
							<div class="col-sm-7 {{$errors->has('start_date')? ' has-error':''}}">
								<input type="date" name="start_date" class="form-control" placeholder="Please Enter Start Date" value="{{$data->start_date}}">
								@if ($errors->has('start_date'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
											<strong>{{ $errors->first('start_date') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Ad End Date Date</label>
							<div class="col-sm-7 {{$errors->has('end_date')? ' has-error':''}}">
								<input type="date" name="end_date" class="form-control" placeholder="Please Enter End Date" value="{{$data->end_date}}">
								@if ($errors->has('end_date'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
											<strong>{{ $errors->first('end_date') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Width</label>
							<div class="col-sm-7 {{$errors->has('width')? ' has-error':''}}">
								  <input type="number" class="form-control" name="width" placeholder="Please write Postion width" value="{{$data->width}}"> 
								  @if ($errors->has('width'))
											<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
													<strong>{{ $errors->first('width') }}</strong>
											</span>
									@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Height</label>
							<div class="col-sm-7 {{$errors->has('height')? ' has-error':''}}">
								  <input type="number" class="form-control" name="height" placeholder="Please write Postion Height" value="{{$data->height}}"> 
							   		@if ($errors->has('height'))
											<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
													<strong>{{ $errors->first('height') }}</strong>
											</span>
									@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Ad Image</label>
							<div class="col-sm-7 {{$errors->has('advertisement_image')? ' has-error':''}}">
								 <input type="file" name="advertisement_image" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off" data-default-file="{{asset('public/uploads/advertisement/'.$data->advertisement)}}"/>
								 @if ($errors->has('advertisement_image'))
											<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
													<strong>{{ $errors->first('advertisement_image') }}</strong>
											</span>
									@endif

							</div>
						</div>
					</div>
				
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7 text-center">
							<button type="submit" class="btn btn-success">Add Advertisement</button>
						</div>
					</div>
				</form>
				</div>		
			</div>
		</section>
	</div>


<script type="text/javascript">

 $(document).ready(function() {
         $('select[name="cate_id"]').on('change', function(){
             var cate_id = $(this).val();
             //alert("success");
             if(cate_id) {
                 $.ajax({
                     url: "{{  url('admin/news/getsubcate/') }}/"+cate_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append(' <option disabled selected>Select</option>');
                            $.each(data,function(index,districtObj){
                            $('#subcategory_id').append('<option value="' + districtObj.id + '">'+districtObj.name+'</option>');
                          });
                         }
                 });
             } else {
                 //alert('danger');
             }

         });
// district


// subdistrict

 


    // mainsection checkbox jquery

        $("#mainsection").click(function() {

            if ($(this).is(":checked")) {
                $("#mainsectiondiv").show();

            }
            else {
                $("#mainsectiondiv").hide();

            }
        });

          $('select[name="post_type"]').on('change', function(){
             var id = $(this).val();
             
             if(id==2){
             	$("#videosection").show();
             	$("#image_ad").hide();
             }else{
             	$("#videosection").hide();
             	$("#image_ad").show();
             }
           

         });




     });

</script>
@endsection
