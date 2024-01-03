<?php


namespace App\Actions;


use Illuminate\Http\Request;
use Psr\Http\Message\RequestInterface;

interface ControllerBaseActionInterface
{
    public function handle();
}
