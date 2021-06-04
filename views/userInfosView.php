
<div class="container-edit">
  <h3>Vos informations personelles</h3><br>
  
  <form action="" method="POST">
  
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['user']['pseudo'];?>">
  
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="">
  
    <label for="">Mot de passe</label><br>
    <input type="password" name="password" id="password" value="">
  
    <label for="">Bio</label><br>
    <textarea name="" id="bio" cols="30" rows="5"></textarea><br>
  
    <button>Sauvegarder</button>
  
  </form>
</div>