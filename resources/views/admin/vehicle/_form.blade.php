<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Araç Adı</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="passenger" class="col-sm-2 control-label">Yolcu Kapasitesi</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="passenger" name="passenger"
               value="{{ old('passenger') ? old('passenger') : (isset($item->passenger) ? $item->passenger : "") }}"
               autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="luggage" class="col-sm-2 control-label">Bagaj Kapasitesi</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="luggage" name="luggage"
               value="{{ old('luggage') ? old('luggage') : (isset($item->luggage) ? $item->luggage : "") }}"
               autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Açıklama</label>

    <div class="col-sm-10">
        <textarea class="form-control" name="description"
                  id="description">{{ old('description') ? old('description') : (isset($item->description) ? $item->description : "") }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="userLimit" class="col-sm-2 control-label">Araç Fotografı</label>
    <input type="file" class="form-control" name="pictureNew" id="pictureNew"/>
    <hr>
    @if(isset($item->picture))
        <img src="{{url('uploads/'.$route_path.'/'.$item->picture)}}" alt="{{$item->picture}}" width="200">
    @endif
</div>

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Aracın Durumu</label>

    <div class="col-sm-10">
        <select name="status" id="status" class="form-control">
            <option></option>
            <option value="0" {{ isset($item->status) ? ($item->status=="0" ? "selected" : "") : "" }}>Pasif</option>
            <option value="1" {{ isset($item->status) ? ($item->status=="1" ? "selected" : "") : "" }}>Aktif</option>
        </select>
    </div>
</div>
