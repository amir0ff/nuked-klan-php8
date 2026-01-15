<?php


global $loonr, $nuked, $kokku;

$kokku = mysql_num_rows(mysql_query("select * from $nuked[prefix]"._news." LIMIT 0, 30 "));
if ($loonr == "") {
$loonr = "0";
}


function top()
{
global $bgcolor1, $bgcolor2, $op, $user, $nuked;

nbvisiteur();

echo"	<html><head>
	<meta name=\"keywords\" lang=\"en-us\" content=\"$nuked[keyword]\">
	<meta name=\"Description\" content=\"$nuked[description]\">
                <meta name=\"author\" content=\"WoW Universe\" />
                <meta name=\"robots\" content=\"index, follow\" />

	<title>$nuked[name] - $nuked[slogan]</title>
	<link rel=\"shortcut icon\" href=\"favicon.png\" type=\"image/x-icon\">
                <meta name=\"blogcatalog\" content=\"9BC8856622\" > 
                <META name=\"y_key\" content=\"524b252b0b753560\" >
                <meta name=\"verify-v1\" content=\"vFRY/oTHnFHPjZlYe0xkW87Faor36zjrdr703e494/s=\" >
                <meta http-equiv=\"Content-Language\" content=\"en-us\" >
                <link rel=\"search\" type=\"application/opensearchdescription+xml\" href=\"/samples/thewowuniverse/opensearch.php\" title=\"WoW Universe\" >
	<link rel=\"alternate\" title=\"Latest News Headlines\" href=\"//feeds.feedburner.com/wow-news\" type=\"application/rss+xml\" >
	<link rel=\"alternate\" title=\"Latest Guides & Articles\" href=\"//feeds.feedburner.com/wow-articles\" type=\"application/rss+xml\" >
	<link rel=\"alternate\" title=\"Latest Downloads\" href=\"http://feeds.feedburner.com/wow-downloads\" type=\"application/rss+xml\" >
	<link rel=\"alternate\" title=\"Latest Links\" href=\"//feeds.feedburner.com/wow-links\" type=\"application/rss+xml\" >
	<link rel=\"alternate\" title=\"Latest Media\" href=\"//feeds.feedburner.com/wow-gallery\" type=\"application/rss+xml\" >
	<link rel=\"alternate\" title=\"Latest Forum Posts\" href=\"//feeds.feedburner.com/wow-forum\" type=\"application/rss+xml\" >
	<meta http-equiv=\"content-style-type\" content=\"text/css\" >
	<link title=\"style\" type=\"text/css\" rel=\"stylesheet\" href=\"themes/Wrath-of-the-Lich-King/style.css\" >
	</head>";

// Background
echo "      <body style=\"background: #000 url('/samples/thewowuniverse/themes/Wrath-of-the-Lich-King/images/theme-bg.jpg') repeat-x;\">";






echo "<script type=\"text/javascript\">\n";
echo "var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");\n";
echo "document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));\n";
echo "</script>\n";
echo "<script type=\"text/javascript\">\n";
echo "var pageTracker = _gat._getTracker(\"UA-4246032-2\");\n";
echo "pageTracker._trackPageview();\n";
echo "</script>\n";

echo "<SCRIPT LANGUAGE=\"JavaScript\">\n";
echo "function popUp(URL) {\n";
echo "day = new Date();\n";
echo "id = day.getTime();\n";
echo "eval(\"page\" + id + \" = window.open(URL, '\" + id + \"', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=267,height=295,left = 506.5,top = 389.5');\");\n";
echo "}\n";
echo "</script>\n";

// WoWhead Tooltip
echo "      <script src=\"//www.wowhead.com/widgets/power.js\"></script>";

echo "	<body text=\"#FFFFFF\" BGCOLOR=#000000 link=\"\" vlink=\"\" alink=\"\" leftmargin=\"0\" topmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" >";
      	
