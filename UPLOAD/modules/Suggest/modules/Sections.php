<?php
// -------------------------------------------------------------------------//
// Nuked-KlaN - Portal PHP                                                  //
// http://www.nuked-klan.org                                                //
// -------------------------------------------------------------------------//
// This program is free software. you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License.           //
// -------------------------------------------------------------------------//
if (!defined("INDEX_CHECK"))
{
    exit('You can\'t run this file alone.');
}

function form($content, $sug_id)
{
    global $nuked, $user, $language, $captcha;

    translate("modules/Sections/lang/" . $language . ".lang.php");

    // Fix: Check if $content is an array and has required elements
    $is_content_array = is_array($content) && count($content) >= 5;
    
    if ($is_content_array && !empty($content[0]))
    {
        $titre = "<big><b>" . _VALIDART . "</b></big>";
        $action = "index.php?file=Suggest&amp;page=admin&amp;op=valid_suggest&amp;module=Sections";
        $autor = isset($content[3]) ? $content[3] : '';
        $autor_id = isset($content[4]) ? $content[4] : '';

    echo "<script type=\"text/javascript\">\n"
    . "<!--\n"
    . "\n"
    . "function del_sug(id)\n"
    . "{\n"
    . "if (confirm('" . _DELETESUG . " '+id+' ! " . _CONFIRM . "'))\n"
    . "{document.location.href = 'index.php?file=Suggest&page=admin&op=raison&sug_id='+id;}\n"
    . "}\n"
    . "\n"
    . "// -->\n"
    . "</script>\n";

        $refuse = "&nbsp;<input type=\"button\" value=\"" . _REMOVE . "\" onclick=\"javascript:del_sug('" . $sug_id . "');\" /></div>\n"
    . "<div style=\"text-align: center;\"><br />[ <a href=\"index.php?file=Suggest&amp;page=admin\"><b>" . _BACK . "</b></a> ]</div></form><br />\n";
    }
    else
    {
        $titre = "<big><b> " . _SECTIONS . " </b></big></div>\n"
    . "<div style=\"text-align: center;\"><br />\n"
    . "[ <a href=\"index.php?file=Sections\" style=\"text-decoration: underline\">" . _INDEXSECTIONS . "</a> | "
    . "<a href=\"index.php?file=Sections&amp;op=classe&amp;orderby=news\" style=\"text-decoration: underline\">" . _NEWSART . "</a> | "
    . "<a href=\"index.php?file=Sections&amp;op=classe&amp;orderby=count\" style=\"text-decoration: underline\">" . _TOPART . "</a> | "
    . _SUGGESTART . " ]";

        $action = "index.php?file=Suggest&amp;op=add_sug&amp;module=Sections";
        $autor = $user[2];
        $autor_id = $user[0];
    $refuse = "</div></form><br />\n";
    }

    // Fix: Safely access $content array elements
    $content_title = ($is_content_array && isset($content[0])) ? $content[0] : '';
    $content_secid = ($is_content_array && isset($content[1])) ? $content[1] : '';
    $content_texte = ($is_content_array && isset($content[2])) ? $content[2] : '';
    
    echo "<br /><div style=\"text-align: center;\">" . $titre . "</div><br />\n"
    . "<form method=\"post\" action=\"$action\">\n"
    . "<table style=\"margin: auto; width: 98%; text-align: left;\" cellspacing=\"0\" cellpadding=\"2\"border=\"0\">\n"
    . "<tr><td><b>" . _TITLE . "</b> : <input type=\"text\" name=\"title\" size=\"45\" value=\"" . nkHtmlEntities($content_title, ENT_QUOTES) . "\" /></td></tr>\n"
    . "<tr><td><b>" . _CAT . " :</b> <select name=\"secid\"><option value=\"0\">* " . _NONE . "</option>\n";

    $sql = mysql_query("SELECT secid, secname FROM " . SECTIONS_CAT_TABLE . " WHERE parentid = 0 ORDER BY position, secname");
    while (list($secid, $titre) = mysql_fetch_array($sql))
    {
        $titre = printSecuTags($titre);

        if ($is_content_array && isset($content[1]))
        {
            if ($secid == $content_secid) $selected = "selected=\"selected\"";
            else $selected = "";
        }
        echo "<option value=\"" . $secid . "\" " . $selected . ">* " . $titre . "</option>\n";

        $sql2 = mysql_query("SELECT secid, secname FROM " . SECTIONS_CAT_TABLE . " WHERE parentid = '" . $secid . "' ORDER BY position, secname");
        while (list($s_cid, $s_titre) = mysql_fetch_array($sql2))
        {
            $s_titre = printSecuTags($s_titre);

            if ($is_content_array && isset($content[1]))
            {
                if ($s_cid == $content_secid) $selected1 = "selected=\"selected\"";
                else $selected = "";
            }
            echo "<option value=\"" . $s_cid . "\" " . $selected1 . ">&nbsp;&nbsp;&nbsp;" . $s_titre . "</option>\n";
        }
    }

    echo "</select></td></tr>\n";

    echo "<tr><td><b>" . _TEXT . "</b></td></tr>\n"
    . "<tr><td><textarea ";

    echo isset($_REQUEST['page']) && $_REQUEST['page'] == 'admin' ? 'class="editor" ' : 'id="e_advanced" ';

    echo "name=\"texte\" cols=\"65\" rows=\"12\">" .  nkHtmlEntities($content_texte, ENT_QUOTES) . "</textarea></td></tr>\n"
        . "<tr><td>&nbsp;<input type=\"hidden\" name=\"sug_id\" value=\"" . $sug_id . "\" />\n"
        . "<input type=\"hidden\" name=\"auteur\" value=\"" . $autor . "\" />\n"
        . "<input type=\"hidden\" name=\"auteur_id\" value=\"" . $autor_id . "\" />";

    if (initCaptcha()) echo create_captcha();

    echo "</td></tr></table>\n"
        . "<div style=\"text-align: center;\"><small>" . _PAGEBREACK . "</small></div>\n"
        . "<div style=\"text-align: center;\"><br /><input type=\"submit\" value=\"" . _SEND . "\" />" . $refuse;
}

