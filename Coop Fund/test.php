<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>
    <div class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4" >

        </div>
        <input type="text" name="" id="live_search" class="form-control" autocomplete="off">

    </div>
    <div id="searchresult"></div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input=$(this).val();
                if(input !=""){
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{input:input},

                        success:function(data){
                            $("#searchresult").html(data)
                        }
                    });
                }else{
                    $("#searchresult").css("display","none");
                }
            });
        });

    </script>
</body>
</html>