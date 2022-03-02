<?php 

// ALERT

function toto($couleur, $message){ ?>
    <div class="alert alert-<?=$couleur?>" role="alert">
    <?= $message ?>
    </div>
<?php }

function isConnect(){
    if (isset($_SESSION['connect']) && $_SESSION['connect']==true) {
        return true;
    }
    return false;
} 

function checkRoles($id, $bdd){
    if (intval($id) <= 0){
        return false;
    }
    $sql = 
    'SELECT libelle 
     FROM role_utilisateur 
     INNER JOIN role 
     ON role.id = role_utilisateur.id_role 
     WHERE role_utilisateur.id_utilisateur = ?';
     $req = $bdd->prepare($sql);
     $req->execute([$id]);
     $roles = $req->fetchAll(PDO::FETCH_NUM);
     if (count($roles) > 1){
         $roles = array_merge($roles[0], $roles[1]);
     }else{
         $roles = $roles[0];
     }
     return $roles;
}


function isAdmin(){
    return in_array('Admin', $_SESSION['user']['roles']);
}

function isSalarie(){
   return in_array('Salarié', $_SESSION['user']['roles']);
}


function getCategories($_id_livre, $_bdd){
    $sql = 'SELECT categorie.libelle FROM categorie_livre INNER JOIN categorie ON categorie_livre.id_categorie = categorie.id WHERE categorie_livre.id_livre = ?';
    $requete = $_bdd -> prepare($sql);
    $requete -> execute([$_id_livre]);
    $categories = $requete ->fetchAll(PDO::FETCH_ASSOC);
    $cat_livre=[];
    foreach ($categories as $categorie) {
        $cat_livre[] = implode($categorie);
    }
    return implode(', ' , $cat_livre);
}

function getAuteurs($_id_livre, $_bdd){
    $sql = 'SELECT auteur.nom, auteur.prenom, auteur.nom_de_plume FROM auteur_livre INNER JOIN auteur ON auteur_livre.id_auteur = auteur.id WHERE auteur_livre.id_livre = ?';
    $requete = $_bdd ->prepare($sql);
    $requete->execute([$_id_livre]);
    $auteurs = $requete->fetchAll(PDO::FETCH_ASSOC);
    $aut_livre = [];
    foreach ($auteurs as $auteur) {
        $aut_livre[] = implode(' ', $auteur);
    }
    return implode(', ' , $aut_livre);
}

function getRoles($_id_utilisateur, $_bdd){
    $sql = 'SELECT role.libelle FROM role_utilisateur INNER JOIN role ON role_utilisateur.id_role = role.id WHERE role_utilisateur.id_utilisateur = ?';
    $requete = $_bdd->prepare($sql);
    $requete -> execute([$_id_utilisateur]);
    $roles = $requete -> fetchAll(PDO::FETCH_ASSOC);
    $uti_role = [];
    foreach ($roles as $role) {
        $uti_role[] = implode(' ' , $role);
    }
    return implode(', ' , $uti_role);
}

function getEtats($_id_livre,$_bdd, $type){
    $sql = 'SELECT etat.libelle, etat.id FROM etat_livre INNER JOIN etat ON etat_livre.id_etat = etat.id WHERE etat_livre.id_livre = ?';
    $requete = $_bdd->prepare($sql);
    $requete -> execute([$_id_livre]);
    $etats = $requete -> fetchAll(PDO::FETCH_ASSOC);
    $etat_livre = [];
    foreach ($etats as $etat) {
        $etat_livre[] = implode($etat);
    }
    return ($etat[$type]);
}