function make_array($data)
{
    $data['title'] = printSecuTags($data['title']);
    $data['secid'] = nkHtmlEntities($data['secid']);
    $data['auteur'] = nkHtmlEntities($data['auteur']);
    $data['auteur_id'] = nkHtmlEntities($data['auteur_id']);

    $data['title'] = str_replace("|", "&#124;", $data['title']);
    $data['texte'] = str_replace("|", "&#124;", $data['texte']);

    $content = $data['title'] . "|" . $data['secid'] . "|" . $data['texte'] . "|" . $data['auteur'] . "|" . $data['auteur_id'];
    return $content;
}

function send($data)
{
    global $nuked;

    if ($data['auteur'] != "")
    {
        $autor = $data['auteur'];
    }
    else
    {
        $autor = $user[2];
    }

    if ($data['auteur_id'] != "")
    {
        $autor_id = $data['auteur_id'];
    }
    else
    {
        $autor_id = $user[0];
    }

    $data['title'] = mysql_real_escape_string(stripslashes($data['title']));
    $data['texte'] = nkHtmlEntityDecode($data['texte']);
    $data['texte'] = mysql_real_escape_string(stripslashes($data['texte']));
    $date = time();

    $upd = mysql_query("INSERT INTO " . SECTIONS_TABLE . " ( `artid` , `secid` , `title` , `content` , `autor` , `autor_id`, `counter` , `date` ) VALUES ( '' , '" . $data['secid'] . "' , '" . $data['title'] . "' , '" . $data['texte'] . "' , '" . $autor . "' , '" . $autor_id . "' , '' , '" . $date. "' )");
    $sql2 = mysql_query("SELECT artid FROM " . SECTIONS_TABLE . " WHERE title = '" . $data['title'] . "' AND date='".$date."'");
        list($artid) = mysql_fetch_array($sql2);
        echo "<script>\n"
            ."setTimeout('screen()','3000');\n"
            ."function screen() { \n"
            ."screenon('index.php?file=Sections&op=article&artid=".$artid."', 'index.php?file=Suggest&page=admin');\n"
            ."}\n"
            ."</script>\n";
}

?>
