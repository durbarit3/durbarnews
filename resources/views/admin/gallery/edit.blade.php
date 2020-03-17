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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Gallery Photo
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel_title">
                        <a href="{{ route('admin.gallery.index') }}" class="float-right btn btn-sm btn-success">Back<span>
                            </span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 offset-2">
                <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Update Gallery Photo</span></div>
                    </div>
                    <div class="panel_body">
                        <div class="note_heading">
                            <small class="text-success">Note: Only png, jpg, jpeg, gif formated photo acceptable and photo size must be 2MB or less then.</small>
                        </div>
                        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Category:</b></label>
                                <select required  name="category" class="form-control">
                                    <option value="">Select Category First</option>
                                    @foreach ($categories as $category)
                                        <option {{ $gallery->category_id == $category->id ? 'SELECTED' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Sub-Category:</b></label>
                                <select name="sub_category" class="form-control">
                                    <option value="0">Select Category First</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option {{ $gallery->sub_category_id ? $gallery->sub_category_id == $subCategory->id ? 'SELECTED' : '' : '' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-form-label text-right"><b>Gallery Thumbnail Photo:</b>
                                </label>
                                <input  data-default-file="{{asset('public/uploads/gallery/thumbnail/'.$gallery->thumbnail_photo)}}" type="file" id="input-file-now" class="form-control dropify" size="5"
                                    accept=".jpeg, .jpg, .jpe, .png, .gif" name="old_thumbnail_photo">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class=" col-form-label text-right"> <b>Thumbnail Photo Caption</b>
                                    </label>
                                <textarea class="form-control" placeholder="Thumbnail Caption" name="old_thumbnail_caption"
                                 cols="3" rows="3">{{ $gallery->thumbnail_caption }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="gallery_photos_area">
                                    <div class="form-group"><p><b>All previous photos</b> </p></div>
                                    @foreach ($gallery->galleryPhotos as $galleryPhoto)
                                    <div class="previous_gallery_photo">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <label for="inputEmail3" class=" col-form-label text-right">Gallery Photo</label>
                                                <input data-default-file="{{asset('public/uploads/gallery/'.$galleryPhoto->photo)}}" type="file" id="input-file-now" class="form-control dropify"
                                                    size="5" accept=".jpeg, .jpg, .jpe, .png, .gif"
                                                    name="old_gallery_photo[{{ $galleryPhoto->id }}]" >
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="inputEmail3" class=" col-form-label text-right">Photo Details</label>
                                                <textarea class="form-control" placeholder="Photo Details"
                                                name="old_photo_caption[{{$galleryPhoto->id}}]"  id="" cols="3" rows="3">{{ $galleryPhoto->caption }}</textarea>
                                            </div>
                                            <div class="col-sm-1">
                                                <div class="cross_button_area">
                                                <button data-id="{{ $galleryPhoto->id }}" onclick="delete_previous_photo(this);" type="button" class="btn btn-sm cross_button btn-danger"><i class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="form-group mt-2"><p><b>Add more photos section</b> </p></div>
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
        photo_div += '<input required type="file" id="input-file-now" name="new_gallery_photo[]" class="form-control dropify" size="5" accept=".jpeg, .jpg, .jpe, .png, .gif">';
        photo_div += '</div>';
        photo_div += '<div class="col-sm-6">';
        photo_div += '<label for="inputEmail3" class=" col-form-label text-right">Photo Details</label>';
        photo_div += ' <textarea required class="form-control"  placeholder="Photo Details"name="new_gallery_photo_caption[]" id="" cols="3" rows="3"></textarea>';
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

<script>
    function delete_previous_photo(row) {
        swal({
                title: "Are you sure to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                      var gallery_photo_id = $(row).data('id');
                      $.ajax({
                          url:"{{url('admin/galleries/gallery/photo/delete/')}}"+"/"+gallery_photo_id,
                          type:'get',
                          success:function(data){
                              console.log(data);
                          }
                      });
                      $(row).closest('.previous_gallery_photo').remove();
                    } else {
                        swal("Safe Data!");
                    }
                });
    }
</script>

{{-- data-default-file="{{asset('public/admins/images/logo')}}/{{$logos->frontlogo}}" --}}

@endpush
