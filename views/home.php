<?php


?>

 <h2>Inscrivez-vous</h2>

 <section class="row bg-light">
     <div class="col-6">
     <form action="index.php?route=insert_user" method="post">

     <div>
            <label> Nom</label>
            <input type='text' id='nom' name='nom' placeholder="Votre nom">
            </div>
            <div>
            <label> Prenom</label>
            <input type='text' id='prenom' name='prenom' placeholder="Votre prenom">
            </div>
             <div>
             <label> Pseudo </label>
             <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
             </div>
             <div>
             <label> Mot de Passe </label>
             <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
             </div>
             <div>
                <label> Adresse Mail</label>
                <input type='text' id='adresse' name='adresse' placeholder="Votre adresse e-mail" required='required'>
                </div>
             <div>
           <input type='submit' id='valider' value='Soumettre'>
           </div>
         </form>
     </div>
<br>

<h2>Se connecter</h2>

     <form action="index.php?route=connect_user" method="post">
        <div>
        <label> Pseudo </label>
        <input type='text' id='pseudo' name='pseudo' placeholder="Votre pseudo">
        </div>
        <div>
        <label> Mot de Passe </label>
        <input type='password' id='password' name='password' placeholder="Votre mot de passe" required='required'>
        </div>
        <div>
      <input type='submit' id='connexion' value='Connexion'>
      </div>
    </form>
</div>
 </section>
       