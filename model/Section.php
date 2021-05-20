<?php


class Section extends Main
{

    private $titreSection;

    public function createSectionTitle($class, $content)
    {
        echo "<h3 class='$class'>$content</h3>";
    }

    public function startSectionFrame($class, $height, $legend, $source = null, $content = null)
    {
        echo "<div class='$class' style='height:$height'>";
        $this->createLegend($legend);
        isset($source) ? $this->createImage($source) : null;
        isset($content) ? $this->createPara($content) : null;
    }

    public function createLegend($legend)
    {
        echo "<h4>$legend</h4>";
    }

    public function createImageLink(string $source, string $href, $class, string $content = null,string $attr = null)
    {
        echo "<a class='$class' href='$href' style='background-image:url($source)' download='$attr'>$content</a>";
    }
    // "background-image:url(./assets/pictos/image-21.svg)"
    public function createImage($source)
    {
        echo '<div class="picto" style="background-image:url(./assets/pictos/' . $source . ')"></div>';
    }

    public function endSectionFrame()
    {
        echo "</div>";
    }

    public function startDiv($class, $id = null)
    {
        echo "<div class='$class' id='$id'>";
    }

    public function createTitle($content, $class)
    {
        echo "<h4 class='$class'>$content</h4>";
    }

    public function createPara($content, $class = null)
    {
        echo '<p class=' . $class . '>' . $content . '</p>';
    }

    public function createImg($src, $alt = null, $class = null)
    {
        echo '<img src=' . $src . ' class=' . $class . ' alt=' . $alt . '>';
    }

    public function createCarousel($index1, $index2, $array)
    {
        $this->startDiv(isset($_SESSION['class-frames']) ? $_SESSION['class-frames'] . 'pict shadowed classy' : 'pict shadowed');
        $this->startDiv("logo2");
        $this->createImg(CHEMIN2 . $array[$index1][$index2]['source'], null, '');
        $this->endSectionFrame();
        $this->startDiv('content');
        $this->startDiv('paraContent');
        $this->createSectionTitle('heading3 white', $array[$index1][$index2]['title']);
        isset($array[$index1][$index2]['currently-learning']) ? $this->createPara("<i style='color:red'>currently learning</i>") : null;
        $this->createPara($array[$index1][$index2]['content'], "");
        $this->endSectionFrame();
        $this->endSectionFrame();
        $this->endSectionFrame();
    }


    public function createCourseCarousel($array, $index)
    {
        $this->startDiv('pict shadowed');
        $this->startDiv('logo2');
        $this->createImg(CHEMIN . $array[$index]['source'], null, '');
        $this->endSectionFrame();
        $this->startDiv(isset($_SESSION['class-panel']) ? $_SESSION['class-panel'] . ' classy content' : 'classy content');
        $this->startDiv('paraContent');
        $this->createSectionTitle('heading3 white', $array[$index]['title']);
        $this->createPara($array[$index]['content']);
        $this->createPara($array[$index]['content2']);
        $this->endSectionFrame();
        $this->endSectionFrame();
        $this->endSectionFrame();
    }

    /**
     * Get the value of titreSection
     */
    public function getTitreSection()
    {
        return $this->titreSection;
    }

    /**
     * Set the value of titreSection
     *
     * @return  self
     */
    public function setTitreSection($titreSection)
    {
        $this->titreSection = $titreSection;

        return $this;
    }
}
