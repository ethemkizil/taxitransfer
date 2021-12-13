<div class="form-group">
    <label for="site_url" class="col-sm-2 control-label">Url</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="site_url" name="site_url" value="{{ old('site_url') ? old('site_url') : (isset($item->site_url) ? $item->site_url : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="logo" class="col-sm-2 control-label">Logo</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="logo" name="logo" value="{{ old('logo') ? old('logo') : (isset($item->logo) ? $item->logo : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="site_name" class="col-sm-2 control-label">Site İsmi</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="site_name" name="site_name" value="{{ old('site_name') ? old('site_name') : (isset($item->site_name) ? $item->site_name : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Durum</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status" value="{{ old('status') ? old('status') : (isset($item->status) ? $item->status : "") }}"  autocomplete="off">
    </div>
</div>
