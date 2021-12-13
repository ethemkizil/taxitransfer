<div class="form-group">
    <label for="booking_id" class="col-sm-2 control-label">Rezervasyon</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="booking_id" name="booking_id"
               value="{{ old('booking_id') ? old('booking_id') : (isset($item->booking_id) ? $item->booking_id : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="datetime" class="col-sm-2 control-label">Tarih-Saat</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="datetime" name="datetime"
               value="{{ old('datetime') ? old('datetime') : (isset($item->datetime) ? $item->datetime : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="type" class="col-sm-2 control-label">Tür</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="type" name="type"
               value="{{ old('type') ? old('type') : (isset($item->type) ? $item->type : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="total_amount" class="col-sm-2 control-label">Toplam Ücret</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="total_amount" name="total_amount"
               value="{{ old('total_amount') ? old('total_amount') : (isset($item->total_amount) ? $item->total_amount : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="paid_amount" class="col-sm-2 control-label">Ödenen Ücret</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="paid_amount" name="paid_amount"
               value="{{ old('paid_amount') ? old('paid_amount') : (isset($item->paid_amount) ? $item->paid_amount : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="driver_amount" class="col-sm-2 control-label">Sürücü Ücreti</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="driver_amount" name="driver_amount"
               value="{{ old('driver_amount') ? old('driver_amount') : (isset($item->driver_amount) ? $item->driver_amount : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="fee" class="col-sm-2 control-label">Ücret</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="fee" name="fee"
               value="{{ old('fee') ? old('fee') : (isset($item->fee) ? $item->fee : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="payer" class="col-sm-2 control-label">Ödeyen Kişi</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="payer" name="payer"
               value="{{ old('payer') ? old('payer') : (isset($item->payer) ? $item->payer : "") }}"
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
