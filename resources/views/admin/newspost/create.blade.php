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
				<div class="panel_body">
					<form class="form-horizontal" action="{{route('admin.poll.submit')}}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Title</label>
						<div class="col-sm-7">
							<input type="text" name="" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Title Slug</label>
						<div class="col-sm-7">
							<input type="text" name="" class="form-control">
							<p style="font-size: 12px">(If you leave it blank, it will be generated automatically)</p>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Category</label>
						<div class="col-sm-7">
							<select class="form-control" name="cate_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">SubCategory</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcate_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Division</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcate_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">District</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcate_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">SubDistrict</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcate_id">
								<option></option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Post Type</label>
						<div class="col-sm-7">
							<select class="form-control" name="subcate_id">
								<option>Photo News</option>
								<option>Video News</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Image</label>
						<div class="col-sm-7">
							 <input type="file" name="father_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Description</label>
						<div class="col-sm-7">
							 <textarea name="editor1" id="editor1" rows="10" cols="80"> </textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Tag</label>
						<div class="col-sm-7">
							<input type="text" name="" class="form-control">
							
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Meta Description</label>
						<div class="col-sm-7">
							<textarea class="form-control"></textarea>
							
						</div>
					</div>
					<div class="form-group row">
						<label for="inputEmail3" class="col-sm-3 col-form-label text-right"></label>
						<div class="col-sm-7 text-center">
							<button type="submit" class="btn btn-success">Add News</button>
						</div>
					</div>


				
				</form>
				</div>
			</div>
		</section>
	</div>

@endsection
