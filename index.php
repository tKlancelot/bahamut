<?php

require ('include.php');


if(empty($_GET))
{
    $_GET['controller'] = "default";
    $_GET['action'] = "intro";
}

switch($_GET)
{
    case $_GET['controller'] == "default" && $_GET['action'] == "intro":
        $controller = new DefaultController();
        $controller->homepage();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "slideshow":
        $controller = new DefaultController();
        $controller->diapo();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "course":
        $controller = new DefaultController();
        $controller->course();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "testimonials":
        $controller = new DefaultController();
        $controller->testimonials();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "resume":
        $controller = new DefaultController();
        $controller->cv();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "contact":
        $controller = new DefaultController();
        $controller->contact();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "pedagogy":
        $controller = new DefaultController();
        $controller->pedagogy();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "legalnotice":
        $controller = new DefaultController();
        $controller->legalNotice();
        break;   
}

?>


