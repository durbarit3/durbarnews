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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Sub-Districts</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Districts</span></a>
                        </div>
                    </div>
                </div>
            </div>
        <form  action="" method="post">
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
                                    <th>Sub District Name</th>
                                    <th>District Name</th>
                                    <th>Division Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subDistricts as $subDstrict)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteIds[]" class="checkbox"
                                                value="{{$subDstrict['id']}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $subDstrict['name'] }}</td>
                                   <td>{{ $subDstrict['district']['name_bn'] }}</td>
                                   <td>{{ $subDstrict['division']['name_bn'] }}</td>
                                    @if($subDstrict['status'] == 1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif

                                    <td>
                                        @if($subDstrict['status'] == 1)
                                        <a href="{{ route('admin.division.sub_district.status.update', $subDstrict['id'] ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.division.sub_district.status.update', $subDstrict['id'] ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="#" data-id="{{ $subDstrict['id'] }}" title="edit" data-toggle="modal"
                                        data-target="#editModal" class="edit_sub_district btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.division.sub_district.delete', $subDstrict['id'] ) }}"
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
                <form class="form-horizontal" action="{{ route('admin.division.sub_district.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label  class="col-sm-4 col-form-label text-right">Division :</label>
                        <div class="col-sm-8">
                            <select required name="division_id" id="division" class="form-control">
                                <option value="">Select Division First</option>
                                @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"> {{ $division->name_bn }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-4 col-form-label text-right">District :</label>
                        <div class="col-sm-8">
                            <select required name="district_id" id="district" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right">Sub-District Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Distirct</h5>
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
       $(document).on('change', '#division', function(){
           var division_id = $(this).val();
           $.ajax({
               url:"{{ url('admin/division/sub_district/get/district/by/division_id') }}" + "/" + division_id,
               type:'get',
               dataType:'json',
               success:function(data){
                    $('#district').empty();
                    $('#district').append('<option value="">---Select district---</option>');
                    $.each(data,function(key, value){
                        $('#district').append('<option value="'+value.id+'">'+ value.name_bn +'</option>');
                    })
               }
           });
       });
   });
</script>

<script>
    $(document).ready(function () {
       $(document).on('change', '#edit_division', function(){
           var division_id = $(this).val();
           $.ajax({
               url:"{{ url('admin/division/sub_district/get/district/by/division_id') }}" + "/" + division_id,
               type:'get',
               dataType:'json',
               success:function(data){
                    $('#edit_district').empty();
                    $('#edit_district').append('<option value="">---Select district---</option>');
                    $.each(data,function(key, value){
                        $('#edit_district').append('<option value="'+value.id+'">'+ value.name_bn +'</option>');
                    })
               }
           });
       });
   });
</script>

<script>
    $(document).ready(function () {
       $(document).on('click', '.edit_sub_district', function(){
           var sub_district_id = $(this).data('id');
           $.ajax({
               url:"{{ url('admin/division/sub_district/edit') }}" + "/" + sub_district_id,
               type:'get',
               success:function(data){
                   $('.edit_modal_body').empty();
                   $('.edit_modal_body').append(data);
               }
           });
       });
   });
</script>

<script>
    @error('name')
    toastr.error("{{ $errors->first('name') }}");
    @enderror
</script>

@endpush
