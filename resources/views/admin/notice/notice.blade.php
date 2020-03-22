@extends('admin.master')
@section('title', 'Notices')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel_title">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Notice List</span>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="panel_title">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i></span> <span>Add Notice</span></a>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{route('admin.notice.multi.delete')}}" id="multiple_delete" method="post">
            @csrf
            <button type="submit"  style="margin: 5px;" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Delete all</button>
            <div class="panel_body">

                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr>
                                <th>
                                    <label class="chech_container mb-1 p-0">
                                        <span style="margin-left: 30px;font-size:15px">Select all</span>
                                        <input type="checkbox" id="check_all">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>SL</th>
                                <th>Notice</th>
                                <th>Status </th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($notices as $notice)

                            <tr>
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="deleteId[]" class="checkbox" value="{{$notice->id}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>{{$notice->id}}</td>
                                <td>{!!$notice->notice!!}</td>
                                <td>
                                    @if($notice->status == 1)

                                    <a href="{{route('admin.notice.status.update',$notice->id)}}" class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>

                                    @else
                                    <a href="{{route('admin.notice.status.update',$notice->id)}}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                </td>

                                <td>
                                    | <a class="edit_route btn btn-sm btn-blue text-white editotion" data-id="{{$notice->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> |
                                    <a id="delete" href="{{route('admin.notice.delete',$notice->id)}}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Add Notice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{route('admin.notice.store')}}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Notice:</label>
                        <div class="col-sm-8">
                            <textarea rows="3" id="editor1" class="form-control" name="notice" require></textarea>
                            @error('notice')

                                <div class="alert alert-danger my-2">
                                    {{$message}}
                                </div>
                            @enderror
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
                <h5 class="modal-title" id="exampleModalLabel">Update Notice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" action="{{route('admin.notice.update')}}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Notice:</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="id" id="id">
                            <textarea rows="3" id="editor2" class="form-control" name="notice" require>

                            </textarea>
                            @error('notice')

                                <div class="alert alert-danger my-2">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editotion').on('click', function() {
            var id = $(this).data('id');


            if (id) {
                $.ajax({
                    url: "{{ url('admin/notice/edit') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $("#id").val(data.id);
                        $("#editor2").val(data.notice);


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

