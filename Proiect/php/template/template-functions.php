<?php
include_once('class-theme-methods.php');

function do_sidebar()
{
    global $themeMethods;
    
    $CssClass="sidebar";
    
    //This array contains the menu items
    $items_array=array(
                        array('text'=>'Home','url'=>'home.php'),
                        array('text'=>'Colectii','url'=>'colectii.php'),
                        array('text'=>'Statistici','url'=>'statistici.php'),
                        array('text'=>'Noutati','url'=>'noutati.php'),
                        array('text'=>'Recenzii','url'=>'recenzii.php'),
                        array('text'=>'Contact','url'=>'contact.php'),
                        array('text'=>'Import','url'=>'import.php')
                    );
    return $themeMethods->navigation($items_array,$CssClass);
}

function do_html_title($page_title)
{
$title=$page_title.'| Artifacty-Proiect-TW';
return $title;
}

function do_topbar()
{
    $topbar='<ul class="topbar">';
    
    if(isset($_SESSION['usr_id']))
    {
        $topbar.='
                <li class="topbar"><a class="topbar" href="">Signed in as '.$_SESSION['username'].'</a></li>
                <li class="topbar"><a class="topbar" href="php/logout.php">Log out</a></li>';
    }
    else 
    { 
        $topbar.='
                <li class="topbar"><a class="topbar" href="php/login.php">Sign In</a></li>
                <li class="topbar"><a class="topbar" href="php/register.php">Register</a></li>';
    }
    $topbar.='</ul>';
    return $topbar;
}

function do_searchbar()
{
    $searchbar='
            <input name="artefact_name" placeholder="Introdu denumire...">
            <a href="Cautare.php"><input name="commit" type="submit" value="Cauta"></a>';
    return $searchbar;
}
?>
