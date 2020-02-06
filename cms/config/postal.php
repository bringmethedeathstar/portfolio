<?php

return [
  'fields' => [ 'name', 'email', 'message' ],

  'rules' => [[['email', 'name', 'message'], 'required']],

  'to' => 'leahwalker95@hotmail.com',

  'debug' => false,

  'replyTo' => function($letter) {
    return [$letter['email'] => $letter['name']];
  },

  'subject' => 'Enquiry from {letter.name}'
];