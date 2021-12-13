<div class="form-group">
    <label for="driver_id" class="col-sm-2 control-label">Sürücü</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="driver_id" name="driver_id"
               value="{{ old('driver_id') ? old('driver_id') : (isset($item->driver_id) ? $item->driver_id : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="address" class="col-sm-2 control-label">Adres</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="address" name="address"
               value="{{ old('address') ? old('address') : (isset($item->address) ? $item->address : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="city" class="col-sm-2 control-label">Şehir</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="city" name="city"
               value="{{ old('city') ? old('city') : (isset($item->city) ? $item->city : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="state" class="col-sm-2 control-label">state</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="state" name="state"
               value="{{ old('state') ? old('state') : (isset($item->state) ? $item->state : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="zipcode" class="col-sm-2 control-label">Posta Kodu</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="zipcode" name="zipcode"
               value="{{ old('zipcode') ? old('zipcode') : (isset($item->zipcode) ? $item->zipcode : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="country" class="col-sm-2 control-label">Ülke</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="country" name="country"
               value="{{ old('country') ? old('country') : (isset($item->country) ? $item->country : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Durum</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status"
               value="{{ old('status') ? old('status') : (isset($item->status) ? $item->status : "") }}"
                autocomplete="off">
    </div>
</div>
