
<form class="form-horizontal" action="{{ route('admin.setting.theme.color.update', $themeColor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Hover Color :</label>
        <div class="col-sm-8">
            <input type="color" class="form-control" id="hover_color" placeholder="Hover color" value="{{$themeColor->hover_color}}" name="hover_color" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Web Color :</label>
        <div class="col-sm-8">
            <input type="color" class="form-control" id="web_color" placeholder="Web color" value="{{$themeColor->web_color}}" name="web_color" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>
