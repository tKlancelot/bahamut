<?php

class Message
{

    private $id; 
    private $pseudo; 
    private $content; 
    private $datePost; 

    public function __construct($id = null,$pseudo,$content,$datePost)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->content = $content;
        $this->datePost = $datePost;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of datePost
     */ 
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * Set the value of datePost
     *
     * @return  self
     */ 
    public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }
}

?>