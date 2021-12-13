<div class="form-group">
    <label for="driver_id" class="col-sm-2 control-label">Sürücü</label>

    <div class="col-sm-10">

        <select name="driver_id" id="driver_id" class="form-control select2">
            <option></option>
            @foreach ($drivers as $driver)
                <option {{$driver->id == $bookingDetails->driver_id ? "selected" : ""}}  value="{{ $driver->id }}">{{ $driver->firstname }} {{ $driver->lastname }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="plate_id" class="col-sm-2 control-label">Plaka</label>

    <div class="col-sm-10">

        <select name="plate_id" id="plate_id" class="form-control select2">
            <option></option>
            @foreach ($plates as $plate)
                <option {{$plate->id == $bookingDetails->plate_id ? "selected" : ""}}  value="{{ $plate->id }}">{{ $plate->plate_number }}</option>
            @endforeach
        </select>
    </div>
</div>