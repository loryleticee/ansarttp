<?php
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
//var_dump($_POST);
if (isset($_POST["id"])) {
            $var = explode('.',addslashes($_POST["id"]));
            $id =$var[0];
            $libelle =$var[1];
            $modifier = $pdo->alterDoc($id, $libelle);
                if (!$modifier) {
                    echo "<div class='erreur'><center>Le document est dorénavant $libelle </center></div>";
                } else {
                    echo "<div class='erreur'><center>Modification erroné</center></div>";
                }

        }else{
            echo "<div class='erreur'><center>Pas de post</center></div>";
        }
?>