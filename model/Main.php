<?php


class Main
{

    public function startFrame($class)
    {
        echo "<main class='$class'>";
    }

    public function startSection($class,$id = null,$attr = null)
    {
        echo "<section id='$id' class='$class' $attr>";
    }

    public function startDiv($class,$id = null,$attr = null)
    {
        echo "<div id='$id' class='$class' $attr>";
    }

    public function endDiv()
    {
        echo "</div>";
    }

    public function endSection()
    {
        echo "</section>";
    }


    public function endFrame()
    {
        echo "</main>";
    }
    
}