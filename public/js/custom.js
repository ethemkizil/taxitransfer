$( document ).ready(function() {

    $('input[name=return]').change(function () {
        var value = $('input[name=return]:checked').val();
        if(value=="0"){
            $("#return-wrapper").hide();
        }else if(value=="1"){
            $("#return-wrapper").show();
        }
    });

    $('.select2').select2();

    $(document).on("change", 'input[type="file"]', function(e) {
        if(this.files[0].size > 7244183)
        {
            alert("Yüklemek istediğiniz dosya boyutu çok büyük.");
            $(this).val("");
        }
    });

    $(document).on('click', '.modal-modal', function (e) {

        var url = $(this).attr("data-url");
        var title = $(this).attr("data-title");
        var data = $(this).attr("data-data");
        var newModal = $("#modal-modal");

        newModal.find("#modal-form").attr("action", url);
        newModal.find("#modal-title").html(title);
        newModal.find("#data").val(data);
        newModal.find('.modal-body').load(url,function(result){
            newModal.modal({show:true});
            customComponents();
            iqInit();
        });
    });


    $(document).on('change', '.check-check', function (e) {
        var url = $(this).attr("data-url");
        $.get(url, function( data ) {});
    });
/*
    var allEditors = document.querySelectorAll('.editor',{
        plugins: [ CKFinder],
        ckfinder: {
            uploadUrl: '/ckfinder/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        }
    });
    for (var i = 0; i < allEditors.length; ++i) {
        ClassicEditor.create(allEditors[i])
            .then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.log(error)
            });
    }
*/
    var allEditors = document.querySelectorAll('.editor');

    for (var i = 0; i < allEditors.length; ++i) {
        editorElement = allEditors[i];
        ClassicEditor.create(editorElement, {
                ckfinder: {
                    uploadUrl: '/ckfinder/connector/?command=QuickUpload&type=Files&responseType=json'
                }
            });
    }
});
