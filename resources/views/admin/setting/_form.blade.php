<div class="form-group">
    <label for="name" class="col-sm-2 control-label">İsim</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="value" class="col-sm-2 control-label">Değer</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="value" name="value"
               value="{{ old('value') ? old('value') : (isset($item->value) ? $item->value : "") }}"
                autocomplete="off">
    </div>
</div>
