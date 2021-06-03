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

    public function createImageLink(string $source = null, string $href, $class, string $content = null,string $attr = null)
    {
        echo "<a class='$class' href='$href' style='background-image:url($source)' download='$attr' target='_blank'>$content</a>";
    }
    // "background-image:url(./assets/pictos/image-21.svg)"
    public function createImage($source)
    {
        echo '<div class="picto" style="background-image:url(./assets/pictos/' . $source . ')"></div>';
    }

    public function createTitle($content, $class,$id=null)
    {
        echo "<h4 class='$class' id='$id'>$content</h4>";
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
        $this->startDiv('pict shadowed classy');
        $this->startDiv("logo2");
        $this->createImg(CHEMIN2 . $array[$index1][$index2]['source'], null, '');
        $this->endDiv();
        $this->startDiv('content white');
        $this->startDiv('paraContent');
        $this->createSectionTitle('heading3', $array[$index1][$index2]['title']);
        isset($array[$index1][$index2]['currently-learning']) ? $this->createPara("<i style='color:red'>en cours d'apprentissage</i>") : null;
        $this->createPara($array[$index1][$index2]['content'], "");
        $this->endDiv();
        $this->endDiv();
        $this->endDiv();
    }

    public function createCourseCarousel($array, $index,bool $content2, bool $categ)
    {
        $this->startDiv('pict');
            $this->startDiv('logo2');
                $this->createImg(CHEMIN.$array[$index]['source'], null, '');
            $this->endDiv();
            $this->startDiv('classy content');
                $this->startDiv('paraContent white');
                    $this->createSectionTitle('heading3', $array[$index]['title']);
                    $this->createPara($array[$index]['content'],'');
                    if($content2 == true){
                        $this->createPara($array[$index]['content2'],'');
                    }
                    if($categ == true){
                        $this->createPara($array[$index]['categ'],'');
                    }


                $this->endDiv();
            $this->endDiv();
        $this->endDiv();
    }

    public function createThumbnailsCarousel($array, $index, $index2)
    {
        $this->startDiv('pict');
            $this->startDiv('logo2');
                $src = $array[$index][$index2]['source'];
                $this->startSectionFrame('frame30','24vh','',$src);
                
                $this->endDiv();
            $this->endDiv();
            $this->startDiv('classy content white');
                $this->startDiv('legend');
                    $this->createSectionTitle('heading3', $array[$index][$index2]['title']);
                $this->endDiv();
            $this->endDiv();
        $this->endDiv();
    }

    public function createLi($content)
    {
        echo "<li>$content</li>";
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
