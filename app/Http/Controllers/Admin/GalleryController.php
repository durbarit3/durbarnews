<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $galleries = Gallery::select(['id', 'thumbnail_photo', 'thumbnail_caption', 'status'])->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'thumbnail_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_caption' => 'required',
        ]);
        $thumbnail_photo = $request->file('thumbnail_photo');
        $gallery_photos = $request->file('gallery_photo');

        if ($request->file('thumbnail_photo')) {

            $thumbnailName = uniqid() . '.' . $thumbnail_photo->getClientOriginalExtension();
            Image::make($thumbnail_photo)->resize(500, 600)->save('public/uploads/gallery/thumbnail/' . $thumbnailName);
            $addGalleryPhoto = Gallery::insertGetId([
                'thumbnail_photo' => $thumbnailName,
                'thumbnail_caption' => $request->thumbnail_caption
            ]);
            if (count($gallery_photos) > 0) {

                $photoCaptions = $request->photo_caption;
                $index = 0;
                foreach ($gallery_photos as $gallery_photo) {
                    $gallery_photo_name = uniqid() . '.' . $gallery_photo->getClientOriginalExtension();
                    Image::make($gallery_photo)->resize(500, 600)->save('public/uploads/gallery/' . $gallery_photo_name);
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

    public function delete($galleryId)
    {
        Gallery::where('id', $galleryId)->delete();
        $notification = array(
            'messege' => 'Gallery is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($galleryId)
    {
        $gallery = Gallery::with(['galleryPhotos'])->where('id', $galleryId)->firstOrFail();
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $galleryId)
    {

    }
}
