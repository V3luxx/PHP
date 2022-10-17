<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Basic</title>
</head>
<body>
    <div class ="calcul">
        <form action="/calcul.php" method ="GET">
            <label for="">Num 1</label>
            <input type="text" name="num1">
            <label for="">Num 2</label>
            <input type="text" name="num2">

            <select name="operateur" id="">
                    <option value="Non">Non</option>
                    <option value="Addition">Addition</option>
                    <option value="Multiplication">Multiplication</option>
                    <option value="Soustraction">Soustraction</option>
                    <option value="Division">Division</option>
            </select>
            <input type="submit" value="Calculator" name="submit">
        </form>
    </div>
    
</body>
</html>

<?php
        if(isset($_GET['num1']) && isset($_GET['num2']))
        {
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            $operateur = $_GET['operateur'];
            $data = [];
            switch($operateur)
            {
                case "Non":
                    echo "choisissez un operateur svp !";
                break;
                case "Addition":
                    $res = $num1+$num2;
                    echo $res;
                break;
                case "Multiplication":
                    $res = $num1*$num2;
                    echo $res;
                break;
                case "Soustraction":
                    $res = $num1-$num2;
                    echo $res;
                break;
                case "Division":
                    $res = $num1/$num2;
                    echo $res;
            }
            $counter = 1;
            while(isset($_COOKIE[$counter])){
                if(isset($_COOKIE['10'])){
                    $x = substr((string)$counter, -1, 1);
                    $counter = (int)$x;
                }else{
                    $counter++;
                }
                    
            }
            $data = json_decode($_COOKIE['res'], true);
            setcookie("res", json_encode($res), time()+3600);
        }

?>  