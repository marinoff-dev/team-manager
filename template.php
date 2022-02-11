<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width, initial.scale=1.0">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <nav>
            <div class="div1">
                    <h1>Panneau d'administration</h1>
            </div>
            <div class="poste">
                <div id="div2">
                    <ul>
                        <li><a href="newemp.php?controller=employe">Enregistrer un employé</a></li>
                        <li><a href="newcont.php?controller=contrat">Enregistrer un contrat</a></li>
                        <li><a href="renouvel.php?controller=contrat">Renouveler un contrat</a></li>
                        <li><a href="liste.php">Liste des contrats</a></li>
                        <li><a href="">Liste des contrats à échéance</a></li>
                        <li><a href="">Liste des contrats à t</a></li>
                        <li><a href="">Enregistrer une faute</a></li>
                        <li><a href="">Liste des employés les plus fautifs</a></li>
                        <li><a href="deconnexion.php">Quitter la session</a></li>
                    </ul>
                </div>
                <div id="div3">
                <section> <?=$content ?> </section>
                </div>
                
            </div>
        </nav>
        
    </body>
</html>
       
