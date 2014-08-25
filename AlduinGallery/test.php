<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="js/jquery.js"></script>
        <script type="text/javascript">
            $(function () {
                console.log('document.ready()');
                var result = $('#result');
                $('#btn').click(function (e) {
                    console.log("#btn.click()");
                    e.preventDefault();
                    var formData = $('#form1').serialize();

                    $.ajax({
                        type: "POST",
                        url: "testGet.php",
                        data: formData,
                        //dataType: "text/html",
                        success: function(rdata) {
                            $('#result').html(rdata);

                        }

                    });
                });
            });


        </script>
    </head>
    <body>
        <div>
            <form id="form1">
                <input name="username" type="text" />
                <input name="password" type="password">
                <input name="password2" type="password">
                <a href="#" id="btn">Post the form</a>
            </form>
        </div>
        <div id="result"></div>
    </body>
</html>

