﻿<div id="contenu">
      <h2>Identification utilisateur</h2>


<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
   
    
      <p>
       <label for="nom">Login</label>
       <input id="login" type="text" name="login"  style="width:600px;height:70px" size="30" maxlength="45"  required="required"/>
      </p>
      <p>
        <label for="mdp">Mot de passe</label>
        <input id="mdp"  type="password"  name="mdp" style="width:600px;height:70px" size="30" maxlength="45"  required="required"/>
      </p>
         <input style='width:150px;height:70px' type="submit" value="Valider" name="valider">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input style='width:550px;height:70px' type="reset" value="Annuler" name="annuler"> <br><br>
          <a href="#">Mot de passe oublié ?</a>
      </p>
</form>
</div>