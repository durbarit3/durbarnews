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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Colors</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Theme Color</span></a>
                        </div>
                    </div>
                </div>

            </div>
        <form action="{{ route('admin.setting.theme.color.multiple.action') }}" method="post">
                @csrf
                <button type="submit" name="action_target" value="multiple_delete" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>

                <button type="submit" name="action_target" value="all_deactivate" style="margin: 5px;"  class="btn btn-sm btn-secondary">
                    <i class="fa fa-trash"></i> Deactive all</button>

                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Hover Color</th>
                                    <th>Web Color</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($themeColors as $themeColor)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="colorIds[]" class="checkbox"
                                                value="{{$themeColor->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td><span style="padding: 8px 28px;background:{{ $themeColor->hover_color }}"></span></td>
                                   <td><span style="padding: 8px 28px;background:{{ $themeColor->web_color }}"></span></td>
                                    @if($themeColor->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($themeColor->status == 1)
                                        <a href="{{ route('admin.setting.theme.color.status.update', $themeColor->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.setting.theme.color.status.update', $themeColor->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="#" data-id="{{ $themeColor->id }}" title="edit" data-toggle="modal"
                                        data-target="#editModal" class="edit_theme_color btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.setting.theme.color.delete', $themeColor->id ) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
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
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Sub-District</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.setting.theme.color.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Hover Color:</label>
                        <div class="col-sm-8">
                            <input type="color" class="form-control" value="{{ old('hover_color') }}" name="hover_color" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Web Color:</label>
                        <div class="col-sm-8">
                            <input type="color" class="form-control" value="{{ old('web_color') }}" name="web_color" required>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Theme Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

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

<script>
    $(document).ready(function () {
       $(document).on('click', '.edit_theme_color', function(){
           var theme_color_id = $(this).data('id');
           $.ajax({
               url:"{{ url('admin/setting/theme/colors/edit/') }}" + "/" + theme_color_id,
               type:'get',
               success:function(data){
                   $('.edit_modal_body').empty();
                   $('.edit_modal_body').append(data);
               }
           });
       });
   });
</script>

@endpush
