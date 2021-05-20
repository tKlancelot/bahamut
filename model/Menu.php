<?php


class Menu
{

    private $params;


    public function startMenu($class)
    {
        echo "<div class=".$class."><ul>";
    }
    
    
    public function createLi($content)
    {
        echo "<li>".$content."</li>";
    }

    public function createLinkInLi($content)
    {
        $new_content = str_replace(' ', '', $content);
        echo "<li><a href='index.php?controller=default&action=".$new_content."'>$content</a></li>";
    }


    public function createButton($class,$content)
    {
        echo "<button class=".$class.">".$content."</button>";
    }
    
    public function endMenu()
    {
        echo "</ul></div>";
    }


}

?>