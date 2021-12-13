<div class="form-group">
    <label for="driver_id" class="col-sm-2 control-label">Sürücü</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="driver_id" name="driver_id" value="{{ old('driver_id') ? old('driver_id') : (isset($item->driver_id) ? $item->driver_id : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="datetime" class="col-sm-2 control-label">Tarih-Saat</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="datetime" name="datetime" value="{{ old('datetime') ? old('datetime') : (isset($item->datetime) ? $item->datetime : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="type" class="col-sm-2 control-label">Tür</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="type" name="type" value="{{ old('type') ? old('type') : (isset($item->type) ? $item->type : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="amount" class="col-sm-2 control-label">Miktar</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') ? old('amount') : (isset($item->amount) ? $item->amount : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="after_balance" class="col-sm-2 control-label">Kalan</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="after_balance" name="after_balance" value="{{ old('after_balance') ? old('after_balance') : (isset($item->after_balance) ? $item->after_balance : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="driver_cost" class="col-sm-2 control-label">Sürücü Maliyeti</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="driver_cost" name="driver_cost" value="{{ old('driver_cost') ? old('driver_cost') : (isset($item->driver_cost) ? $item->driver_cost : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="is_paid" class="col-sm-2 control-label">Ücretli</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="is_paid" name="is_paid" value="{{ old('is_paid') ? old('is_paid') : (isset($item->is_paid) ? $item->is_paid : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="status" class="col-sm-2 control-label">Durum</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status" value="{{ old('status') ? old('status') : (isset($item->status) ? $item->status : "") }}"  autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Açıklama</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ? old('description') : (isset($item->description) ? $item->description : "") }}"  autocomplete="off">
    </div>
</div>
