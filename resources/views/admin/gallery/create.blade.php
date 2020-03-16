@extends('admin.master')
@push('css')
<style>
    .gallery_photo {
        border: 1px solid lightgray;
        padding: 1px 8px 9px 5px;
    }

    .cross_button_area {
        height: 100%;
        width: 100%;
        display: flex;
        flex-direction: column-reverse;
        justify-content: space-around;
        align-items: center;
    }
</style>
@endpush
@section('content')
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Create Gallery Photo
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></span>
                                <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Gallery Photo</span></div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right">Gallery Thumbnail Photo:
                                </label>
                                <input type="file" class="form-control" accept="image/*" name="thumbnail_photo"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class=" col-form-label text-right">Thumbnail Photo
                                    Caption</label>
                                <input type="text" class="form-control" placeholder="Thumbnail Caption"
                                    name="thumbnail_caption" required>
                            </div>

                            <div class="form-group">
                                <div class="gallery_photos_area">
                                    <h6>Upload Gallery photos</h6>
                                    <div class="gallery_photo">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label text-right">Gallery
                                                    Photo</label>
                                                <input type="file" class="form-control" name="gallery_photo[]" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label text-right">Photo
                                                    Caption</label>
                                                <input type="text" class="form-control" placeholder="Photo Caption"
                                                    name="photo_caption[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="add_more_button btn btn-sm btn-primary mt-2">Add
                                        more</button>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-blue float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function () {
        var photo_div = '<div class="gallery_photo mt-2">';
        photo_div += '<div class="row">';
        photo_div += '<div class="col-sm-5">';
        photo_div += '<label for="inputEmail3" class=" col-form-label text-right">Gallery Photo</label>';
        photo_div += '<input type="file" class="form-control" name="gallery_photo[]" required>';
        photo_div += '</div>';
        photo_div += '<div class="col-sm-6">';
        photo_div += '<label for="inputEmail3" class=" col-form-label text-right">Photo Caption</label>';
        photo_div += '<input type="text" class="form-control" placeholder="Photo Caption" name="photo_caption[]" required>';
        photo_div += '</div>';
        photo_div += '<div class="col-sm-1">';
        photo_div += '<div class="cross_button_area">';
        photo_div += '<button onclick="delete_row(this);" type="button" class="btn btn-sm  btn-danger"><i class="fa fa-times"></i></button>';
        photo_div += '</div>';
        photo_div += '</div>';
        photo_div += '</div>';
        photo_div += '</div>';
        $('.add_more_button').on('click', function () {
            $('.gallery_photos_area').append(photo_div);
        })
    })

    function delete_row(row) {
        $(row).closest('.gallery_photo').remove();
    }
</script>



@endpush
