<div class="form-group">
    <label for="vehicle_id" class="col-sm-2 control-label">Araç Tipi</label>

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
    <label for="plate_number" class="col-sm-4 control-label">Plaka</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="plate_number" name="plate_number" value="{{ old('plate_number') ? old('plate_number') : (isset($item->plate_number) ? $item->plate_number : "") }}" autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-4 control-label">Açıklama</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ? old('description') : (isset($item->description) ? $item->description : "") }}" autocomplete="off">
    </div>
</div>
