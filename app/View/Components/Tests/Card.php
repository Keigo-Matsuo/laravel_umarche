<?php

namespace App\View\Components\Tests;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $content;
    public $message;

    public function __construct($title, $content = '本文初期値です。', $message = '初期値です。')
    {
        $this->title = $title;
        $this->content = $content;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.tests.card');
    }
}
