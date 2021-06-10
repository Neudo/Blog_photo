
<div class="container-edit">
  <h3>Vos informations personelles</h3><br>
  
  <form action="" method="POST">
  
    <label for="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value="<?= $_SESSION['user']['pseudo'];?>">
  
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?= $_SESSION['user']['email'];?>">
  
    <label for="password">Mot de passe</label><br>
    <input type="password" name="password" id="password" value="">
  
    <label for="bio">Bio</label><br>
    <textarea name="bio" id="bio" cols="30" rows="5"><?= $_SESSION['user']['bio'];?></textarea><br>
  
    <button>Modifier</button>
  
  </form>

</div>