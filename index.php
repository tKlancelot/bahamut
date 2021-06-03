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
    case $_GET['controller'] == "default" && $_GET['action'] == "vignettes":
        $controller = new DefaultController();
        $controller->diapo();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "parcours":
        $controller = new DefaultController();
        $controller->course();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "skills":
        $controller = new DefaultController();
        $controller->skills();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "projets":
        $controller = new DefaultController();
        $controller->projets();
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
    case $_GET['controller'] == "default" && $_GET['action'] == "themeOn":
        $controller = new DefaultController();
        $controller->themeOn();
        break;   
    case $_GET['controller'] == "default" && $_GET['action'] == "themeOut":
        $controller = new DefaultController();
        $controller->themeOut();
        break;   
    case $_GET['controller'] == "message" && $_GET['action'] == "addMessage":
        $controller = new DefaultController();
        $controller->addMessage();
        break;   
    case $_GET['controller'] == "message" && $_GET['action'] == "addMessageDesktop":
        $controller = new DefaultController();
        $controller->addMessageDesktop();
        break;   
    case $_GET['controller'] == "projets" && $_GET['action'] == "planete3d":
        $controller = new ProjectController();
        $controller->planet3d();
        break;   
    case $_GET['controller'] == "projets" && $_GET['action'] == "carteVisite":
        $controller = new ProjectController();
        $controller->carteVisite();
        break;   
    case $_GET['controller'] == "projets" && $_GET['action'] == "couch3d":
        $controller = new ProjectController();
        $controller->couch3d();
        break;   
}




?>


