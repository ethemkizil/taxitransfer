<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Konum Türü</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}" autocomplete="off">
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
