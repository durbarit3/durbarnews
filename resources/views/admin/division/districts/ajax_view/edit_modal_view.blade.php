
<form class="form-horizontal" action="{{ route('admin.division.district.update', $district->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right"> Division:</label>
        <div class="col-sm-8">
            <select required class="form-control" name="division_id"  >
                @foreach ($divisions as $division)
                    <option {{ $division->id == $district->division_id ? 'SELECTED' : '' }} value="{{ $division->id }}">
                    {{ $division->name_bn }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-4 col-form-label text-right">Name :</label>
        <div class="col-sm-8">

            <input type="text" class="form-control" id="name" placeholder="Distirct Name" value="{{$district->name_bn}}" name="name" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>

