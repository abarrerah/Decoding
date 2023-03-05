<?php


class DefaultController extends Controller {
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        
        $csv = array_map('str_getcsv', file(__DIR__ . "./../manipulated.csv"));
        $result = $this->getDecodedInfo($csv);
        $resultCsv = $this->addResultToCsv($csv, $result);
        $this->render->view('index', $resultCsv);
        
    }

    public function addResultToCsv(array $csv, array $result) 
    {
        $resultCsv = [];
        foreach($csv as $index => $csvRow) {
            if ($index != 0) {
                $csvRow[] = $result[$index];
            } else {
                $csvRow[] = "Resultado Cálculo";
            }
            $resultCsv[] = $csvRow;
        }

        return $resultCsv;
    }

    public function getDecodedInfo(array $csvContent)
    {
        $result = [];
        $headers = false;
        foreach($csvContent as $csvRow) {
            if (!$headers) {
                $result[] = $csvRow;
                $headers = true;
                continue;
            } else {
                $result[] = $this->decodeCsvRow($csvRow);
            }
        }

        return $result;
    }

    protected function decodeCsvRow(array $row)
    {
        $result = [];
        foreach($row as $index => $rowContent){
            if ($index === 0) {
                continue;
            } else {
                if ($index === 1) {
                    $secondColumn = str_split($rowContent);
                } else {
                    $thirdColumn = str_split($rowContent);
					$secondColumnLength = count($secondColumn);
					$countThirdColumnLength = 1;
					$rowCalc = 0;
					foreach($thirdColumn as $thirdColumnContent) {
						$letterFound = array_search($thirdColumnContent, $secondColumn);
						$inverseArrayPosition = count($thirdColumn) - $countThirdColumnLength;
						$calc = $letterFound * pow($secondColumnLength, $inverseArrayPosition);
						$rowCalc += $calc;
						$countThirdColumnLength++;
					}
                    $result[] = $rowCalc;
                }
            }
        }
        return $result;
    }
}