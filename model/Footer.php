<?php

class Footer extends Main{

    public function startFooter($class, $menu,$copyright,$copyMessage)
    {
        echo "<footer class='$class'>";
        if($menu):
            $menu = new Menu();
            $menu->startMenu('menu-footer');
            $menuItems = ['contact','pedagogy','legal notice'];
            for ($i = 0; $i < count($menuItems); $i++):
            $menu->createLinkInLi($menuItems[$i]);
            endfor;
            $menu->endMenu();
            else:
            return null;
        endif;
        echo $copyright ? $this->copyRight($copyMessage,"copyright") : null;
    }

    public function copyRight($msg,$class)
    {
        return
        "<div class='$class'><p>$msg</p></div>";
    }

    public function endFooter()
    {
        echo "</footer>";
    }

    


}