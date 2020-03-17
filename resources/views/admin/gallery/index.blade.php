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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Galleries</span>
                        </div>
                    </div>
                </div>
            </div>
        <form id="multiple_delete" action="" method="post">
                @csrf
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">

                                    <th>Gallary Thumbnail Photo</th>
                                    <th>Heading</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                <tr class="text-center">
                                <td><img src="{{ asset('public/uploads/gallery/thumbnail/'.$gallery['thumbnail_photo']) }}" height="60" width="50"></td>
                                <td>{{ $gallery['thumbnail_caption'] }}</td>
                                <td>{{ $gallery['category']['name'] }}</td>
                                <td>{{ $gallery['sub_category']['name'] }}</td>
                                    @if($gallery['status'] == 1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif

                                    <td>
                                        @if($gallery['status'] == 1)
                                        <a href="{{ route('admin.gallery.status.update', $gallery['id'] ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.gallery.status.update', $gallery['id'] ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="{{ route('admin.gallery.edit', $gallery['id']) }}" class="btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.gallery.soft.delete', $gallery['id'] ) }}"
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

@endpush
