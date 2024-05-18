
<?php
session_start();
if(isset($_POST['send'])){
  // extraction des données de la base de données
  extract($_POST);
  // verfication de l'exsistance des données
  if(isset($nom)&& $nom != "" &&
  isset($prenom) && $prenom != "" &&
   isset($email) &&$email != "" &&
    isset($message) && $message != ""){
    //  envoyer l'email
    $to = "samycherfa35@gmail.com";
    
    $subject = "HTML email";

    $message = "
      <p> Vous avez un nouveau message de votre site web !</p>
      <p><strong>Nom:</strong> $nom</p>
      <p><strong>Prenom:</strong> $prenom</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Message:</strong> $message</p>
    ";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: <' .$email. '>' . "\r\n";


    $send = mail($to,$subject,$message,$headers);

    if($send){
      $_SESSION['succes_message']="Votre message a été envoyé avec succès !";
    }else{
      $info="Erreur lors de l'envoi du message !";

    }

  }else{
    $info="Veuillez remplir tous les champs !";

  }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Samy Cherfa</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="responsive.css" />
  </head>

  <body>
    <header>
      
      <nav id="nav-bar">
        <img src="images/SamyCh.jpg" alt="logo" />

        <ul class="nav-links">
            <li><a href="#acceuil">Accueil</a></li>
          <li><a href="#competences">Compétence</a></li>
          <li><a href="#projet">Projet</a></li>
          <li><a href="#formation">Formations</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>

      <nav id="nav-responsive">
        <img src="images/SamyCh.jpg" alt="logo" />

        <div class="menu-responsive">
          <div class="icone-resp" onclick="basculeMenu()">
            <span></span>
            <span></span>
            <span></span>
          </div>

          <div class="menu-links">
            <li><a href="#acceuil">Accueil</a></li>
            <li><a href="#competences">Compétence</a></li>
            <li><a href="#projet">Projet</a></li>
            <li><a href="#formation">Formations</a></li>
            <li><a href="#contact">Contact</a></li>
          </div>
        </div>
      </nav>
    </header>
    <section id="acceuil">
      <div class="acceuil">
        <div class="image-acceuil">
          <img src="images/photo.png" alt="acceuil" class="img-acceuil" />
        </div>

        <div class="text-acceuil">
          <p class="text-p1">Salut, Je suis</p>
          <h1 class="titre">Samy CHERFA</h1>
          <p class="text-p2">
            Etudiant en deuxième année de Licence Informatique à l'Université de
            Bejaia. Passionné par le développement de logiciels et les nouvelles
            technologies, je me suis engagé dans divers projets académiques et
            stages professionnels pour renforcer mes compétences en
            programmation et en gestion de projet. Je suis toujours à la
            recherche de nouvelles opportunités pour apprendre et innover dans
            le domaine de l'informatique.
          </p>
        </div>
      </div>
    </section>
  <div class="main">
  <section id="competences">
        <p class="section-titre-p1">Explorez mes</p>
        <h1 class="titre">Competences</h1>
        <div class="competences-details-container">
          <div class="competences-container">
            <div class="details-container">
              <h2 class="competences-soustitre">
                Front-End Development
              </h2>
              <div class="article-container">
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>HTML</h3>
                    <p> Avancée</p>
                  </div>
                </article>
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>CSS</h3>
                    <p>Avancée </p>
                  </div>
                </article>
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>JavaScript</h3>
                    <p> intermédiaire</p>
                  </div>
                </article>
                
              </div>
            </div>
            <div class="details-container">
              <h2 class="competences-soustitre">
                Back-End Development
              </h2>
              <div class="article-container">
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>JAVA</h3>
                    <p>Avancée</p>
                  </div>
                </article>
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>C</h3>
                    <p>Avancée</p>
                  </div>
                </article>
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>SQL</h3>
                    <p>Avancée </p>
                  </div>
                </article>
                
                <article>
                  <img src="images/checkmark.png" alt="competences icone" class="icone">
                  <div>
                    <h3>Php</h3>
                    <p>intermédiaire </p>
                  </div>
                </article>
                
                
              </div>
            </div>

          </div>
        </div>
    </section>

    <section id="projet">
      <p class="section-titre-p1">Decouvrez mes</p>
      <h1 class="titre">Projets</h1>
      <div class="competences-details-container">
          <div class="details-container ">
            <div class="article-containers ">
             <img src="images/Rectangle 11.png" 
             alt="logo projet" 
             class="image-projet">
             <p class="text-p2">ECHOES est un événement en ligne novateur qui fusionne l'intrigue d'un jeu de piste alternatif (ARG) avec la fascination de l'informatique. Conçu pour stimuler l'ingéniosité et l'exploration intellectuelle, Echoes emmène les participants   dans   un voyage</p>
            </div>
            <h2 class="competences-soustitre titre-projet">
              Projet 2
            </h2>
          
      
            <div class="btn-container">
              <button class="btn btn-github" onclick="window.open('https://github.com/Paranoid-Pufferfish/Binary-Echoes')">
                <svg width="30" height="30" fill="#0092E4" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="github">
                  <path d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z"></path>
                </svg>
              </button>
              <button class="btn btn-projet" onclick="location.href=''">
                Live Demo  
              </button>
            </div>
            
              
            
          </div>
          <div class="details-container couleur-container">
            <div class="article-containers ">
             <img src="images/Pong-game.ico " 
             alt="logo projet" 
             class="image-projet">
             <p class="text-p2">
             Mon premier projet est un jeu de Pong que j'ai développé en C avec la bibliothèque Raylib. Ce projet m'a permis de mettre en pratique mes compétences en programmation, de comprendre les bases de la gestion graphique et de l'interaction utilisateur.
            </p>
            </div>
           
            <h2 class="competences-soustitre titre-projet">
              Projet 1
            </h2>
            
            <div class="btn-container">
            <button class="btn btn-github" onclick="window.open('https://github.com/samych26/Pong')">
                <svg width="30" height="30" fill="#0092E4" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" id="github">
                  <path d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z"></path>
                </svg>
              </button>
            </div>    
          
      </div>
    </section>
<section id="formation">
<div class="formation-details-container">
  <p class="section-titre-p1">Mes</p>
  <h1 class="titre">Formations</h1>
  <div class="formation-container">
    <div class="details-container">
      <h2 class="formation-soustitre">
        Licence Informatique
      </h2>
      <div class="article-container">
        <article class="article-formation">
          <img src="images/education.png" alt="formation icone" class="icone">
          <div>
            <h3>Université de Bejaia</h3>
            <p>En cours, Licence 2</p>
          </div>
        </article>
      </div>
    </div>
    <div class="details-container">
      <h2 class="formation-soustitre">
        Baccalauréat
      </h2>
      <div class="article-container">
        <article class="article-formation">
          <img src="images/education.png" alt="formation icone" class="icone">
          <div>
            <h3>Lycée EL Hammadia</h3>
            <p>Session:2022</p>
          </div>
        </article>
      </div>
    </div>
    <div class="details-container">
      <h2 class="formation-soustitre">
        Formation Java
      </h2>
      <div class="article-container">
        <article class="article-formation">
          <img src="images/education.png" alt="formation icone" class="icone">
          <div>
            <h3>Ecole TUSNA</h3>
            <p>2022/2023</p>
          </div>
        </article>
      </div>
    </div>
    <div class="details-container">
      <h2 class="formation-soustitre">
        Stage
      </h2>
      <div class="article-container">
        <article class="article-formation">
          <img src="images/education.png" alt="formation icone" class="icone">
          <div>
            <h3>Sarl NHOLD</h3>
            <p>2023</p>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
</section>

<section id="contact">
  <!-- message d'erreur -->
<?php
  if(isset($info)){?>
    <p class="request-message" style="color:red;">
      <?= $info ?>
    </p>
    <?php
  }
  ?>
  <!-- message de reussite -->
  <?php
  if(isset($_SESSION['succes_message'])){?>
    <p class="request-message" style="color: green;">
      <?= $info ?>
    </p>
    <?php
  }
  ?>
  <div class="contact">
 
    <form action="" method="post">
      <h1 class="titre-contact">Contactez moi</h1>
    <div class="elements-form">
    <label> Nom:</label>
      <input type="text" placeholder="Nom" name="nom" >
      <label >  Prenom:</label>
      <input type="text" placeholder="Prenom" name="prenom" >
    </div>
      
    

      <div class="elements-form">
      <label>Email:</label>
      <input type="email" placeholder="Email" name="email" >
      </div>
      
      <label>Message:</label>
      <textarea name="message" id="" cols="30" rows="10" placeholder="Message" ></textarea>

      <button name="send" class="btn">Envoyer</button> 
    </form>
  </div>

</section>

<footer>
  <div>
    <p>Samy Cherfa</p>
    <p> Copyright © 2024</p>
  </div>
</footer>

  </div>
    

    <script src="javascipt.js"></script>
  </body>
</html>
