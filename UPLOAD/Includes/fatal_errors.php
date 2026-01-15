<?php
// PHP ERROR NK
$lang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'en';
if($lang == 'fr'){
    define('ERROR_SESSION', 'Erreur dans la cr�ation de la session anonyme');
    define('THEME_NOTFOUND','Erreur fatale : Impossible de trouver le th�me');
    define('ERROR_QUERY','Veuillez nous excuser, le site web est actuellement indisponible !<br />Information :<br />Connexion SQL impossible.');
    define('ERROR_QUERYDB','Veuillez nous excuser, le site web est actuellement indisponible !<br />Information :<br />Nom de base de donn�es sql incorrect.');
    define('ERROR_SQL', '<b>Une erreur SQL a �t� d�tect�e.<br /><br />Information :<br /><br />Mon ERREUR</b> [' . $errno . '] ' . $errstr . '<br />Erreur fatale sur la ligne ' . $errline . ' dans le fichier ' . $errfile . ', PHP ' . PHP_VERSION . ' (' . PHP_OS . ')<br />Arr�t...<br />');
    define('WBSITE_CLOSED','Ce site est momentan�ment ferm�, merci de r�essayer plus tard');
    define('WAYTODO', 'Qu\'essayez vous de faire ?');
    define('REMOVEDIRINST', 'Veuillez supprimer le dossier d\'installation de Nuked-Klan (/INSTALL/)');
    define('REMOVEINST', 'Veuillez supprimer vos fichiers d\'installation de modules ou de patchs (install.php ou update.php)');
    define('DBPREFIX_ERROR', 'Impossible de se connecter � la base de donn�es ! V�rifier que la variable $db_prefix du fichier conf.inc.php correspond au pr�fixe de vos tables.');
}
else{
    define('ERROR_SESSION', 'Error in creating the anonymous session');
    define('THEME_NOTFOUND','Fatal error : No theme found');
    define('ERROR_QUERY','Sorry but the website is not available !<br />Information :<br />SQL connection impossible.');
    define('ERROR_QUERYDB','Sorry but the website is not available !<br />Information :<br />Database SQL name incorrect.');
    $errno_val = isset($errno) ? $errno : '';
    $errstr_val = isset($errstr) ? $errstr : '';
    $errline_val = isset($errline) ? $errline : '';
    $errfile_val = isset($errfile) ? $errfile : '';
    define('ERROR_SQL', '<b>A SQL error has been detected.<br /><br />Information:<br /><br />My ERROR</b> [' . $errno_val . '] ' . $errstr_val . '<br />Fatal error on the line ' . $errline_val . ', file ' . $errfile_val . ', PHP ' . PHP_VERSION . ' (' . PHP_OS . ')<br />Stop...<br />');
    define('WBSITE_CLOSED', 'Sorry, this website is momently closed, Please try again later.');
    define('WAYTODO', 'What are you trying to do ?');
    define('REMOVEDIRINST', 'Please delete Nuked-Klan\'s installation folder (/INSTALL/)');
    define('REMOVEINST', 'Please delete your installation files for modules or patches (install.php or update.php)');
    define('DBPREFIX_ERROR', 'Can\'t connect to the database ! Check that $db_prefix variable on conf.inc.php file match with your prefix tables.');
}
?>