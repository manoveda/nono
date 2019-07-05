<?php
	$canSend = true;
	$regex_mail = '/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i';
	
	if (get_magic_quotes_gpc())
	{
    	$firstName 	 = stripslashes(htmlentities(trim($_POST['first']))); 
    	$lastName 	 = stripslashes(htmlentities(trim($_POST['last']))); 
    	$address 	 = stripslashes(htmlentities(trim($_POST['address']))); 
    	$city        = stripslashes(htmlentities(trim($_POST['city']))); 
    	$phoneNumber = stripslashes(htmlentities(trim($_POST['phone'])));
		$eMail 		 = stripslashes(htmlentities(trim($_POST['email'])));
		//$sejour 	 = stripslashes(htmlentities(trim($_POST['Sejour']))); 
		$formation	 = stripslashes(htmlentities(trim($_POST['Formations']))); 
		$massages 	 = stripslashes(htmlentities(trim($_POST['Massages']))); 
		$soins 		 = stripslashes(htmlentities(trim($_POST['Soins']))); 
		$cures   	 = stripslashes(htmlentities(trim($_POST['Cures'])));
		$formations  = stripslashes(htmlentities(trim($_POST['Formations'])));
		$comArea 	 = stripslashes(htmlentities(trim($_POST['com_area'])));
	} 
	else
	{  
		$firstName 	 = htmlentities(trim($_POST['first'])); 
    	$lastName 	 = htmlentities(trim($_POST['last'])); 
    	$address 	 = htmlentities(trim($_POST['address'])); 
    	$city 		 = htmlentities(trim($_POST['city'])); 
    	$phoneNumber = htmlentities(trim($_POST['phone']));
		$eMail 	 	 = htmlentities(trim($_POST['email']));
		//$sejour 	 = htmlentities(trim($_POST['Sejour'])); 
		$formation	 = htmlentities(trim($_POST['Formations'])); 
		$massages 	 = htmlentities(trim($_POST['Massages'])); 
		$soins 		 = htmlentities(trim($_POST['Soins'])); 
		$cures 	     = htmlentities(trim($_POST['Cures']));
		$formations  = htmlentities(trim($_POST['Formations']));
		$comArea 	 = htmlentities(trim($_POST['com_area'])); 
	}
	
	if (empty($firstName) 
    || empty($lastName) 
    || empty($eMail)) 
	{  
    	$alert = 'Votre nom, prénom et adresse mail doivent être renseignés.';
		$canSend = false;
	}
	if (!preg_match($regex_mail, $eMail))
	{  
		$alert = 'Votre adresse '.$eMail.' n\'est pas valide.';
		$canSend = false; 
	}
	if ($_SERVER['HTTP_REFERER'] != 'http://www.soins-ayurvediques.fr/www/contact.html')
	{  
		header('Location: http://www.soins-ayurvediques.fr/www/thank_you.php'); 
		$alert = 'Le programme a détecté un robot de spam !';
		$canSend = false;
	}

	$to = 'hdbrandao@gmail.com';
	
	$subject = 'Demande de contact sur soins-ayurvediques.fr par '.$firstName.' '.$lastName;
	
	$headers ='From: "Demande de Contact"<hdbrandao@gmail.com>'."\n";
	$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
	$headers .='Content-Transfer-Encoding: 8bit';

	$message =
		'<html>
			<head>
				<title>'.$firstName.' '.$lastName.' souhaite avoir des informations sur vos services de soins ayurvediques.</title>
				
				<style type="text/css">
  					  #header
					  {
						font-size:18px;
					  }
					  
					  .value
					  {
						  color:#0099CC;
						  font-size:16px;
					  }
					  
					  .result
					  {
						height:30px;
						font-size:16px;
					  }
  				</style>
			</head>
     		<body>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr align="center">
						<td width="100%" id="header" height="50px" valign="top"><b>'.$firstName.' '.$lastName.'</b> souhaite avoir des informations sur vos services de soins ayurvediques.</td>
					</tr>
					<tr>
						<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Prénom :</td>
								<td align="left" class="result">'.$firstName.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Nom :</td>
								<td align="left" class="result">'.$lastName.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Adresse :</td>
								<td align="left" class="result">'.$address.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Ville :</td>
								<td align="left" class="result">'.$city.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Téléphone :</td>
								<td align="left" class="result">'.$phoneNumber.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">eMail :</td>
								<td align="left" class="result">'.$eMail.'</td>
							</tr>

							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Formationinde :</td>
								<td align="left" class="result">'.$formation.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Massages :</td>
								<td align="left" class="result">'.$massages.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Soins :</td>
								<td align="left" class="result">'.$soins.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Cures :</td>
								<td align="left" class="result">'.$cures.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Formations :</td>
								<td align="left" class="result">'.$formations.'</td>
							</tr>
							<tr align="left" height="30px"> 
								<td align="left" width="100px" class="value">Commentaire :</td>
								<td align="left" class="result">'.$comArea.'</td>
							</tr>
						</table>
					</tr>
				</table>
			</body>
		</html>';

	 if($canSend && isset($_COOKIE['sent']))
	 {
		 $alert = 'Vous avez essayer d\'envoyer deux fois un même message. Attendez quelques minutes pour en envoyer un autre.';
		 $canSend = false;
	 }
	 if($canSend)
	 {
		 if (mail($to, $subject, $message, $headers))
		 {
		 	setcookie('sent', '1', time() + 120);
		 }
	 }
