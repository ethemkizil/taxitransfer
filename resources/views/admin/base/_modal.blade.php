<div id="modal-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="modal-form">
                {!! csrf_field() !!}
                <input type="hidden" name="data" id="data" value="">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title" style="display: inline-block;">---</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary"> <i class="la la-save"></i> Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>