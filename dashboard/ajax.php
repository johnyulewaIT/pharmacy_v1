<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
    function showMedicine (str) {
        if (str == "") {
            document .getElementById("txtHint") .innerHTML = "";
            return;
        } else{
            var xmlhttp = new XMLHttpRequest();
            xmlhttp .onreadystatechange = function(){
                if (this.readyState == 4 && this .status == 200) {
                        document .getElementById("txtHint") .innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET" ,"getmedicine.php?=q" +str ,true);
            xmlhttp. send();
        }
    }
    
    </script>
</head>
<body>
    <form action="#" method="post">
        <select name="medicine" onchange="showUser(this.value)"   id="">
        <option value="1">Medicine name</option>
        <option value="2">Medicine name</option>
        
        </select>
    </form>
    <br>
    <div id="txtHint">Available medicine goes here... </div>
</body>
</html>