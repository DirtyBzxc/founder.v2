<?php
namespace App\helpers;

class Helper
{
protected $rightContact;

 public static function contact($contact)
 {
   $contact = request()->input('contact');

    if(!str_starts_with($contact,'https:'))
    {
      $rightContact = 'https:'.$contact;
    }
    else
    {
      $rightContact = $contact;
    }

   return $rightContact;
 }
}