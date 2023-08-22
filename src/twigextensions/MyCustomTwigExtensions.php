<?php

namespace App\twigextensions;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MyCustomTwigExtensions extends AbstractExtension
{

     public function getFilters() {


        return [ new TwigFilter('defaultImage' ,[$this , 'defaultImage' ] )] ;
     }

     public function defaultImage(string $path) { 

           if(strlen(trim($path)) == 0){  

            return 'hed.jpg' ; 


           }

          return $path ; 

     }

}