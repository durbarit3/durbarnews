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
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Hostel List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Hostel</span></a>
                    </div>
                </div>
            </div>
        </div>

        {{$teams}}
        <form action="" method="post">
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
                                <th>Room Type</th>
                                <th>Description</th>
                                <th>Status </th>
                                <th>Price </th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>dsfgdsf</td>
                                <td>dsgfdsgfds</td>
                                <td>

                                    <a href="" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>

                                    <a href="" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>

                                </td>

                                <td>
                                    | <a class="edit_route btn btn-sm btn-blue text-white" data-id="" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="" class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>




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
                <h4 class="modal-title">Add Category</h4>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Designation</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="designation">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Phone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Address</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address">
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Description</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="description">
                            
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
                                <input type="text" name="instagram" class="form-control" placeholder="Twitter" value="">
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Route</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="room_type" id="room_type" required>
                            <input type="hidden" name="id" id="id">
                            <span class="text-danger">{{ $errors->first('room_type') }}</span>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right mt-2">Description:</label>
                        <div class="col-sm-8 mt-2">
                            <textarea rows="3" class="form-control" id="description" name="description" require></textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        var social_div = '<div class="form-group team_area row">';

        social_div += '<label for="inputEmail3" class="col-sm-3 col-form-label text-right">Add Social Link:</label>';
        social_div += '<div class="col-sm-4">';
        social_div += '<input type="text" placeholder="Enter Social Logo" class="form-control" name="social_logo[]" required>';

        social_div += '</div>';
        social_div += '<div class="col-sm-4">';

        social_div += '<input type="text" placeholder="Enter Social Link" class="form-control" name="social_link[]" required>';

        social_div += '</div>';
        social_div += '<div class="col-sm-1">';
        social_div += '<div class="cross_button_area">';
        social_div += '<button onclick="delete_row(this);" type="button" class="btn btn-sm  btn-danger"><i class="fa fa-times"></i></button>';
        social_div += '</div>';
        social_div += '</div>';
        social_div += '</div>';



        $('.add_more_button_social').on('click', function() {
            $('.social_area').append(social_div);
        })
    })

    function delete_row(row) {
        $(row).closest('.team_area').remove();
    }
</script>

@endsection

@push('js')


<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');

            if (id) {
                $.ajax({
                    url: "{{ url('admin/hostel/room/type/edit/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        $("#room_type").val(data.room_type);
                        $("#description").val(data.description);
                        $("#id").val(data.id);
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>



@endpush