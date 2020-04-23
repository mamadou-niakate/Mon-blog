<?php

namespace Core\HTML ;

class BootstrapForm extends Form
{

    /**
     * @param $html
     * @return string Le code HTML à entourer
     */
    protected function surround($html)
    {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name,$label,$options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text' ;
        $label = ' <label>'.$label.'</label>' ;

        if($type === "textarea")
        {
            $input = '<textarea name="' . $name . '" class="form-control">' .$this->getValue($name).'</textarea>';
        }else
        {
            $input = '<input type="'. $type .'" name="' . $name . '" value="'.$this->getValue($name).'" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    public function select($name,$label,$options)
    {
        $label = '<label>'.$label.'</label>' ;
        $input = '<select class="form-control" name="'.$name.'">' ;
            foreach ($options as $key => $value) 
            {
                $attributes = '' ;
                if($key == $this->getValue($name))
                {
                    $attributes = 'selected' ;
                }

                $input .= "<option value='$key' $attributes>$value</option>" ;
            }
        $input .= '</select>' ;

        return $this->surround($label . $input); ;
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyez</button>') ;
    }
}