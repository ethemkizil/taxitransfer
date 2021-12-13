<div class="form-group">
    <label for="start_location_id" class="col-sm-2 control-label">Kalkış Noktası</label>

    <div class="col-sm-10">

        <select name="start_location_id" id="start_location_id" class="form-control">
            <option></option>
            @foreach ($locations as $location)
                <option {{ isset($item) ? ($location->id == $item->start_location_id ? "selected" : "") : "" }} value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="stop_location_id" class="col-sm-2 control-label">Varış Noktası</label>

    <div class="col-sm-10">

        <select name="stop_location_id" id="stop_location_id" class="form-control">
            <option></option>
            @foreach ($locations as $location)
                <option {{isset($item) ? ($location->id == $item->stop_location_id ? "selected" : "") : ""}} value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="vehicle_id" class="col-sm-2 control-label">Seyahat Aracı</label>

    <div class="col-sm-10">

        <select name="vehicle_id" id="vehicle_id" class="form-control">
            <option></option>
            @foreach ($vehicles as $vehicle)
                <option {{isset($item) ? ($vehicle->id == $item->vehicle_id ? "selected" : "") : ""}} value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="price" class="col-sm-2 control-label">Ücret</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="price" name="price"
               value="{{ old('price') ? old('price') : (isset($item->price) ? $item->price : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="travel_time" class="col-sm-2 control-label">Seyahat Süresi</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="travel_time" name="travel_time"
               value="{{ old('travel_time') ? old('travel_time') : (isset($item->travel_time) ? $item->travel_time : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="distance" class="col-sm-2 control-label">Seyahat Mesafe</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="distance" name="distance"
               value="{{ old('distance') ? old('distance') : (isset($item->distance) ? $item->distance : "") }}" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="roundtrip" class="col-sm-2 control-label">Ters Yöne Aynı Fiyatı Ekle</label>

    <div class="col-sm-10">
        <div class="radio check">
            <input type="checkbox" value="1" name="roundtrip" id="roundtrip" {{ old('roundtrip') ? (old('roundtrip')==1 ? "checked" : "") : (isset($item->roundtrip) ? ($item->roundtrip==1 ? "checked" : "") : "checked") }}>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Durum</label>

    <div class="col-sm-10">
        <select name="status" id="status" class="form-control">
            <option></option>
            <option value="0" {{ isset($item->status) ? ($item->status=="0" ? "selected" : "") : "" }}>Pasif</option>
            <option value="1" {{ isset($item->status) ? ($item->status=="1" ? "selected" : "") : "" }}>Aktif</option>
        </select>
    </div>
</div>
