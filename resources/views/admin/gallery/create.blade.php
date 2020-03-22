@extends('admin.master')
@section('title', 'Create Gallery')
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

    .dropify-wrapper {
        display: block;
        position: relative;
        cursor: pointer;
        overflow: hidden;
        width: 100%;
        max-width: 100%;
        height: 0px;
        padding: 38px 10px;
        font-family: "Roboto", "Helvetica Neue", "Helvetica", "Arial";
        font-size: 14px;
        line-height: 22px;
        color: #777;
        background-color: #FFF;
        background-image: none;
        text-align: center;
        border: 2px solid #E5E5E5;
        -webkit-transition: border-color 0.15s linear;
        transition: border-color 0.15s linear;
    }

    .cross_button {
        margin-top: 7px;
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

                </div>
            </div>
            <div class="col-lg-8 offset-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add Gallery Photo</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="note_heading">
                            <small class="text-success">Note: Only png, jpg, jpeg, gif formated photo acceptable and photo size must be 2MB or less then.</small>
                        </div>
                        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Category:</b></label>
                                <select required  name="category" class="form-control">
                                    <option value="">Select Category First</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Sub-Category:</b></label>
                                <select name="sub_category" class="form-control">
                                    <option value="">Select Category First</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Gallery Thumbnail Photo:</b>
                                </label>
                                <input type="file" id="input-file-now" class="form-control dropify" size="5"
                                    accept=".jpeg, .jpg, .jpe, .png, .gif" name="thumbnail_photo" required>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class=" col-form-label text-right"> <b>Gallery Heading </b>
                                    </label>
                                <textarea class="form-control" placeholder="Thumbnail Caption" name="thumbnail_caption"
                                    required cols="3" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="gallery_photos_area">
                                    <h6>Upload Gallery photos</h6>
                                    <div class="gallery_photo">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label text-right">Gallery
                                                    Photo</label>
                                                <input type="file" id="input-file-now" class="form-control dropify"
                                                    size="5" accept=".jpeg, .jpg, .jpe, .png, .gif"
                                                    name="gallery_photo[]" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label text-right">Photo
                                                    Details</label>
                                                <textarea class="form-control" placeholder="Photo Details"
                                                    name="photo_caption[]" required id="" cols="3" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="add_more_button btn btn-sm btn-primary mt-2">Add
                                        more</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
{{-- <script src="{{asset('public/admins')}}/plugins/dist/js/dropify.min.js"></script> --}}

<!-- <script>
    $(document).ready(function () {
        // Basic

    });
</script> -->

<script>
    $(document).ready(function () {
        var photo_div = '<div class="gallery_photo mt-2">';
        photo_div += '<div class="row">';
        photo_div += '<div class="col-sm-5">';
        photo_div += '<label for="inputEmail3" class=" col-form-label text-right">Gallery Photo</label>';
        photo_div += '<input type="file" id="input-file-now" name="gallery_photo[]" class="form-control dropify" size="5" accept=".jpeg, .jpg, .jpe, .png, .gif" required>';
        photo_div += '</div>';
        photo_div += '<div class="col-sm-6">';
        photo_div += '<label for="inputEmail3" class=" col-form-label text-right">Photo Details</label>';
        photo_div += ' <textarea class="form-control"  placeholder="Photo Details"name="photo_caption[]" required id="" cols="3" rows="3"></textarea>';
        photo_div += '</div>';
        photo_div += '<div class="col-sm-1">';
        photo_div += '<div class="cross_button_area">';
        photo_div += '<button onclick="delete_row(this);" type="button" class="btn btn-sm cross_button btn-danger"><i class="fa fa-times"></i></button>';
        photo_div += '</div>';
        photo_div += '</div>';
        photo_div += '</div>';
        photo_div += '</div>';

        $('.add_more_button').on('click', function () {
            $('.gallery_photos_area').append(photo_div);
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        })
    })

    function delete_row(row) {
        $(row).closest('.gallery_photo').remove();
    }

</script>

<script>
    @error('gallery_photo')
    toastr.error("{{ $errors->first('gallery_photo') }}");
    @enderror
</script>

{{-- data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->frontlogo}}" --}}

@endpush
