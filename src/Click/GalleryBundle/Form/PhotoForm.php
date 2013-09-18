<?php

namespace Click\GalleryBundle\Form;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\TextField;
use Symfony\Component\Form\FileField;

class PhotoForm extends Form {
    
    protected function configure()
    {
        
        $this->add(new TextField('name', array(
            'max_length' => 100,
        )));
        
        $this->add(new FileField('photo', array('secret' => 'secret')));
    }


}