?>

<!DOCTYPE html>
<html id="innerPage" class="no-js" lang="en">
<head>

<title> merci pour votre message | Centre Ayurvédique Mano Veda | Soins, cures, soins de bien-être </title>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Centre Ayurvédique Marseille | Ayurvéda , formations, massages, soins, cures, bilans ayurvédiques</title>
    <meta name="description" content="">
    <meta name="author" content="">s

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>


<body>


<table border="0" cellpadding="0" cellspacing="0" width="1100" align="center">
<tr>
   <td><a href="index.html"><img name="home" src="images/home_ciel.gif" width="76" height="22" border="0" id="home" alt="home" /></a></td>
   <td><a href="about.html"><img name="about" src="images/about_ciel.gif" width="140" height="22" border="0" id="about" alt="Mano veda " /></a></td>
   <td><a href="actualite.html"><img name="actualite" src="images/actualite_ciel.gif" width="129" height="22" border="0" id="actualite" alt="actualités" /></a></td>
   <td><a href="formules.html"><img name="formules" src="images/formules_ciel.gif" width="125" height="22" border="0" id="formules" alt="bient-être" /></a></td>
   <td><a href="soins.html"><img name="soins" src="images/soins_ciel.gif" width="89" height="22" border="0" id="soins" alt="Soins et Cures" /></a></td>
   <td><a href="cures.html"><img name="cures" src="images/cures_ciel.gif" width="92" height="22" border="0" id="cures" alt="" /></a></td>
   <td><a href="formations.html"><img name="formation" src="images/formation_ciel.gif" width="144" height="22" border="0" id="formation" alt="formations" /></a></td>
   <td><a href="yoga.html"><img name="yoga" src="images/yoga_ciel.gif" width="74" height="22" border="0" id="yoga" alt="yoga" /></a></td>
   <td><a href="livre.html"><img name="livre" src="images/livre_ciel.gif" width="131" height="22" border="0" id="livre" alt="Livre d'Or" /></a></td>
   <td><a href="contact.html"><img name="contact" src="images/contact_ciel.gif" width="100" height="22" border="0" id="contact" alt="Contact" /></a></td>
  </tr>
 <tr><td colspan="10"><a href="index.html"><img src="images/blue.jpg" name="poudres bleu" width="1100" height="330" border="0" align="left"></a></td>
    
  </tr>
  
</table>


	<br><br>
