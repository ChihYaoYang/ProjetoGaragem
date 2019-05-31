<style>
    .social:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
    }
    .social {
        -webkit-transform: scale(0.8);
        /* Browser Variations: */
        -moz-transform: scale(0.8);
        -o-transform: scale(0.8);
        -webkit-transition-duration: 0.5s;
        -moz-transition-duration: 0.5s;
        -o-transition-duration: 0.5s;
    }
    /*houver*/
    #social-git:hover {
        color: #535c68;
    }
    #social-tw:hover {
        color: #4834d4;
    }
    #social-gp:hover {
        color: #d34836;
    }
    #social-em:hover {
        color: #f39c12;
    }
    .container {
        width: auto;
        max-width: auto;
        padding: 0 15px;
    }
</style>

<footer class="footer mt-auto py-5">
    <div class="container">
        <div class="fixed-bottom text-center center-block bg-dark">
            <a href="https://github.com/ChihYaoYang/GincanaCI"><i id="social-git" class="fab fa-github-square fa-3x social"></i></a>
            <a href="#"><i id="social-tw" class="fab fa-twitter-square fa-3x social"></i></a>
            <a href="#"><i id="social-gp" class="fab fa-google-plus-square fa-3x social"></i></a>
            <a href="#"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
    </div>
</footer>
<!--Bootstrap---->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    //Show name Image
    $('input[type="file"]').change(function (e) {
        e.preventDefault();
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
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
</script>
</body>

</html>