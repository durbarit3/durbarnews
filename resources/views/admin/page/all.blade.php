@extends('admin.master')
@section('content')
<div class="middle_content_wrapper">
					<section class="page_content">
						<!-- panel -->
						<div class="panel">
							<div class="panel_header">
								<div class="panel_title">
									<span class="panel_icon"><i class="fas fa-border-all"></i></span><span>data table</span>
								</div>
                            </div>
                            <form action="{{route('admin.page.multi.delete')}}" id="multiple_delete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger my-2 py-2">
                    <i class="fa fa-trash"></i> Delete all</button>
							<div class="panel_body">
								<div class="table-responsive">
                                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
		                                <thead>
		                                    <tr>
                                            <td>
													<label class="chech_container">
														<input type="checkbox" id="selectall">
                                                        <span class="checkmark"></span>
                                                        <small>Select All</small>
                                                        
													</label>
		                                        </td>
		                                        <th>Title</th>
		                                        <th>Slug </th>
		                                        <th>Description </th>
		                                        <th>Meta Tag</th>
		                                        <th>Meta Description </th>
		                                        <th>Action</th> 
		                                    </tr>
		                                </thead>
		                                <tbody>
                                            @foreach($pages as $page)
                                            
		                                    <tr>
		                                        <td>
													<label class="chech_container mb-4">
														<input type="checkbox" name="multidelete[]" class="checkbox"  value="{{$page->id}}" >
														<span class="checkmark"></span>
													</label>
		                                        </td>
		                                        <td>{{$page->title}}</td>
		                                        <td>{{$page->slug}}</td>
		                                        <td>{!!substr($page->description,0,60)!!}..</td>
		                                        <td>{{$page->meta_tag}}</td>
		                                        <td>{{$page->meta_description}}</td>
		                                     
		                                        <td>
		                                            
		                                            <a href="{{route('admin.page.show',$page->id)}}" class="btn btn-primary btn-sm my-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update"><i class="far fa-eye"></i></a>
		                                            <a href="{{route('admin.page.edit',$page->id)}}" class="btn btn-warning btn-sm my-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update"><i class="far fa-edit"></i></a>
		                                            <a href="{{route('admin.page.delete',$page->id)}}" id="delete" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete "><i class="far fa-trash-alt"></i></a>
		                                        </td>
                                            </tr>
                                           
                                            @endforeach
		                                
		                                </tbody>
		                            </table>
		                          </div>
                            </div> <!--/ panel body -->
                            </form>
						</div><!--/ panel -->

			



					</section>
					<!--/ page content -->

				<!-- start code here... -->

					
                </div><!--/middle content wrapper-->
                @endsection