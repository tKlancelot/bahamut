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

    public function skills()
    { 
        require 'view/skills.php';
    }

    public function projets()
    { 
        require 'view/projets.php';
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
    
    public function themeOn()
    { 
        require 'view/themeOn.php';
    }

    public function themeOut()
    { 
        require 'view/themeOut.php';
    }

    public function addMessage()
    { 
        //gerer la validation du post
        $this->validateForm('mobile');

    }
    public function addMessageDesktop()
    { 
        //gerer la validation du post
        $this->validateForm("bureau");
    }


    public function validateForm($device)
    {
        // dump($device);
        // die();

        $errors = [];
        if(!empty($_POST['pseudo']))
        {
            $pseudo = htmlentities($_POST['pseudo']);
            if(strlen($pseudo) > 3)
            {
                if(strlen($pseudo < 30))
                {
                    if(!empty($_POST['content']))
                    {
                        $content = nl2br(htmlentities($_POST['content']));
                        if(strlen($content) > 4)
                        {
                            if(strlen($content) < 300)
                            {
                                if(count($errors) == 0)
                                {
                                    $message = new Message(null,$pseudo,$content,null);
                                    $messageManager = new MessageManager();
                                    $messageManager->insertMessage($message);
                                    $errors[] = "votre message a correctement envoyé";
                                    ($device === "bureau")? require('view/contact.php'):require('view/homepage.php');
                                    return $errors;
                                }
                                else
                                {
                                    ($device === "bureau")? require('view/contact.php'):require('view/homepage.php');
                                    // dump("errors");
                                    return $errors;
                                }
                            }
                            else{
                                $errors[] = "ce message est trop long";
                            }
                        }
                        else{
                            $errors[] = "ce message est trop court";
                        }
                    }
                    else{
                        $errors[] = "merci de remplir le champs message";
                    }
                }
                else{
                    $errors[] = "pseudo trop long";
                }
            }
            else{
                $errors[] = "pseudo trop court";
            }
        }
        else{
            $errors[] = "veuillez renseigner un pseudo";
        }
        ($device === "bureau")? require('view/contact.php'):require('view/homepage.php');
        return $errors;
    }



}