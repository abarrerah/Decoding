<?php

require("/var/www/html/decrypt/helpers/CsvHelper.php");

class DefaultController extends Controller {
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        
        $csvHelper = new CsvHelper();
        $csv = array_map('str_getcsv', file(__DIR__ . "./../manipulated.csv"));
        $result = $csvHelper->getDecodedInfo($csv);
        $resultCsv = $csvHelper->addResultToCsv($csv, $result);
        $this->render->view('index', $resultCsv);
        
    }
}