$nb=nbvisiteur();
if($nb[0]>1){$s0="s";}
if($nb[1]>1){$s1="s";}
if($nb[2]>1){$s2="s";}

	
	if (!$user) {
	$theuser1 = "&nbsp;&nbsp;Hey There! [<a href=\"index.php?file=User&op=reg_screen\">Register</a>] Or [<a href=\"index.php?file=User&op=login_screen\">Login</a>]";
    	} else {
	$theuser1 = "&nbsp;&nbsp;Welcome <b>$user[2]</b>, [<a href=\"index.php?file=User\">"._NAVACCOUNT."</a>]&nbsp;[<a href=\"index.php?file=User&nuked_nude=index&op=logout\">LogOut</a>]";}



// Top Header Banner



echo" <table align=\"center\" width=\"1024\" height=\"148\"><td height=\"148\" width=\"1024\" background=\"/samples/thewowuniverse/themes/Wrath-of-the-Lich-King/images/wrathofthelichkingbanner.jpg\"><big><center><font class=\"title\"><font color=\"#171717\"></font></font><p><font color=\"#171717\"></font></big></p></center></td></table>";

// Dropdown Menu

echo "<tr>\n";
echo "          <td width=\"870\" bordercolorlight=\"#FFFFFF\" bordercolor=\"#FFFFFF\" height=\"27\">\n";
echo "<table align=center class=tab height=\"1\" width=\"530\"><tr>\n";
echo "<td id=0 onmouseout=btnTimer() onmouseover=showLayer(\"Menu0\",'0') style=\"color: #FFFFFF\" height=\"1\" width=\"19\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=0 onmouseout=btnTimer() onmouseover=showLayer(\"Menu0\",'0') style=\"color: #FFFFFF\" height=\"1\" width=\"78\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><b>Home</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"18\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=1 onmouseout=btnTimer() onmouseover=showLayer(\"Menu1\",'1') style=\"color: #FFFFFF\" height=\"1\" width=\"17\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Forums</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"17\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=2 onmouseout=btnTimer() onmouseover=showLayer(\"Menu2\",'2') style=\"color: #FFFFFF\" height=\"1\" width=\"47\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Database</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=3 onmouseout=btnTimer() onmouseover=showLayer(\"Menu3\",'3') style=\"color: #FFFFFF\" height=\"1\" width=\"33\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Guides</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=4 onmouseout=btnTimer() onmouseover=showLayer(\"Menu4\",'4') style=\"color: #FFFFFF\" height=\"1\" width=\"36\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Media</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=5 onmouseout=btnTimer() onmouseover=showLayer(\"Menu5\",'5') style=\"color: #FFFFFF\" height=\"1\" width=\"55\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Downloads</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=6 onmouseout=btnTimer() onmouseover=showLayer(\"Menu6\",'6') style=\"color: #FFFFFF\" height=\"1\" width=\"39\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>AddOns</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/arrow-right.gif\" width=\"20\" height=\"17\"></font></font></td>\n";
echo "<td id=7 onmouseout=btnTimer() onmouseover=showLayer(\"Menu7\",'7') style=\"color: #FFFFFF\" height=\"1\" width=\"27\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Links</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"14\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/language.gif\" width=\"18\" height=\"18\"></font></font></td>\n";
echo "<td id=8 onmouseout=btnTimer() onmouseover=showLayer(\"Menu8\",'8') style=\"color: #FFFFFF\" height=\"1\" width=\"27\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Language</b></font></td>\n";
echo "<td style=\"color: #000000;\" height=\"1\" width=\"20\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"><font class=\"content\"><img src=\"images/races.gif\" width=\"26\" height=\"20\"></font></font></td>\n";
echo "<td id=9 onmouseout=btnTimer() onmouseover=showLayer(\"Menu9\",'9') style=\"color: #FFFFFF\" height=\"1\" width=\"60\"> \n";
echo "<font face=\"Verdana\" size=\"1\" color=\"#FFFFFF\"> <b>Theme</b></font></td>\n";
echo "</tr></table>\n";
echo "\n";
echo "<div id=Menu0 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=News\"> &nbsp;Home &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu1 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=Forum\"> &nbsp;Discussion Inn &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu2 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=Download\"> &nbsp;Downloads &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=Gallery\"> &nbsp;Media &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=Sections\"> &nbsp;Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"index.php?file=Links\"> &nbsp;Links &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu3 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Sections&op=categorie&secid=3\"> &nbsp;General Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Sections&op=categorie&secid=4\"> &nbsp;Profession Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Sections&op=categorie&secid=6\"> &nbsp;Leveling Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Sections&op=categorie&secid=5\"> &nbsp;Gold Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Sections&op=categorie&secid=2\"> &nbsp;Class Guides&nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000 bordercolorlight=\"#FFFFFF\">&nbsp; &nbsp;</td>\n";
echo "<td align=left bordercolorlight=\"#FFFFFF\">\n";
echo "<a class=\"asd\" target=\"_parent\" href=\"/index.php?file=Suggest&module=Sections\">&nbsp;- Submit Guide...&nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu4 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=3\"> &nbsp;Wallpapers &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=1\"> &nbsp;Movies &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=5\"> &nbsp;Fan Art &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=7\"> &nbsp;Music &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=2\"> &nbsp;Screenshots &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Gallery&op=categorie&cat=6\"> &nbsp;Misc &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd href=\"/index.php?file=Suggest&module=Gallery\"> &nbsp;- Submit Media... &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu5 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=1\"> &nbsp;WoW Files &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=2\"> &nbsp;AddOns &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Suggest&module=Download\"> &nbsp;- Submit File... &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu6 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=3\"> &nbsp;Auction Bars &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=10\"> &nbsp;Audio &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=12\"> &nbsp;Class &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=7\"> &nbsp;Inventory & Bags &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=5\"> &nbsp;Map &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=6\"> &nbsp;Quest & Leveling &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=9\"> &nbsp;Unit Frames &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=4\"> &nbsp;Auction & Economy &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Download&op=categorie&cat=8\"> &nbsp;Other &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Suggest&module=Download\"> &nbsp;- Submit AddOn...&nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu7 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=1\"> &nbsp;Databases & Resources &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=3\"> &nbsp;AddOns &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=4\"> &nbsp;Class &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=16\"> &nbsp;Guides &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=2\"> &nbsp;Official &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Links&op=categorie&cat=14\"> &nbsp;Misc &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Suggest&module=Links\"> &nbsp;- Submit Link... &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu8 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"http://www.google.com/translate?u=http://thewowuniverse.com&hl=en&ie=UTF8&sl=en&tl=de\"> &nbsp;German &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"http://translate.google.com/translate?u=http://thewowuniverse.com&hl=en&ie=UTF8&sl=en&tl=fi\"> &nbsp;Finnish &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"http://www.google.com/translate?u=http://thewowuniverse.com&hl=en&ie=UTF8&sl=en&tl=fr\"> &nbsp;French &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"http://www.google.com/translate?u=http://thewowuniverse.com&hl=en&ie=UTF8&sl=en&tl=es\"> &nbsp;Spanish &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=20 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"http://www.google.com/translate?u=http://thewowuniverse.com&hl=en&ie=UTF8&sl=en&tl=it\"> &nbsp;Italian &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=Suggest\"> &nbsp;- Submit Language... &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "<div id=Menu9 style=\"position: absolute; border: 1px solid #000000; visibility:hidden; z-ndex: 1\">\n";
echo "<table bgcolor=#000000 cellspacing=0 cellpadding=0 style=\"border-collapse: collapse;\">\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=User&op=change_theme\"> &nbsp;WoW Universe &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=User&op=change_theme\"> &nbsp;Wrath of the Lich King &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=User&op=change_theme\"> &nbsp;Alliance &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "<tr height=25 onmouseout=menuOut(this,'#000000') onmouseover=menuOver(this,'#000000')>\n";
echo "<td bgcolor=#000000>&nbsp; &nbsp;</td><td align=left>\n";
echo "<a class=asd target=\"_parent\" href=\"/index.php?file=User&op=change_theme\"> &nbsp;Horde &nbsp;</a> &nbsp; &nbsp;</td></tr>\n";
echo "</table></div>\n";
echo "</td>\n";
echo "        </tr>\n";
echo "		<tr>\n";
echo "			<td width=\"70%\" height=\"1\"><style>\n";
echo ".tab{font-family: arial, verdana, san-serif; font-size: 14px;}\n";
echo ".asd{text-decoration: none; font-family: arial, verdana, san-serif; font-size: 10px; color: #FFFFFF;}\n";
echo "            </style>\n";
echo "\n";
echo "<script language=javascript>\n";
echo "window.onerror = null;\n";
echo "var bName = navigator.appName;\n";
echo "var bVer = parseInt(navigator.appVersion);\n";
echo "var IE4 = (bName == \"Microsoft Internet Explorer\" && bVer >= 4);\n";
echo "var menuActive = 0;\n";
echo "var menuOn = 0;\n";
echo "var onLayer;\n";
echo "var timeOn = null;\n";
echo "\n";
echo "function showLayer(layerName,aa){\n";
echo "var x =document.getElementById(aa);\n";
echo "var tt =findPosX(x);\n";
echo "var ww =findPosY(x)+20;\n";
echo "\n";
echo "if (timeOn != null) {\n";
echo "clearTimeout(timeOn);\n";
echo "hideLayer(onLayer);\n";
echo "}\n";
echo "if (IE4) {\n";
echo "var layers = eval('document.all[\"'+layerName+'\"].style');\n";
echo "layers.left = tt;\n";
echo "eval('document.all[\"'+layerName+'\"].style.visibility=\"visible\"');\n";
echo "}\n";
echo "else {\n";
echo "if(document.getElementById){\n";
echo "var elementRef = document.getElementById(layerName);\n";
echo "if((elementRef.style)&& (elementRef.style.visibility!=null)){\n";
echo "elementRef.style.visibility = 'visible';\n";
echo "elementRef.style.left = tt;\n";
echo "elementRef.style.top = ww;\n";
echo "}\n";
echo "}\n";
echo "}\n";
echo "onLayer = layerName\n";
echo "}\n";
echo "\n";
echo "function hideLayer(layerName){\n";
echo "if (menuActive == 0)\n";
echo "{\n";
echo "if (IE4){\n";
echo "eval('document.all[\"'+layerName+'\"].style.visibility=\"hidden\"');\n";
echo "}\n";
echo "else{\n";
echo "if(document.getElementById){\n";
echo "var elementRef = document.getElementById(layerName);\n";
echo "if((elementRef.style)&& (elementRef.style.visibility!=null)){\n";
echo "elementRef.style.visibility = 'hidden';\n";
echo "}\n";
echo "}\n";
echo "}\n";
echo "}\n";
echo "}\n";
echo "\n";
echo "function btnTimer() {\n";
echo "timeOn = setTimeout(\"btnOut()\",600)\n";
echo "}\n";
echo "\n";
echo "function btnOut(layerName){\n";
echo "if (menuActive == 0){\n";
echo "hideLayer(onLayer)\n";
echo "}\n";
echo "}\n";
echo "\n";
echo "var item;\n";
echo "function menuOver(itemName,ocolor){\n";
echo "item=itemName;\n";
echo "itemName.style.backgroundColor = ocolor; //background color change on mouse over\n";
echo "clearTimeout(timeOn);\n";
echo "menuActive = 1\n";
echo "}\n";
echo "\n";
echo "function menuOut(itemName,ocolor){\n";
echo "if(item)\n";
echo "itemName.style.backgroundColor = ocolor;\n";
echo "menuActive = 0\n";
echo "timeOn = setTimeout(\"hideLayer(onLayer)\", 100)\n";
echo "}\n";
echo "\n";
echo "function findPosX(obj)\n";
echo "{\n";
echo "var curleft = 0;\n";
echo "if (obj.offsetParent)\n";
echo "{\n";
echo "while (obj.offsetParent)\n";
echo "{\n";
echo "curleft += obj.offsetLeft\n";
echo "obj = obj.offsetParent;\n";
echo "}\n";
echo "}\n";
echo "else if (obj.x)\n";
echo "curleft += obj.x;\n";
echo "return curleft;\n";
echo "}\n";
echo "\n";
echo "function findPosY(obj)\n";
echo "{\n";
echo "var curtop = 0;\n";
echo "if (obj.offsetParent)\n";
echo "{\n";
echo "while (obj.offsetParent)\n";
echo "{\n";
echo "curtop += obj.offsetTop\n";
echo "obj = obj.offsetParent;\n";
echo "}\n";
echo "}\n";
echo "else if (obj.y)\n";
echo "curtop += obj.y;\n";
echo "return curtop;\n";
echo "}\n";
echo "\n";
echo "            </script>\n";
echo "            </td>";
echo "		</tr>";
echo" <table align=\"center\" width=\"1024\ height=\"35\" cellspacing=\"0\" >
<tr>
<td width=\"1024\" height=\"35\" background=\"themes/Wrath-of-the-Lich-King/images/header-back.gif\" align=\"center\"><img style=\"border: 0;\" src=\"images/06.png\" alt=\"Online users\" /><font class=\"content\">$theuser1</font><font face=\"Tahoma\" size=\"3\" color=\"#FFFFFF\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[<marquee width=\"612\">$nuked[description]</marquee></font>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<script type=\"text/javascript\">
	var monthNames = new Array( '"._JAN."','"._FEB."','"._MAR."','"._APR."','"._MAY."','"._JUN."','"._JUL."','"._AUG."','"._SEP."','"._OCT."','"._NOV."','"._DEC."');
	var now = new Date();
	thisYear = now.getYear();
	if(thisYear < 1900) {thisYear += 1900};  
	document.write(now.getDate() + ' '  + monthNames[now.getMonth()] + ' ' + thisYear);
	</script>&nbsp;<img style=\"border: 0;\" src=\"images/25.png\" alt=\"Date\" /></td>
</tr></table>";
echo "	
	<table width=\"1024\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\" >


	<tr valign=\"top\">
	<td width=\"5\" bgcolor=\"#000000\"></td>
	<td width=\"50\"></td>
	<td bgcolor=\"#000000\" width=\"350\" valign=\"top\">";

	get_blok('gauche');

echo"	</td><td width=\"20\" height=\"1\" bgcolor=#000000>&nbsp;</td><td valign=\"top\" width=\"200%\" bgcolor=\"#000000\">";
	
if($op==index){get_blok('centre');}
else if($req==index){get_blok('centre');}
}



function footer()
{
	global $bgcolor1, $bgcolor2, $bgcolor3, $bgcolor4, $nuked;

echo"	</td><td width=\"20\" height=\"1\" bgcolor=\"#000000\">&nbsp;</td><td valign=\"top\" width=\"200%\" bgcolor=\"#000000\">";
	
	get_blok('droite');
	
echo"	</td><td width=\"5\" height=\"1\" bgcolor=\"#000000\"<td width=\"10\"></td>&nbsp;</td></tr></table>
	<table width=\"1024\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">
	<tr><td width=100% background=\"/samples/thewowuniverse/images/footer.gif\" align=\"center\"><br></td></tr>";
	echo"<br><table align=\"center\" width=1024 height=\"35\" cellspacing=\"0\" >
<tr><td background=\"themes/Wrath-of-the-Lich-King/images/header-back.gif\" align=\"center\"><font class=\"content\"><p>$nuked[footmessage]</p></font></td>
</tr></table><center><script type=\"text/javascript\">addthis_pub  = 'AMEER157';addthis_brand  = 'WoW Universe';addthis_options  = 'favorites, email, digg, delicious, reddit, stumbleupon, google, live, myweb, furl, slashdot, twitter, more';addthis_logo  = '/samples/thewowuniverse/images/wowuniverselogo.png';</script>
<script type=\"text/javascript\" src=\"//s7.addthis.com/js/152/addthis_widget.js\">
</script><img src=\"/samples/thewowuniverse/images/wowuniverselogo.png\" alt=\"WoW Universe\" title=\"WoW Universe\" border=\"0\" width=\"122\" height=\"49\">&nbsp;&nbsp;
<a href=\"//www.addthis.com/bookmark.php\" onmouseover=\"return addthis_open(this, '', '[URL]', '[TITLE]')\" onmouseout=\"addthis_close()\" onclick=\"return addthis_sendto()\"><img src=\"/samples/thewowuniverse/images/puces/share-icon-16x16.png\" alt border=\"0\" width=\"16\" height=\"16\"> Bookmark & Share</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/index.php?file=Page&name=RSS\"><img src=\"/samples/thewowuniverse/images/puces/feed-icon-16x16.png\" alt border=\"0\" width=\"16\" height=\"16\"> RSS Feeds</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/index.php?file=Contact\">Contact Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/index.php?file=Page&name=Disclaimer\">Disclaimer</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/index.php?file=Page&name=Terms\">Terms of Use</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"/index.php?file=Page&name=Privacy\">Privacy Policy</a></center>"; 


}


	
function news($data){
$posted = " "._NEWSPOSTBY." <a href=\"index.php?file=Members&op=detail&autor=$data[auteur]\">$data[auteur]</a>&nbsp;"._THE." $data[date] "._AT." $data[heure] ";
$comment = "<img border=\"0\" src=\"images/comment.gif\"> <a href=\"index.php?file=News&op=index_comment&news_id=$data[id]\">"._NEWSCOMMENT."</a> ($data[nb_comment])&nbsp;&nbsp;|&nbsp;&nbsp;Download as PDF: $data[printpage]&nbsp;&nbsp;|&nbsp;&nbsp;Send to friend: $data[friend]&nbsp;&nbsp;|&nbsp;&nbsp;Bookmark & Share:<script type=\"text/javascript\">addthis_pub  = 'AMEER157';addthis_brand  = 'WoW Universe';addthis_options  = 'favorites, email, digg, delicious, reddit, stumbleupon, google, live, myweb, furl, slashdot, twitter, more';addthis_logo  = '/samples/thewowuniverse/images/wowuniverselogo.png';</script>
<a href=\"//www.addthis.com/bookmark.php\" onmouseover=\"return addthis_open(this, '', 'thewowuniverse.com/index.php?file=News&amp;op=index_comment&amp;news_id=" . $data['id'] . "', '" . $data['titre'] . "')\" onmouseout=\"addthis_close()\" onclick=\"return addthis_sendto()\"><img src=\"/samples/thewowuniverse/images/puces/share-icon-14x14.png\" width=\"14\" height=\"14\" border=\"0\" alt=\"\" /></a><script type=\"text/javascript\" src=\"//s7.addthis.com/js/152/addthis_widget.js\"></script>";

$tmpl_file = "themes/Wrath-of-the-Lich-King/story_home.html";
$thefile = implode("", file($tmpl_file));
$thefile = addslashes($thefile);
$thefile = "\$r_file=\"".$thefile."\";";
eval($thefile);
print $r_file;
}

function block_centre($block)
{
global $bgcolor1, $bgcolor2;
echo " 	<table class=\"bordure\" width=\"100% \" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#000000\" style=\"border-collapse: collapse\"><tr><td>
	<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"8\" bgcolor=\"#000000\" style=\"border-collapse: collapse\" ><tr><td>";
echo"      <img border=\"0\" src=\"/samples/thewowuniverse/images/links.gif\" width=\"10\" height=\"11\">&nbsp;<b>$block[titre]</b><br>$block[content]";
echo "     </td></tr></table></td></tr></table><br>";	
}

function block_gauche($block){
$tmpl_file = "themes/Wrath-of-the-Lich-King/blocks.html";
$thefile = implode("", file($tmpl_file));
$thefile = addslashes($thefile);
$thefile = "\$r_file=\"".$thefile."\";";
eval($thefile);
print $r_file;
}


function block_droite($block){
$tmpl_file = "themes/Wrath-of-the-Lich-King/blocks.html";
$thefile = implode("", file($tmpl_file));
$thefile = addslashes($thefile);
$thefile = "\$r_file=\"".$thefile."\";";
eval($thefile);
print $r_file;
}


function OpenTable() 
{
global $bgcolor1, $bgcolor2;

echo "	<center><table width=\"100%\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"#000000\"><tr><td>
	<table width=\"100%\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"#000000\"><tr><td align=\"right\">";
}


function CloseTable() 
{
echo "</td></tr></table></td></tr></table>";
}

?>
