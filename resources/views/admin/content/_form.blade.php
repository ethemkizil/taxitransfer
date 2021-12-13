<div class="form-group">
    <label for="lang" class="col-sm-2 control-label">Dil</label>

    <div class="col-sm-10">
        <select name="lang" id="lang" required class="form-control">
            <option>Dil Seçiniz</option>
            <option {{isset($item) ? ($item->lang == "tr" ? "selected" : "") : ""}} value="tr">Türkçe</option>
            <option {{isset($item) ? ($item->lang == "en" ? "selected" : "") : ""}} value="en">English</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Sayfa Adı</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : (isset($item->name) ? $item->name : "") }}"  autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="content_id" class="col-sm-2 control-label">Üst Sayfa</label>

    <div class="col-sm-10">

        <select name="content_id" id="content_id" class="form-control select2">
            <option value="0"></option>
            @foreach ($topContents as $topContent)
                <option {{isset($item) ? ($item->content_id == $topContent->id ? "selected" : "") : ""}}  value="{{ $topContent->id }}">{{ $topContent->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Özet İçerik</label>

    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ? old('description') : (isset($item->description) ? $item->description : "") }}"  autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="content" class="col-sm-2 control-label">Sayfa İçeriği</label>
    <div class="col-sm-10">
        <textarea style="min-height: 250px" class="form-control editor" id="content" name="content">{{ old('content') ? old('content') : (isset($item->content) ? $item->content : "") }}</textarea>
    </div>
</div>

<div class="form-group">
    <label for="main" class="col-sm-2 control-label">Anasayfa İçeriği Yap</label>

    <div class="col-sm-10">
        <div class="radio check">
            <input type="checkbox" value="1" name="main" id="main" {{ old('main') ? (old('main')==1 ? "checked" : "") : (isset($item->main) ? ($item->main==1 ? "checked" : "") : "checked") }}>
        </div>
    </div>
</div>
