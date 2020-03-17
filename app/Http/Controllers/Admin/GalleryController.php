<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Category;
use Carbon\Carbon;
use App\SubCategory;
use App\GalleryPhoto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $galleries = Gallery::with(['category', 'subCategory'])
            ->where('is_deleted', 0)
            ->select(['id', 'status', 'thumbnail_photo', 'thumbnail_caption', 'category_id', 'sub_category_id'])->get()
            ->map(function ($gallery) {
                return [
                    'id' => $gallery->id,
                    'thumbnail_photo' => $gallery->thumbnail_photo,
                    'thumbnail_caption' => $gallery->thumbnail_caption,
                    'status' => $gallery->status,
                    'category' => [
                        'name' => $gallery->category->name,
                    ],
                    'sub_category' => [
                        'name' =>  $gallery->subCategory ? $gallery->subCategory->name : 'N/A',
                    ],
                ];
            });

        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->where('is_deleted', 0)->select(['id', 'name'])->get();
        $subCategories = SubCategory::where('status', 1)->where('is_deleted', 0)->select('id', 'name')->get();
        return view('admin.gallery.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'thumbnail_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_caption' => 'required',
            'category' => 'required',
        ]);

        $thumbnail_photo = $request->file('thumbnail_photo');
        $gallery_photos = $request->file('gallery_photo');

        if ($request->file('thumbnail_photo')) {

            $thumbnailName = uniqid() . '.' . $thumbnail_photo->getClientOriginalExtension();
            Image::make($thumbnail_photo)->resize(200, 200)->save('public/uploads/gallery/thumbnail/' . $thumbnailName);
            $addGalleryPhoto = Gallery::insertGetId([
                'thumbnail_photo' => $thumbnailName,
                'thumbnail_caption' => $request->thumbnail_caption,
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
            ]);
            if (count($gallery_photos) > 0) {
                $photoCaptions = $request->photo_caption;
                $index = 0;
                foreach ($gallery_photos as $gallery_photo) {
                    $gallery_photo_name = uniqid() . '.' . $gallery_photo->getClientOriginalExtension();
                    Image::make($gallery_photo)->resize(200, 200)->save('public/uploads/gallery/' . $gallery_photo_name);
                    GalleryPhoto::insert([
                        'gallery_id' => $addGalleryPhoto,
                        'photo' => $gallery_photo_name,
                        'caption' => $photoCaptions[$index],
                    ]);
                    $index++;
                }
            }
        }

        $notification = array(
            'messege' => 'Gallery created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($galleryId)
    {

        $statusChange = Gallery::where('id', $galleryId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Gallery is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Gallery color is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function softDelete($galleryId)
    {
        Gallery::where('id', $galleryId)->update([
            'is_deleted' => 1,
        ]);

        $notification = array(
            'messege' => 'Gallery is deleted successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function hardDelete($galleryId)
    {
        $gallery = Gallery::with(['galleryPhotos'])->where('id', $galleryId)->first();
        if (public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo)) {
            unlink(public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo));
        }
        foreach ($gallery->galleryPhotos as  $galleryPhoto) {
            if (public_path('uploads/gallery/' . $galleryPhoto->photo)) {
                unlink(public_path('uploads/gallery/' . $galleryPhoto->photo));
            }
        }
        $gallery->delete();
        $notification = array(
            'messege' => 'Gallery is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($galleryId)
    {
        $gallery = Gallery::with(['galleryPhotos'])
            ->select(['id', 'category_id', 'sub_category_id', 'thumbnail_photo', 'thumbnail_caption'])
            ->where('id', $galleryId)
            ->firstOrFail();
        $categories = Category::where('status', 1)->where('is_deleted', 0)->select(['id', 'name'])->get();
        $subCategories = SubCategory::where('status', 1)->where('is_deleted', 0)->select('id', 'name')->get();
        return view('admin.gallery.edit', compact('gallery', 'categories', 'subCategories'));
    }

    public function update(Request $request, $galleryId)
    {

        $this->validate($request, [
            'old_thumbnail_photo' => 'sometimes|mimes:jpg,jpeg,png,gif',
            'old_thumbnail_caption' => 'required',
            'category' => 'required',
        ]);

        $old_thumbnail_photo = $request->file('old_thumbnail_photo');
        if ($request->file('old_thumbnail_photo')) {
            $gallery = Gallery::where('id', $galleryId)->first();
            if (public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo)) {
                unlink(public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo));
            }

            $oldThumbnailPhotoName = uniqid() . '.' . $old_thumbnail_photo->getClientOriginalExtension();
            image::make($old_thumbnail_photo)->resize(600, 450)->save('public/uploads/gallery/thumbnail/' . $oldThumbnailPhotoName);
            $gallery->thumbnail_photo = $oldThumbnailPhotoName;
            $gallery->thumbnail_caption = $request->old_thumbnail_caption;
            $gallery->category_id = $request->category;
            $gallery->sub_category_id = $request->sub_category;
            $gallery->save();
        } else {
            $gallery = Gallery::where('id', $galleryId)->first();
            $gallery->thumbnail_caption = $request->old_thumbnail_caption;
            $gallery->category_id = $request->category;
            if ($request->sub_category) {
                $gallery->sub_category_id = $request->sub_category;
            }
            $gallery->save();
        }

        $oldGalleryPhotos = $request->file('old_gallery_photo');
        if (isset($oldGalleryPhotos)) {
            if (count($oldGalleryPhotos) > 0) {
                foreach ($oldGalleryPhotos as $id => $oldGalleryPhoto) {
                    $galleryPhoto = GalleryPhoto::where('id', $id)->first();
                    if (public_path('uploads/gallery/' . $galleryPhoto->photo)) {
                        unlink(public_path('uploads/gallery/' . $galleryPhoto->photo));
                    }
                    $oldGalleryPhotoName = uniqid() . '.' . $oldGalleryPhoto->getClientOriginalExtension();
                    image::make($oldGalleryPhoto)->resize(600, 450)->save('public/uploads/gallery/' . $oldGalleryPhotoName);
                    $galleryPhoto->photo = $oldGalleryPhotoName;
                    $galleryPhoto->save();
                }
            }
        }

        $old_gallery_photo_captions = $request->old_photo_caption;
        foreach ($old_gallery_photo_captions as $id => $old_gallery_photo_caption) {
            $galleryPhoto = GalleryPhoto::where('id', $id)->first();
            $galleryPhoto->caption = $old_gallery_photo_caption;
            $galleryPhoto->save();
        }

        $newGalleryPhotos = $request->file('new_gallery_photo');
        $newGalleryPhotoCaption = $request->new_gallery_photo_caption;
        if (isset($newGalleryPhotos)) {
            if (count($newGalleryPhotos)) {
                $index = 0;
                foreach ($newGalleryPhotos as $newGalleryPhoto) {
                    $addNewPhoto = new GalleryPhoto();
                    $newGalleryPhotoName = uniqid() . '.' . $newGalleryPhoto->getClientOriginalExtension();
                    image::make($newGalleryPhoto)->resize(600, 450)->save('public/uploads/gallery/' . $newGalleryPhotoName);
                    $addNewPhoto->gallery_id = $galleryId;
                    $addNewPhoto->photo = $newGalleryPhotoName;
                    $addNewPhoto->caption = $newGalleryPhotoCaption[$index];
                    $addNewPhoto->save();
                    $index++;
                }
            }
        }

        $notification = array(
            'messege' => 'Gallery updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function galleryPhotoDeleteByAjax($galleryPhotoId)
    {
        $galleryPhoto = GalleryPhoto::where('id', $galleryPhotoId)->first();
        if (public_path('uploads/gallery/' . $galleryPhoto->photo)) {
            unlink(public_path('uploads/gallery/' . $galleryPhoto->photo));
        }
        $galleryPhoto->delete();
        return 'photo deleted';
    }

    public function trashAll()
    {
        $galleries = Gallery::with(['category', 'subCategory'])
            ->where('is_deleted', 1)
            ->select(['id', 'thumbnail_photo', 'thumbnail_caption', 'category_id', 'sub_category_id'])->get()
            ->map(function ($gallery) {
                return [
                    'id' => $gallery->id,
                    'thumbnail_photo' => $gallery->thumbnail_photo,
                    'thumbnail_caption' => $gallery->thumbnail_caption,
                    'category' => [
                        'name' => $gallery->category->name,
                    ],
                    'sub_category' => [
                        'name' =>  $gallery->subCategory ? $gallery->subCategory->name : 'N/A',
                    ],
                ];
            });

        return view('admin.gallery.trash.index', compact('galleries'));
    }

    public function refactor($galleryId)
    {
       $gallery = Gallery::where('id', $galleryId)->first();
       $gallery->is_deleted = 0;
       $gallery->save();

        $notification = array(
            'messege' => 'Gallery is refactored successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleAction(Request $request)
    {

        if ($request->galleryIds == null) {
            $notification = array(
                'messege' => 'You did not select any gallery post',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        $galleryIds = $request->galleryIds;
        $notification = '';
        if ($request->action == 'delete') {
            foreach ($galleryIds as $galleryId) {
                $gallery = Gallery::with(['galleryPhotos'])->where('id', $galleryId)->first();
                if (public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo)) {
                    unlink(public_path('uploads/gallery/thumbnail/' . $gallery->thumbnail_photo));
                }
                foreach ($gallery->galleryPhotos as  $galleryPhoto) {
                    if (public_path('uploads/gallery/' . $galleryPhoto->photo)) {
                        unlink(public_path('uploads/gallery/' . $galleryPhoto->photo));
                    }
                }
                $gallery->delete();
            }

            $notification = array(
                'messege' => 'Gallery is deleted permanently',
                'alert-type' => 'success'
            );

        }elseif($request->action == 'restore'){
            foreach ($galleryIds as $galleryId) {
                $gallery = Gallery::where('id', $galleryId)->first();
                $gallery->is_deleted = 0;
                $gallery->save();
            }

            $notification = array(
                'messege' => 'Gallery is refactored',
                'alert-type' => 'success'
            );
        }


        return Redirect()->back()->with($notification);

    }

}
