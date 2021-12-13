<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Konum Türü</label>

    <div class="col-sm-10">

        <select name="location_type_id" id="location_type_id" class="form-control">
            <option></option>
	        @foreach ($locationTypes as $locationType)
                {{ $selected = isset($item) ? ($locationType->id == $item->location_type_id ? "selected" : "") : ""}}
		        <option {{$selected}} value="{{ $locationType->id }}">{{ $locationType->name }}</option>
	       @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Konum Adı (Türkçe)</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="name_eng" class="col-sm-2 control-label">Konum Adı (English)</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name_eng" name="name_eng" value="{{ old('name_eng') ? old('name_eng') : (isset($item->name_eng) ? $item->name_eng : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Konum Sayfa İçeriği (Türkçe)</label>

    <div class="col-sm-10">
        <textarea class="form-control editor" id="description" name="description">{!! old('description') ? old('description') : (isset($item->description) ? $item->description : "") !!}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Konum Sayfa İçeriği (English)</label>

    <div class="col-sm-10">
        <textarea class="form-control editor" id="description_eng" name="description_eng">{!! old('description_eng') ? old('description_eng') : (isset($item->description_eng) ? $item->description_eng : "") !!}</textarea>
    </div>
</div>


<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Sıra</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="orderby" name="orderby" value="{{ old('orderby') ? old('orderby') : (isset($item->orderby) ? $item->orderby : "") }}" autocomplete="off">
    </div>
</div>