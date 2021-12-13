<div class="form-group">
    <label for="name" class="col-sm-2 control-label">İsim</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="email" name="email"
               value="{{ old('email') ? old('email') : (isset($item->email) ? $item->email : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Telefon</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="phone" name="phone"
               value="{{ old('phone') ? old('phone') : (isset($item->phone) ? $item->phone : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="request" class="col-sm-2 control-label">Talep</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="request" name="request"
               value="{{ old('request') ? old('request') : (isset($item->request) ? $item->request : "") }}"
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
