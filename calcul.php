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
            $date = date('d-m-y h:i:s');
            $visitor = $_SERVER['REMOTE_ADDR'];
            $data = "";
            switch($operateur)
            {
                case "Non":
                    echo "choisissez un operateur svp !";
                break;
                case "Addition":
                    $res = $num1+$num2;
                    echo "Le résultat donne : ",$res , " et est effectué à : ", $date, "\n";
                    echo "et vous etes: ", $visitor;
                break;
                case "Multiplication":
                    $res = $num1*$num2;
                    echo "Le résultat donne : ",$res , " et est effectué à : ", $date;
                break;
                case "Soustraction":
                    $res = $num1-$num2;
                    echo "Le résultat donne : ",$res , " et est effectué à : ", $date;
                break;
                case "Division":
                    $res = $num1/$num2;
                    echo "Le résultat donne : ",$res , " et à été effectué le : ", $date;
                break;
            }

            // if the cookie exists, read it and unserialize it. If not, create a blank array
            if(array_key_exists('res', $_COOKIE)) {
            $cookie = $_COOKIE['res'];
            $cookie = unserialize($cookie);
            } else {
                $cookie = array();
            }

            // add the value to the array and serialize
            $cookie[] = $res;
            $cookie = serialize($cookie);

            // save the cookie
            setcookie('res', $cookie, time()+3600);
            
            
        }

?>  