<table width="1100" cellpadding="0" cellspacing="0" border="0" align="center">
  <tr> 
    <td  valign="top"> 
      <table width="1100" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
		<tr>
			<td valign="top" align="center" class="newsHeadline">
            <?php
				if($canSend)
				{
					echo "<br><br><br><b>Merci, votre message a &eacute;t&eacute;  envoy&eacute;, nous vous contacterons prochainement.</b><br><br><br><br><br><br><br></td>";
				}
				else
				{
					echo "<br><br><br><b style=\"color:red\"> $alert </b><br><br><br><br><br><br><br></td>";
				}
			?>		
		</tr>
        <tr>
			<td valign="top" align="center" class="newsHeadline">
             <?php
				if($canSend)
				{
					echo "<br><br><br><b >Voici le rappel des informations que vous nous avez transmis :</b><br><br><br></td>";	
				}
			 ?>
		</tr>
        <tr>
			<td valign="top" align="center">
            <?php
				if($canSend)
				{
					echo "
					<div class=\"fields\">
						<div class=\"value\">Prénom : </div>
						<div class=\"result\">$firstName</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Nom : </div>
						<div class=\"result\">$lastName</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Adresse : </div>
						<div class=\"result\">$address</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Ville : </div>
						<div class=\"result\">$city</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Téléphone : </div>
						<div class=\"result\">$phoneNumber</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">eMail : </div>
						<div class=\"result\">$eMail</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Séjour : </div>
						<div class=\"result\">$sejour</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Formationinde : </div>
						<div class=\"result\">$formation</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Massages : </div>
						<div class=\"result\">$massages</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Soin : </div>
						<div class=\"result\">$soins</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Cures : </div>
						<div class=\"result\">$cures</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Formations : </div>
						<div class=\"result\">$formations</div> 
					</div>
					<div class=\"fields\">
						<div class=\"value\">Commentaire : </div>
						<div class=\"resultBig\">$comArea</div> 
					</div>";
				}
			?>
            </td>						
		</tr>
		</table>
			
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
  <br>
  <table width="65%" cellpadding="0" cellspacing="2" border="0" align="center">
    <tr> 
      <td colspan = "2" valign="top">  
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
          <tr> 
            <td valign = "bottom" align = "center"> 
              <table cellspadding="1" cellspacing="0" border="0" align="center">
                <tr> 
                  <td><img src="images/shim.gif" height = "1" width = "1" alt = ""></td>
                </tr>
                <tr> 
                  <td class = "footer"> <a class = "footer" href = "index.html"><u>Home</u></a>&nbsp;| 
                    <a class = "footer" href = "about.html">Mano Veda</a>&nbsp;| 
					<a class = "footer" href = "actualite.html">Actualit&eacute;s</a>&nbsp;| 
                    <a class = "footer" href = "formules.html">Bien-&ecirc;tre</a>&nbsp;| 
					<a class = "footer" href = "soins.html">Soins</a>&nbsp;| 
					<a class = "footer" href = "cures.html">Cures</a>&nbsp;| 
					<a class = "footer" href = "yoga.html">Yoga</a>&nbsp;| 
					<a class = "footer" href = "formations.html">Formations</a>&nbsp;| 
					<a class = "footer" href = "livre.html">Livre d'Or</a>&nbsp;| 
                       <a class = "footer" href = "sitemap.html">Sitemap</a>&nbsp;| 
                    <a class = "footer" href = "contact.html">Contact</a><br>
                    <br>                </td>
              </tr>
                <tr> 
                  <td><img src="images/shim.gif" height = "1" width = "1" alt = ""></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr height = "2"> 
            <td align = "left" height = "2"> 
              <table border = "0" cellspacing = "0" cellpadding = "0" background = "images/shim_ciel.gif" width ="1100" height="8"  align="center">
                <tr> 
                  <td><img src = "images/shim_ciel.gif" height = "2" width = "4" border = "0" alt = ""></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr> 
            <td><img src="images/shim.gif" height = "2" width = "1"></td>
          </tr>
          <tr> 
            <td><img src="images/shim.gif" height = "4" width = "1" alt = ""></td>
          </tr>
          
          <tr> 
            <td><img src="images/shim.gif" height = "4" width = "1" alt = ""></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td colspan = "2" bgcolor="#ffffff"> 
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
          <tr> 
            <td valign = "top"> 
              <table border = "0" cellspacing = "0" cellpadding = "0" width = "100%" align="center">
                <tr> 
                  <td bgcolor = "#ffffff"><img src="images/shim.gif" height = "1" width = "1" alt = ""></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td colspan = "2"><img src="images/shim.gif" height = "2" width = "1" alt = ""></td>
    </tr>
    <tr> 
      <td colspan = "2" align = "center"> <font class = "copyrightText">Copyright &copy; 
        2015 Pascal Manso. All rights reserved.<br>
        
        </font> </td>
    </tr>
  </table>


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
                     <li><a href="contact.html">Contact</a></li>
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
                     <li><a href="#0">Pinterest</a></li>
                     <li><a href="#0">Instagram</a></li>
                     <li><a href="#0">Twitter</a></li>
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
                     <span>Copyright © 2019 - Centre Ayurvédique Manoveda. Tout droit reservé.</span> 
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