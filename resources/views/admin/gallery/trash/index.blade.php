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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Trashed Gallery posts</span>
                        </div>
                    </div>
                </div>
            </div>
        <form action="{{ route('admin.gallery.trash.multiple.action') }}" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" name="action" value="delete" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <button  type="submit" name="action" value="restore" style="margin: 5px;" class="btn btn-sm btn-info">
                    <i class="fas fa-recycle"></i> Refactor all</button>
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
                                    <th>Thumbnail Photo</th>
                                    <th>Heading</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                <tr class="text-center">
                                <td>
                                    <label class="chech_container mb-4">
                                        <input type="checkbox" name="galleryIds[]" class="checkbox"
                                            value="{{$gallery['id']}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td><img src="{{ asset('public/uploads/gallery/thumbnail/'.$gallery['thumbnail_photo']) }}" height="60" width="50"></td>
                                <td>{{ $gallery['thumbnail_caption'] }}</td>
                                <td>{{ $gallery['category']['name'] }}</td>
                                <td>{{ $gallery['sub_category']['name'] }}</td>
                                <td>
                                | <a href="{{ route('admin.gallery.trash.refactor', $gallery['id']) }}" class="btn btn-sm btn-blue text-white"><i class="fas fa-recycle"></i></a> |
                                    <a id="delete" href="{{ route('admin.gallery.trash.hard.delete', $gallery['id'] ) }}"
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
