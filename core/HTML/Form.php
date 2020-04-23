<?php

namespace Core\HTML ;

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form
{

    /**
     * @var array  Données utilisées par le formulaire
     */
    protected $data;

    /**
     * @var string Tag utilisées par le formulaire
     */
    protected $surround = 'p';

    /**
     * Form constructor.
     * @param array $data contient les noms des champs du formulaire
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $html
     * @return string Le code HTML à entourer
     */
    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    /**
     * @param $index string index de la valeur à recupérer
     * @return mixed|null
     */
    protected function getValue($index)
    {
        if(is_object($this->data))
        {
            return $this->data->$index ;
        }
        return isset($this->data[$index]) ? $this->data[$index] : null ;
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name,$labl,$options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text' ;
        return $this->surround(
            '<input type="'.$type .'" name="' . $name . '" value="'.$this->getValue($name).'">'
        );
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit">Envoyez</button>') ;
    }

    /**
     * @param string $surround
     * Mettre à jour la balise <<Tag>> à utiliser pour entourer du HTML
     */
    public function setSurround($surround)
    {
        $this->surround = $surround;
    }
}
