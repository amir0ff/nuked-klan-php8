<?php
/**
 * index.php
 *
 * Main script to launch process execution
 *
 * @version 1.7
 * @link http://www.nuked-klan.org Clan Management System for Gamers
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright 2001-2015 Nuked-Klan (Registred Trademark)
 */

ini_set('default_charset', 'ISO8859-1');

// Include MySQLi compatibility layer BEFORE anything else that uses mysql_* functions
require_once dirname(__DIR__) . "/Includes/mysqli_compat.php";

// Temporarily enable error display for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'free.fr') !== false && isset($_SERVER['DOCUMENT_ROOT']) && ! is_dir($_SERVER['DOCUMENT_ROOT'] .'/sessions'))
    mkdir($_SERVER['DOCUMENT_ROOT'].'/sessions', 0700);

require_once 'includes/autoload.php';

$install = new process();
$install->run();

?>
