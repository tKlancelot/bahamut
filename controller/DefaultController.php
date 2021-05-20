<?php 

class DefaultController
{
    
    public function homepage()
    { 
        require 'view/homepage.php';
    }

    public function diapo()
    { 
        require 'view/diapo.php';
    }

    public function course()
    { 
        require 'view/course.php';
    }

    public function testimonials()
    { 
        require 'view/testimonials.php';
    }

    public function cv()
    { 
        require 'view/cv.php';
    }

    public function contact()
    { 
        require 'view/contact.php';
    }

    public function pedagogy()
    { 
        require 'view/pedagogy.php';
    }

    public function legalNotice()
    { 
        require 'view/legalNotice.php';
    }


}