<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{

    /** @var string  */
    protected $_backendpath = 'backend.'; //frontend.->frontend file directory
    /** @var string|null  */
    protected $_pagepath = null;
    /**  */
    public function __construct()
    {
        $this->data('title', $this->makeTitle('admin')); //if one doesn't wants to put any title then by default home
        $this->_pagepath = $this->_backendpath.'pages.'; //pages.->pages file directory
    }
}
