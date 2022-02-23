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
