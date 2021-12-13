<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="firstname" class="col-sm-4 control-label">İsim</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="firstname" name="firstname"
                       value="{{ old('firstname') ? old('firstname') : (isset($item->firstname) ? $item->firstname : "") }}"
                       autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="lastname" class="col-sm-4 control-label">Soyisim</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="lastname" name="lastname"
                       value="{{ old('lastname') ? old('lastname') : (isset($item->lastname) ? $item->lastname : "") }}"
                       autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-4 control-label">Email</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email"
                       value="{{ old('email') ? old('email') : (isset($item->email) ? $item->email : "") }}"
                       autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="mobile" class="col-sm-4 control-label">Telefon</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="mobile" name="mobile"
                       value="{{ old('mobile') ? old('mobile') : (isset($item->mobile) ? $item->mobile : "") }}"
                       autocomplete="off">
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="form-group">
            <label for="pid" class="col-sm-4 control-label">Tc Kimlik No</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="pid" name="pid"
                       value="{{ old('pid') ? old('pid') : (isset($item->pid) ? $item->pid : "") }}"
                       autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="licence_number" class="col-sm-4 control-label">Ehliyet Tipi</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="licence_number" name="licence_number"
                       value="{{ old('licence_number') ? old('licence_number') : (isset($item->licence_number) ? $item->licence_number : "") }}"
                       autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <label for="status" class="col-sm-4 control-label">Durumu</label>

            <div class="col-sm-10">
                <select name="status" id="status" class="form-control">
                    <option></option>
                    <option value="0" {{ isset($item->status) ? ($item->status=="0" ? "selected" : "") : "" }}>Pasif</option>
                    <option value="1" {{ isset($item->status) ? ($item->status=="1" ? "selected" : "") : "" }}>Aktif</option>
                </select>
            </div>
        </div>
    </div>

</div>

