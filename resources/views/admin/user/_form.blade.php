<div class="form-group">
    <label for="username" class="col-sm-2 control-label">Kullanıcı Adı</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username"
               value="{{ old('username') ? old('username') : (isset($item->username) ? $item->username : "") }}"
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
    <label for="firstname" class="col-sm-2 control-label">İsim</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="firstname" name="firstname"
               value="{{ old('firstname') ? old('firstname') : (isset($item->firstname) ? $item->firstname : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Soyisim</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="lastname" name="lastname"
               value="{{ old('lastname') ? old('lastname') : (isset($item->lastname) ? $item->lastname : "") }}"
                autocomplete="off">
    </div>
</div>
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Başlık</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="title" name="title"
               value="{{ old('title') ? old('title') : (isset($item->title) ? $item->title : "") }}"
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
    <label for="permissions" class="col-sm-2 control-label">Yetkiler</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="permissions" name="permissions"
               value="{{ old('permissions') ? old('permissions') : (isset($item->permissions) ? $item->permissions : "") }}"
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
