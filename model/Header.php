<?php


class Header
{

    private $title;
    private $subtitle;

    public function __construct($title,$subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public static function createLogo($class)
    {
        echo 
        "<div class=".$class.">
            <div class='myLogo'></div>
        </div>";
    }

    public function startHeader($class,bool $logo,bool $title,bool $menu)
    {
        echo "<header class='$class'>";
        $logo ? self::createLogo('logo') : null;
        $title ? $this->createTitle('zoneTitle') : null;
        if($menu):
        $menu = new Menu();
        $menu->startMenu('menu');
        $menuItems = ['intro','slideshow','course','testimonials','resume'];
        for ($i = 0; $i < count($menuItems); $i++):
        $menu->createLinkInLi($menuItems[$i]);
        endfor;
        $menu->endMenu();
        else:
        return null;
        endif;

    }
    

    public function createTitle($class)
    {
        echo "<h1 class=".$class.">".$this->getTitle()."&nbsp;<span>".$this->getSubtitle()."</span></h1>";
    }
    
    
    public function endHeader()
    {
        echo "</header>";
    }



    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }
}

?>