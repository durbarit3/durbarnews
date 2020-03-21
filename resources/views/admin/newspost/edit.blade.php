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
								<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Update News</span>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<div class="panel_title">
								<a href="{{route('admin.news.all')}}" class="btn btn-success"><i class="fas fa-plus"></i></span> <span>All News</span></a>
							</div>
						</div>
					</div>
				</div>
				<div class="panel_body">
					<form class="form-horizontal" action="{{route('admin.news.update',$data->id)}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Title</label>
						<div class="col-sm-7 {{$errors->has('title')? ' has-error':''}}">
							<input type="text" name="title" class="form-control" value="{{$data->title}}">
							<input type="hidden" name="id" value="{{$data->id}}">
							<input type="hidden" name="oldimage" value="{{$data->image}}">
							 @if ($errors->has('title'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
										<strong>{{ $errors->first('title') }}</strong>
									</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Title Slug</label>
						<div class="col-sm-7">
							<input type="text" name="slug" class="form-control" value="{{$data->slug}}">
							<p style="font-size: 12px">(If you leave it blank, it will be generated automatically)</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category</label>
						<div class="col-sm-7 {{$errors->has('cate_id')? ' has-error':''}}">
							<select class="form-control" name="cate_id" id="cate_id">
								<option disabled selected>Select</option>
								@foreach($allcategory as $cate)
								<option value="{{$cate->id}}" @if($data->cate_id==$cate->id) selected @endif>{{$cate->name}}</option>
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
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">SubCategory</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcategory_id" id="subcategory_id">
								<option disabled selected>Select</option>
								@foreach($allsubcategory as $subcate)
								<option value="{{$subcate->id}}" @if($data->subcategory_id==$subcate->id) selected @endif>{{$subcate->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Division</label>
						<div class="col-sm-7 ">
							<select class="form-control" name="division_id" id="division_id">
								<option disabled selected>Select</option>
								@foreach($alldivision as $division)
								<option value="{{$division->id}}" @if($data->division_id==$division->id) selected @endif>{{$division->name_bn}}</option>
								@endforeach

							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">District</label>
						<div class="col-sm-7">
							<select class="form-control" name="district_id" id="district_id">
								<option disabled selected>Select</option>
								@foreach($alldistrict as $district)
								<option value="{{$district->id}}" @if($data->district_id==$district->id) selected @endif>{{$district->name_bn}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">SubDistrict</label>
						<div class="col-sm-7">
							<select class="form-control" name="subdistrict_id" id="subdistrict_id">
								<option disabled selected>Select</option>
								@foreach($allsubdistrict as $subdistrict)
								<option value="{{$subdistrict->id}}" @if($data->subdistrict_id==$subdistrict->id) selected @endif>{{$subdistrict->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Post Type</label>
						<div class="col-sm-7">
							<select class="form-control" name="post_type" id="post_type">
								<option value="1" @if($data->post_type==1) selected @endif>Photo News</option>
								<option value="2" @if($data->post_type==2) selected @endif>Video News</option>
							</select>
						</div>
					</div>
					<div id="videosection" @if($data->post_type==2) @else style="display: none" @endif>
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Video Link</label>
							<div class="col-sm-7">
								  <textarea name="video_link" class="form-control">{{$data->video_link}}</textarea>
							</div>
						</div>
					</div>
					<div id="post_news">
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image / Thumbnail Image</label>
							<div class="col-sm-7 {{$errors->has('pic')? ' has-error':''}}">
								 <input type="file" name="pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off" data-default-file="{{asset('public/uploads/newspost/bigthum/'.$data->image)}}"/>

								  @if ($errors->has('pic'))
									<span class="invalid-feedback mb-0" role="alert" style="display: flex;">
										<strong>{{ $errors->first('pic') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description</label>
						<div class="col-sm-7">
							  <textarea name="description" id="editor1" rows="10" cols="80">{{$data->description}}</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag</label>
						<div class="col-sm-7">
						  <input type="text" data-role="tagsinput" name="meta_tag" value="{{$data->meta_tag}}">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Description</label>
						<div class="col-sm-7">
							<textarea class="form-control" name="meta_description">{{$data->meta_description}}</textarea>
						</div>
					</div>
					<div class="form-group row skin-square">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>
						<div class="col-sm-3">
							<div class="i-check">
                              <input tabindex="9" name="braking_news" type="checkbox" id="square-checkbox-1" value="1" @if($data->braking_news==1) checked @else @endif>
                              <label for="square-checkbox-1">Braking News</label>
                            </div>
                        
						</div>
						<div class="col-sm-3">
                          <div class="i-check">
                              <input tabindex="10" type="checkbox" id="square-checkbox-4" name="pocket_news" value="1" @if($data->pocket_news==1) checked @else @endif>
                              <label for="square-checkbox-4">Pocket News</label>
                          </div>
						</div>
					</div>
					<div class="form-group row skin-square">
						<label for="inputEmail3" class="col-sm-4 col-form-label text-right"></label>
						<div class="col-sm-3">
							<div class="i-check">
                              <input tabindex="9" name="popular_news" type="checkbox" id="square-checkbox-1" value="1"  @if($data->popular_news==1) checked @else @endif>
                              <label for="square-checkbox-1">Popular News</label>
                            </div>
                        
						</div>
				
					</div>


					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7 text-center">
							<button type="submit" class="btn btn-success">Update News</button>
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
   $('select[name="division_id"]').on('change', function(){
             var division_id = $(this).val();
             //alert(division_id);
             if(division_id) {
                 $.ajax({
                     url: "{{  url('admin/news/getdistrict/') }}/"+division_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {

                            $('#district_id').empty();
                            $('#district_id').append(' <option disabled selected>Select</option>');
                            $.each(data,function(index,districtObj){
                            $('#district_id').append('<option value="' + districtObj.id + '">'+districtObj.name_bn+'</option>');
                          });
                         }
                 });
             } else {
                 alert('danger');
             }

         });

// subdistrict

   $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             //alert("success");
             if(district_id) {
                 $.ajax({
                     url: "{{  url('admin/news/getsubdistrict/') }}/"+district_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                            $('#subdistrict_id').empty();
                            $('#subdistrict_id').append(' <option disabled selected>Select</option>');
                            $.each(data,function(index,districtObj){
                            $('#subdistrict_id').append('<option value="' + districtObj.id + '">'+districtObj.name+'</option>');
                          });
                         }
                 });
             } else {
                 //alert('danger');
             }

         });


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
             }else{
             	$("#videosection").hide();
             }
           

         });




     });

</script>
@endsection
