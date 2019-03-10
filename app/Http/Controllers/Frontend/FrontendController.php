<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /** @var string  */
    protected $_frontendpath = 'frontend.'; //frontend.->frontend file directory
    /** @var string|null  */
    protected $_pagepath = null;
    /**  */
    public function __construct()
    {
        $this->data('title', $this->makeTitle('home')); //if one doesn't wants to put any title then by default home
        $this->_pagepath = $this->_frontendpath.'pages.'; //pages.->pages file directory
    }
}
