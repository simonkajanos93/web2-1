<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Bemutatkozás',
            'description' => ''
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
    }

    public function mnb()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $currency_from = $_POST['from'];
            $currency_to = $_POST['to'];
            $isMonthly = isset($_POST['month']);
            $currency = '';

            if (!$isMonthly) {
                $a = $this->mnbHelper(false);
                $currency = "1 "
                    . $currency_from . " = "
                    . round((int)$a[$currency_from] / (int)$a[$currency_to], 4)
                    . " "
                    . $currency_to;
            } else {
                $t = $this->mnbHelper(true);
            }

            $data = [
                'curr_from' => $currency_from,
                'curr_to' => $_POST['to'],
                'date_value' => $_POST['startdate'],
                'price' => $currency
            ];


        } else {
            $data = [
                'curr_from' => 'EUR',
                'curr_to' => 'USD',
                'date_value' => date("Y-m-d")
            ];
        }

        $this->view('pages/mnb', $data);
    }

    public function error()
    {
        $data = [
            'title' => 'Hiba',
            'description' => 'Ilyen oldal nem található'
        ];

        $this->view('pages/404', $data);
    }

    private function mnbHelper($isMonthly) {
        $months = array(
            'JAN' => array('2021-01-01', '2021-01-31'),
            'FEB' => array('2021-02-01', '2021-02-28'),
            'MAR' => array('2021-03-01', '2021-03-31'),
        );
        $start = $isMonthly ? $months[$_POST['month']][0] : $_POST['startdate'];
        $end = $isMonthly ? $months[$_POST['month']][1] : $_POST['startdate'];
        $objClient = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL", array('trace' => true));
        $currrates = $objClient
            ->GetExchangeRates(array('startDate' => $start, 'endDate' => $end, 'currencyNames' => "EUR,USD"))
            ->GetExchangeRatesResult;
        $dom_root = new DOMDocument();
        $dom_root->loadXML($currrates);
        $t = array();

        $searchNode = $dom_root->getElementsByTagName("Day");
        $a = array("HUF"=>"1");

        foreach( $searchNode as $searchNode ) {
            $date = $searchNode->getAttribute('date');
            $rates = $searchNode->getElementsByTagName( "Rate" );
            foreach( $rates as $rate ) {
                $a[$rate->getAttribute('curr')] = $rate->nodeValue;
            }
            $t[$date] = $a;
        }
        //var_dump($t);
        return $isMonthly ? $t : $a;
    }
}