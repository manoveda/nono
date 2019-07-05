<?php  
    $destinataire='contact@soins-ayurvediques.fr';  
?>
<!DOCTYPE html>
<html id="innerPage" class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Contact - Centre Ayurvédique Mano Veda Marseille | Ayurvéda , formations, massages, soins, cures, bilans ayurvédiques</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->

    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
        
        input[value="Prévisualiser"] {
            display: none;
        }

    </style>

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- pageheader
    ================================================== -->
    <section class="s-pageheader s-pageheader-contact">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <a class="logo" href="index.html">
                        Centre Ayurvédique ManoVeda
                        <img class="header__logo-img" src="images/logo_manoveda.png" alt="o">
                    </a>
                </div> <!-- end header__logo -->

                <ul class="header__social">
                    <li>
                        <a href="https://www.facebook.com/CentreAyurvediqueManoVeda/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/shamanni"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/pmanso/"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/pascalitomanso/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Rechercher :</span>
                            <input type="search" class="search-field" placeholder="Entrez un mot clé" value="" name="s" title="Que recherchez-vous ?" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Fermer</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav id="navbar" class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>

                    <ul class="header__nav">

                        <li><a href="index.html">Home</a></li>
                        <li><a href="formations.html">Formations</a></li>
                        <li><a href="massages.html">Massages</a></li>
                        <li><a href="soins.html">Soins</a></li>
                        <li><a href="cures.html">Cures</a></li>
                        <li><a href="about.html">A propos</a></li>
                        <li class="current"><a href="contact.php">Contact</a></li>

                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->

            </div> <!-- header-content -->
        </header> <!-- header -->

    </section>

    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow">

        <div class="row">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title" style="color: #6599c4; padding-top: 40px;">
                    Contactez-nous
                </h1>
                <?php  
                    $Previsualiser='<p class="bt">  
                    <input type="submit" name="previsualiser" tabindex="3" value="Prévisualiser"></p>';  
                    $Envoi="\n".'<p class="bt">  
                    <input name="envoi" tabindex="4" value="Envoyer" type="submit"></p>';  
                    if (isset($_POST['message']))  
                      {  
                        $verif='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';  

                        $message=preg_replace('#(<|>)#', '-', $_POST['message']);  
                        $message=str_replace('"', "'",$message);  
                        $message=str_replace('&', 'et',$message);  

                        $objet=preg_replace('#(<|>)#', '-', $_POST['objet']);  
                        $objet=str_replace('"', "'",$objet);  
                        $objet=str_replace('&', 'et',$objet);  

                        $votremail=stripslashes(htmlentities($_POST['votremail']));  
                        $message=stripslashes(htmlspecialchars($message));  
                        $objet=stripslashes(htmlspecialchars($objet));  
                     
                        $envoi=htmlentities($_POST['envoi']);  
                        $previsualiser=htmlentities($_POST['previsualiser']);  

                        $votremail=trim($votremail);  
                        $message=trim($message);  
                        $objet=trim($objet);  

                        $apercu_resultat='<p>Aperçu du résultat :</p>';  

                        if((empty($message))or(empty($objet))or(!preg_match($verif,$votremail)))  
                          {  
                            //les 3 champs sont vides  
                            if(empty($votremail)and(empty($message))and(empty($objet)))  
                              {  
                                echo '<p>Tous les champs sont vides.</p>';  
                                $message='';$votremail='';$objet='';$apercu_resultat='';  
                              }  
                            //un des champs est vide  
                            else  
                              {  
                                if(!preg_match($verif,$votremail))  
                                  echo'<p>Votre adresse e-mail n\'est pas valide.</p>';  
                                else  
                                {  
                                  echo'<p>Il faut remplir tous les champs !</p>';  
                                  if(empty($message))  
                                    $apercu_resultat='';  
                                }  
                              }  
                          }  
                        //Si les deux sont pleins et que l'adresse est valide, on envoie on on prévisualise sans envoi  
                        else  
                          {  
                            $domaine=preg_replace('#[^@]+@(.+)#','$1',$votremail);  
                            $DomaineMailExiste=checkdnsrr($domaine,'MX');  
                            if(!$DomaineMailExiste)  
                              echo'<p>Le nom de domaine de l\'adresse e-mail que vous avez donné n\'existe pas.</p>';  
                            elseif(!empty($previsualiser))  
                                {  
                                  $apercu_resultat='<p>Votre message et votre adresse e-mail sont valides et prêts à être envoyés.  
                                  <br>Vous n\'avez plus qu\'à cliquer sur le bouton "Envoyer".<br>Prévisualisation :</p>';  
                                  $Previsualiser='';  
                                }  
                            elseif(!empty($envoi))  
                                {  
                                  $objet='[SITE] : '.$objet;  
                                  $headers='From:'.$votremail."\r\n".'To:'.$mail."\r\n".'Subject:'.$objet."\r\n".'Content-type:text/plain;charset=iso-8859-1'."\r\n".'Sent:'.date('l, F d, Y H:i');  
                                  if(mail($destinataire,$objet,$message,$headers))  
                                  {  
                                    echo '<p>Votre message a bien été envoyé. Merci.</p><p><a href="/">Retour à la page d\'accueil</a></p>';  
                                    $Envoi='';  
                                    $Previsualiser='';  
                                  }  
                                  else  
                                    echo'<p>Un problème est survenu durant l\'envoi du mail.</p>';  
                                }  
                            else  
                              echo'<p>Une condition innatendue est survenue lors de l\'exécution du script.</p>';  
                          }  
                    echo $apercu_resultat;  
                      }  
                    else  
                      {  
                        $votremail='';$message='';  
                      }  
                    $bas_formulaire=$Previsualiser.$Envoi;  
                    ?>  
                    <form id='contact' method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">  
                      <p id='obj'><label for='objet'> 
                      <input type='text' placeholder="Objet de votre message :" name='objet' id='objet' tabindex='10' size='30' required=""></label></p>   

                      <p id="adr"><label for="mail">
                      <input name="votremail" placeholder="Votre Adresse E-mail" tabindex="20" size="30" type="text" id="mail" required="" value="<?php echo $votremail; ?>"></label></p>  
                        
                      <p id="msg"><label for="message">
                      <textarea placeholder="Votre message" tabindex="30" rows="20" cols="120" name="message" id="message" required=""><?php echo $message; ?></textarea>  
                      </label></p>  
                    <?php echo $bas_formulaire;?>  
                    </form>  

            </div> <!-- end s-content__header -->


            <div class="col-full s-content__main">

                <p class="lead">Le Centre Ayurvédique ManoVeda propose des massages, des soins, des cures, des thérapies corporelles, des consultations en diététique et bilan ayurvédique, des formations, stages, séances de méditation, cours de cuisine ayurvédique."</p>

                <div class="row">
                    <div class="col-six tab-full">
                        <h3>Où sommes nous ?</h3>

                        <p>Centre Ayurvédique Manoveda, Centre Européen de thérapeutes<br />
                        70 boulevard Jeanne d'Arc,<br />
                        13005 Marseille 
                        </p>

                    </div>

                    <div class="col-six tab-full">
                        <h3>Contact Info</h3>
                            <a href="mailto:contact@soins-ayurvediques.fr">contact@soins-ayurvediques.fr</a><br />
                            <a href="phoneto:+330684945764">Phone: +33(0) 684 945 764</a>
                        </p>

                    </div>
                </div> <!-- end row -->


            </div> <!-- end s-content__main -->

        </div> <!-- end row -->

    </section> <!-- s-content -->


      <!-- s-footer
         ================================================== -->
      <footer class="s-footer">
         <div class="s-footer__main">
            <div class="row">
               <div class="col-two md-four mob-full s-footer__sitelinks">
                  <h4>Liens</h4>
                  <ul class="s-footer__linklist">
                     <li><a href="index.html">Home</a></li>
                     <li><a href="formations.html">Formations</a></li>
                     <li><a href="massages.html">Massages</a></li>
                     <li><a href="soins.html">Soins</a></li>
                     <li><a href="cures.html">Cures</a></li>
                     <li><a href="about.html">A propos</a></li>
                     <li><a href="avis.html">Vos commentaires</a></li>
                     <li><a href="contact.php">Contact</a></li>
                  </ul>
               </div>
               <!-- end s-footer__sitelinks -->
               <div class="col-two md-four mob-full s-footer__archives">
                  <h4>Archives</h4>
                  <ul class="s-footer__linklist">
                     <li><a href="#0">Avril 2019</a></li>
                     <li><a href="#0">Mai 2019</a></li>
                     <li><a href="#0">Juin 2019</a></li>
                  </ul>
               </div>
               <!-- end s-footer__archives -->
               <div class="col-two md-four mob-full s-footer__social">
                  <h4>Social</h4>
                  <ul class="s-footer__linklist">
                     <li><a href="https://www.facebook.com/CentreAyurvediqueManoVeda/">Facebook</a></li>
                     <li><a href="https://www.linkedin.com/in/pmanso/">Linkedin</a></li>
                     <li><a href="https://www.instagram.com/pascalitomanso/">Instagram</a></li>
                     <li><a href="https://twitter.com/shamanni">Twitter</a></li>
                  </ul>
               </div>
               <!-- end s-footer__social -->
               <div class="col-five md-full end s-footer__subscribe">
                  <h4>Notre Newsletter</h4>
                  <p>Restez informé sur nos avancées et nos évennements en vous inscrivant à notre lettre d'information.</p>
                  <div class="subscribe-form">
                     <form id="mc-form" class="group" novalidate="true">
                        <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Addresse e-mail" required="required">
                        <input type="submit" name="subscribe" value="Envoyé">
                        <label for="mc-email" class="subscribe-message"></label>
                     </form>
                  </div>
               </div>
               <!-- end s-footer__subscribe -->
               <div class="col-five md-full end s-footer__location">
                  <h4>Localisation</h4>
                  <div>
                     <address>
                        70 boulevard Jeanne d'Arc |
                        13005 Marseille |
                        <a href="phoneto:+330684945764">06.84.94.57.64</a>
                     </address>
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2904.0113314265795!2d5.402358515400469!3d43.29308438366028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9bf44b29cd06b%3A0x39493447205a6a6!2s70+Boulevard+Jeanne+d&#39;Arc%2C+13005+Marseille!5e0!3m2!1sfr!2sfr!4v1554380422544!5m2!1sfr!2sfr"  frameborder="0" style="border:0; width:100%; min-height:220px;" allowfullscreen></iframe>
                  </div>
               </div>
               <!-- end s-footer__location -->
            </div>
         </div>
         <!-- end s-footer__main -->
         <div class="s-footer__bottom">
            <div class="row">
               <div class="col-full">
                  <div class="s-footer__copyright">
                     <span>Copyright © 2019 - Centre Ayurvédique Manoveda. Tous droits réservés.</span> 
                  </div>
                  <div class="go-top">
                     <a class="smoothscroll" title="Back to Top" href="#top"></a>
                  </div>
               </div>
            </div>
         </div>
         <!-- end s-footer__bottom -->
      </footer>
      <!-- end s-footer -->



      <!-- preloader
         ================================================== -->
      <div id="preloader">
         <div id="loader">
            <div class="line-scale">
               <div></div>
               <div></div>
               <div></div>
               <div></div>
               <div></div>
            </div>
         </div>
      </div>
      <!-- Java Script
         ================================================== -->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>