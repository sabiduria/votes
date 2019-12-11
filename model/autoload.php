<?php
/**
 * Created by PhpStorm.
 * User: Sabiduria
 * Date: 12/11/2019
 * Time: 10:28 AM
 */

function autoload($class){
    require dirname(__FILE__)."\\".$class.".php";
}

spl_autoload_register('autoload');