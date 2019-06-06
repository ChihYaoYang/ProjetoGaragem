//Confirmation
$('.delete').on('click', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    $.confirm({
        title: 'Aviso !',
        content: 'Você realmente deseja excluir ?',
        type: 'green',
        icon: 'fas fa-exclamation-circle',
        buttons: {
            ok: {
                btnClass: 'btn-primary',
                action: function () {
                    location.href = url;
                }
            },
            cancel: function () {
                $.alert('Processo cancelado !');
            }
        }
    });
});
//Pré Visualizar
$(function () {
    $("#imagem").change(function () {
        // 若有選取檔案
        if (this.files && this.files[0]) {
            //Cria variável, Usa função FileReader(檔案讀取器) 來讀取使用者選取電腦中的檔案
            var reader = new FileReader();
            // 當讀取成功後會觸發的事情
            reader.onload = function (e) {
                //e.target.result 物件，是使用者的檔案被 FileReader 轉換成 base64 的字串格式，
                // 在這裡我們選取圖檔，所以轉換出來的，會是如 『data:image/jpeg;base64,.....』這樣的字串樣式。
                $('#view').attr('src', e.target.result);
            };
            //讀取檔案
            reader.readAsDataURL(this.files[0]);
        }
    });
});
//Show name Image
$('input[type="file"]').change(function (e) {
    e.preventDefault();
    var fileName = e.target.files[0].name;
    $('.custom-file-label').html(fileName);
});
//Mascara
$(document).ready(function () {
    $('.money').mask('#.##0,00', {reverse: true});
    $('.year').mask('0000');
    return;
});