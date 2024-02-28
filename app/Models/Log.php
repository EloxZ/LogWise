<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Log extends Model {
   protected $connection = 'mongodb';
   // protected $collection = 'log_posts';

   public function toString() {
        $timestampString = ($this->timestamp)? '['.$this->timestamp.'] ' : '';
        $labelString = ($this->label)? '['.strtoupper($this->label).'] ' : '[LOG] ';
        $senderString = ($this->sender)? '['.$this->sender.'] ' : '[Anonymous] ';
        $contextString = ($this->context)? '['.$this->context.'] ' : '';
        $messageString = "- ".$this->message;

        return $timestampString.$labelString.$senderString.$contextString.$messageString;
   }
}
