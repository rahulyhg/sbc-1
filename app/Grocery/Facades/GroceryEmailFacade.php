<?php
namespace App\Grocery\Facades;
use Illuminate\Support\Facades\Facade;
class GroceryEmailFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'groceryemailclass';
    }
}