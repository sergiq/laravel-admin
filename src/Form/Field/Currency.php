<?php

namespace Encore\Admin\Form\Field;

use Encore\Admin\Form\Field;

class Currency extends Field
{
    protected $symbol = '$';

    public function symbol($symbol)
    {
        $this->symbol = $symbol;

        return $this;
    }

    public function prepare($value)
    {
        return (float) str_replace(',', '', $value);
    }

    public function render()
    {
        $this->script = <<<EOT

$('#{$this->id}').inputmask("currency", {radixPoint: '.', prefix:''})

EOT;

        return parent::render()->with(['symbol' => $this->symbol]);
    }
}
