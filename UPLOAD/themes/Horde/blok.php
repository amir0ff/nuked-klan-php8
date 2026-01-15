<?php
//-------------------------------------------------------------------------//
//  Nuked-KlaN - PHP Portal                                                //
//  http://www.nuked-klan.org                                              //
//-------------------------------------------------------------------------//
//  This program is free software. you can redistribute it and/or modify   //
//  it under the terms of the GNU General Public License as published by   //
//  the Free Software Foundation; either version 2 of the License.         //
//-------------------------------------------------------------------------//

if (eregi("blok.php", $_SERVER['PHP_SELF'])) {
	die ("You cannot open this page directly");
	}

global $user, $nuked, $language;
include("modules/User/lang/".$language.".lang.php");

	$sql=mysql_query("SELECT mid FROM $nuked[prefix]"._userbox." WHERE user_for='$user[2]' AND status=0");
	$nb_mess=mysql_num_rows($sql);
	
	$sql2=mysql_query("SELECT mid FROM $nuked[prefix]"._userbox." WHERE user_for='$user[2]' AND status=1");
	$nb_mess_lu=mysql_num_rows($sql2);
	
	$sql3=mysql_query("SELECT solde FROM $nuked[prefix]"._users." WHERE id='$user[0]'");
	list($solde) = mysql_fetch_array($sql2);

$sql4=mysql_query("SELECT avatar, date FROM $nuked[prefix]"._users." WHERE id='$user[0]'");
list($avatar, $date) = mysql_fetch_array($sql4);
$date2 = strftime("%x ", $date);


echo"	<small><center>Hello <b>$user[2]</b></center><br>";
if($date==1085124808){echo" <center>Membre depuis longtemps</center><br>";}else{echo" <center>Membre depuis le: $date2</center><br>";}
if($avatar==""){echo"<center><img src=\"http://aodteam.com/images/Avatar_publics/noavatar.png\"></center><br>";}
else{echo"<a href=\"index.php?file=User&op=edit_account\"><center><img src=\"$avatar\" width=\"120\" border=\"0\"></a></center><br><br>";}

//****************************** Ajouter par *AoD | Wolf *********************//
$solde_user = mysql_query("SELECT niveau, solde FROM $nuked[prefix]"._users." WHERE id='$user[0]' ");
list($niveau, $solde)= mysql_fetch_array($solde_user);
if($niveau >1)
{
      echo"<center>"._YOURSOLDE." [".$solde." €<br>
        <a href=\"index.php?file=Finances&id=$user_id\">"._DETAILS."</a></center><br>";
}
//************************** Fin de ajouter par *AoD | Wolf ******************//


echo"<br><li> <a href=\"index.php?file=User&op=edit_pref\"><small>Préférences</a>
     <li> <a href=\"index.php?file=User\"><small>Compte</a>
	 <li> [<a href=\"index.php?file=User&nuked_nude=index&op=logout\"><small>Se déconnecter</a><br><br>";

echo" <center>Vous avez $nb_mess messages<br>
<img src=\"../siteteamwar3/images/posticon.gif\"> <a href=\"index.php?file=Userbox\"><small>Voir ses messages</small></a><br>
<img src=\"../siteteamwar3/images/posticon.gif\"> <a href=\"index.php?file=Userbox&op=post_message\"><small>Poster un message</small></a> ";


?>