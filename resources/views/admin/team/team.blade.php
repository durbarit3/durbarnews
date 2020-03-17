@extends('admin.master')
@section('content')
<style>
    .add_more_button_social {
        border: 1px solid green;
        cursor: pointer;
    }
</style>
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Team Members List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Member</span></a>
                    </div>
                </div>
            </div>
        </div>

        
        <form action="{{route('admin.team.multi.delete')}}" id="multiple_delete" method="post">
            @csrf
            <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Delete all</button>
            <div class="panel_body">

                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr>
                                <th>
                                    <label class="chech_container mb-1 p-0">
                                        Select all
                                        <input type="checkbox" id="check_all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>Image</th>
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($teams as $team)

                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$team->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                
                                <td>{{$team->name}}</td>
                                <td>{{$team->designation}}</td>
                                <td>{{$team->email}}</td>
                                <td>{{$team->phone}}</td>
                                <td>{{$team->image}}</td>
                                

                                
                                <td>
                                    @if($team->status ==1)
                                    <a href="{{route('admin.team.status',$team->id)}}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{route('admin.team.status',$team->id)}}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif

                                </td>

                                <td>
                                    | <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$team->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{route('admin.team.delete',$team->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>


                            @endforeach   

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <!--/ panel body -->
    </div>
    <!--/ panel -->
</section>
<!--/ page content -->

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Team Member</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
















            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('admin.team.create')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Designation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation">
                            @error('designation')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email">
                            @error('email')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone">
                            @error('phone')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address">
                            @error('address')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="description">
                            @error('description')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Facebook Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook"></i></span>
                                </div>
                                <input type="hidden" name="facebook_logo" class="form-control" value="fab fa-facebook">
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook" value="">
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Twitter Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                                </div>
                                <input type="hidden" name="twitter_logo" class="form-control" value="fab fa-twitter">
                                <input type="text" name="twitter" class="form-control" placeholder="Twitter" value="">
                            </div>

                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Instagram Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram"></i></span>
                                </div>
                                <input type="hidden" name="instagram_logo" class="form-control" value="fab fa-instagram">
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="">
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Youtube Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                                </div>
                                <input type="hidden" name="youtube_logo" class="form-control" value="fab fa-youtube">
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="">
                            </div>

                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="image">
                            
                        </div>
                    </div>


                    









                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>













<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Team Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('admin.team.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Name</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" name="id" id="id" required>
                            <input type="text" class="form-control" name="name" id="name" required>
                            @error('name')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Designation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation" id="designation">
                            @error('designation')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" id="email">
                            @error('email')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" id="phone">
                            @error('phone')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" id="address">
                            @error('address')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="description" id="description">
                            @error('description')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Facebook Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook"></i></span>
                                </div>
                                <input type="hidden" name="facebook_logo" class="form-control" value="fab fa-facebook">
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook" id="facebook" value="">
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Twitter Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                                </div>
                                <input type="hidden" name="twitter_logo" class="form-control" value="fab fa-twitter">
                                <input type="text" name="twitter" class="form-control" placeholder="Twitter" id="twitter" value="">
                            </div>

                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Instagram Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram"></i></span>
                                </div>
                                <input type="hidden" name="instagram_logo" class="form-control" value="fab fa-instagram">
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram" id="instagram" value="">
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Youtube Link</label>
                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                                </div>
                                <input type="hidden" name="youtube_logo" class="form-control" value="fab fa-youtube">
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube" value="" id="youtube">
                            </div>

                        </div>
                    </div>


                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Image</label>
                        <div class="col-sm-4">
                            <input type="file"  class="form-control" id="image" name="image">
                            
                        </div>
                        <div class="col-sm-4">
                            <img src="" id="edit_vst_photo" width="60%">
                        </div>

                    </div>


                    









                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            

            if (id) {
                $.ajax({
                    url: "{{ url('admin/team/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#id").val(data.id);
                        $("#name").val(data.name);
                        $("#designation").val(data.designation);
                        $("#email").val(data.email);
                        $("#phone").val(data.phone);
                        $("#address").val(data.address);
                        $("#description").val(data.description);
                        $("#facebook").val(data.facebook);
                        $("#twitter").val(data.twitter);
                        $("#instagram").val(data.instagram);
                        $("#youtube").val(data.youtube);
                        var photo = data.image;
                        
                        $('#edit_vst_photo').attr("src","{{asset('public/admins/images/team/')}}/"+photo);
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>

<script type="text/javascript">

    $(document).ready(function () {

        $('#check_all').on('click', function (e) {
            

            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);

            } else {

                $(".checkbox").prop('checked', false);

            }

        });

    });

</script>

@endsection

@push('js')





@endpush