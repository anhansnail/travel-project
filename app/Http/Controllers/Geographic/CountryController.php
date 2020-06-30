<?php

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Controller;

require_once base_path() . '/library/sparqllib.php';

class CountryController extends Controller
{
    public function __construct()
    {

    }

    public function getAnyThingByName()
    {
        $name = "";
        $name = "Bắc Ninh";
        $endPoint =  config('constants.END_POINT') ;
        $query_1 = "select distinct ?a where {?a rdfs:label \"" . $name . "\"@en }                   ";
//        dd($query_1);
        $data = sparql_get($endPoint, $query_1);
        if (!isset($data)) {
            print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
        }
//        dd($data);
        echo('<br>');
        print "<table class='example_table'>";
        print "<tr>";
        foreach ($data->fields() as $field) {
            print "<th>$field</th>";
        }
        print "</tr>";
        foreach ($data as $row) {
            print "<tr style='text-align: center'>";
            foreach ($data->fields() as $field) {
                print "<td  style='text-align: center'>$row[$field]</td>";
            }
            print "</tr>";
        }
        print "</table>";
    }

    public function getInforCountry()
    {
        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "PREFIX getit: <http://purl.org/linguistics/gold/>
                    select distinct ?url ?district ?province_url where {
                    ?url getit:hypernym dbr:District. 
                    ?url dbo:country dbr:Vietnam.
                    ?url rdfs:label ?district.
                    ?url dbo:isPartOf ?province_url.
                    FILTER regex(?province_url, \"province\", \"i\")
                    FILTER(!isLiteral(?district) || lang(?district) = \"\" || langMatches(lang(?district), \"EN\"))
                    }
                    ";

        $data = sparql_get($endPoint, $query_1);
        if (!isset($data)) {
            print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
        }
//dd($data);
//        echo( gettype(json_encode($data)));
        echo('<br>');
        print "<table class='example_table'>";
        print "<tr>";
        foreach ($data->fields() as $field) {
            print "<th>$field</th>";
        }
        print "</tr>";
        foreach ($data as $row) {
            print "<tr style='text-align: center'>";
            foreach ($data->fields() as $field) {
                print "<td  style='text-align: center'>$row[$field]</td>";
            }
            print "</tr>";
        }
        print "</table>";
    }

}
