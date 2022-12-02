<?php
$myfile = fopen("zaci.json", "r") or die("Unable to open file!");
$zaci = Null;
if(!filesize("zaci.json")==0){
    $json = fread($myfile,filesize("zaci.json"));  
    $zaci = json_decode($json, true);
}

fclose($myfile);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam</title>
</head>
<body class="bg-slate-300">
    <h1 class="text-center text-5xl font-bold my-20">Seznam žáků, kteří jedou na vodu</h1>
    <div class="w-1/2 mx-auto bg-slate-700 my-auto grid grid-cols-1 gap-y-0 ">
        <?php
            
            if($zaci == Null){
                echo("<div class=\"text-white font-semibold py-4 text-lg text-center\">Žádný žák se zatím nezapsal.</div>");
            }
            else{
                foreach($zaci as $zak){
                
                    echo("<div class=\" text-white font-semibold border-b border-t border-black text-center py-2 gap-y-0 grid grid-cols-6 gap-x-5\">");
                    echo("<div>Jméno: " .$zak["nick"] . "</div>");
                    echo("<div>Příjmení: " .$zak["prijmeni"]. "</div>");
                    echo("<div>Třída: " .$zak["trida"]. "</div>");
                    echo("<div>Je plavec:  " .$zak["je_plavec"]. "</div>");
                    echo("<div class=\"col-span-2\">Kamarád v kanoi: " .$zak["kanoe_kamarad"]. "</div>");
                    echo("</div>");
                }
            }
           
        ?>
    </div>
    <div class="w-1/2 mx-auto mt-8 grid grid-cols-1">
        <a class="btn align-self-center btn-danger mx-auto w-3/12" href="index.php">Zpět</a>
    </div>

</body>
</html>