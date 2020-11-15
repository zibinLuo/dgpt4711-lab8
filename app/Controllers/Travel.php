<?php
 namespace App\Controllers;
 class Travel extends BaseController
 {
 public function index()
 {
     // connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $records = $places->findAll();
 // get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
 return $parser->setData(['records' => $records])
 // and have it render the template with those
 ->render('placeslist');
 
 $table = new \CodeIgniter\View\Table();
 
$headings = $places->fields;
$displayHeadings = array_slice($headings, 1, 2);
$table->setHeading(array_map('ucfirst', $displayHeadings));

foreach ($records as $record) {
$table->addRow($record->name,$record->description);


}
 return $table->generate();
 }
 public function showme($id)
 {
     // connect to the model
 $places = new \App\Models\Places();
 // retrieve all the records
 $record = $places->find($id);
 
 // get a template parser
 $parser = \Config\Services::parser();
 // tell it about the substitions
 return $parser->setData($record)
 // and have it render the template with those
 ->render('oneplace');
 }
 }