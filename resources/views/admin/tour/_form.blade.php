<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Tur Adı</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Başlangıç Noktası</label>

    <div class="col-sm-10">

        <select name="start_location_id" id="start_location_id" class="form-control">
            <option></option>
            @foreach ($locations as $location)
                {{ $selected = isset($item) ? ($location->id == $item->start_location_id ? "selected" : "") : ""}}
                <option {{$selected}} value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Bitiş Noktası</label>

    <div class="col-sm-10">

        <select name="stop_location_id" id="stop_location_id" class="form-control">
            <option></option>
            @foreach ($locations as $location)
                {{ $selected = isset($item) ? ($location->id == $item->stop_location_id ? "selected" : "") : ""}}
                <option {{$selected}} value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="date" class="col-sm-2 control-label">Tarih</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="date" name="date" value="{{ old('date') ? old('date') : (isset($item->date) ? $item->date : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Tur Kategorisi</label>

    <div class="col-sm-10">

        <select name="tour_category_id" id="tour_category_id" class="form-control">
            <option></option>
            @foreach ($tourCategories as $tourCategory)
                {{ $selected = isset($item) ? ($tourCategory->id == $item->tour_category_id ? "selected" : "") : ""}}
                <option {{$selected}} value="{{ $tourCategory->id }}">{{ $tourCategory->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="duration" class="col-sm-2 control-label">Süre</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') ? old('duration') : (isset($item->duration) ? $item->duration : "") }}"  autocomplete="off">
    </div>
</div>
