<?php
if (isset($_POST['email'])   && isset($_POST['password'])  && isset($_POST['password2']) && isset($_POST['nom'])  && isset($_POST['ville']))
 {
   try {
 $bdd =new pdo("mysql:host=localhost;port=3306;dbname=qair","root","");
 } catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
$email=$_POST['email'];
$id_ville=$_POST['ville'];
$mdp=$_POST['password'];
$nom=$_POST['nom'];




$req=$bdd->prepare("insert into user(id_ville,nom,email,mdp) values (?,?,?,?)");
$para=array($id_ville,$nom,$email,$mdp);
if($req->execute($para)){
    echo '<script>alert("Vous êtes inscrits  ! ");
    window.location.href = "HomePage.php";</script>';

 }
 else 
  echo "<script>alert('Echec inscription , verifiez vos informations personnelles');</script>";
}
?>
