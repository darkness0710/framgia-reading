<?php

namespace App\BsCollective;

use Collective\Html\FormBuilder;

class BsFormBuilder extends FormBuilder
{
    private $attributes = [];

    public function formItem($name, $attributes = [])
    {
        $labelText = data_get($attributes, 'label.0');
        $labelOptions = data_get($attributes, 'label.options', []);
        $labelOptions = array_add($labelOptions, 'class', 'control-label');
        $label = $this->label($name, $labelText, $labelOptions);

        $inputType = data_get($attributes, 'input.type', 'text');
        $inputValue = data_get($attributes, 'input.value');
        $inputOptions = data_get($attributes, 'input.options', []);
        $inputOptions = array_add($inputOptions, 'class', 'form-control');
        $input = $this->input($inputType, $name, $inputValue, $inputOptions);

        $errorId = data_get($attributes, 'error.id');
        $error = "<span class='error-block' id='$errorId'></span>";

        $divClass = data_get($attributes, 'div.class');
        $div = ($divClass == null) ? 'form-group col-md-18' : $divClass;

        $defaultTemplate = "<div class='{div}'> {label} {input} {error} </div>";
        $template = data_get($attributes, 'template', $defaultTemplate);
        
        $search = ['{div}', '{label}', '{input}', '{error}'];
        $replace = [$div, $label, $input, $error];
        $html = str_replace($search, $replace, $template);

        return $this->toHtmlString($html);
    }
}
