
<form class="form-horizontal" action="{{ route('admin.division.sub_district.update', $subDistrict->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right"> Division:</label>
        <div class="col-sm-8">
            <select required class="form-control" id="edit_division" name="division_id"  >
                @foreach ($divisions as $division)
                    <option {{ $division->id == $subDistrict->division_id ? 'SELECTED' : '' }} value="{{ $division->id }}">
                    {{ $division->name_bn }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right"> District:</label>
        <div class="col-sm-8">
            <select required class="form-control" id="edit_district" name="district_id"  >
                @foreach ($districts as $districts)
                    <option {{ $districts->id == $subDistrict->districts_id ? 'SELECTED' : '' }} value="{{ $districts->id }}">
                    {{ $districts->name_bn }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Name :</label>
        <div class="col-sm-8">

            <input type="text" class="form-control" id="name" placeholder="Distirct Name" value="{{$subDistrict->name}}" name="name" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>
