<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;

require_once base_path() . '/library/sparqllib.php';

class HistoryPersonController extends Controller
{
    public function __construct()
    {

    }

    public function getAnyThingByName()
    {
        $name = "";
        $name = "Bắc Ninh";
        $endPoint = "http://dbpedia.org/sparql";
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

    public function getInforProvince()
    {

        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "select distinct ?province_url ?province_name  
                    where{ 
                    ?province_url rdf:type schema:Place.
                    ?province_url dbo:country dbr:Vietnam.
                    ?province_url dbp:subdivisionType dbr:Provinces_of_Vietnam.
                    ?province_url rdfs:label ?province_name.
                    FILTER(!isLiteral(?province_name) || lang(?province_name) = \"\" || langMatches(lang(?province_name), \"EN\"))
                    FILTER(!isLiteral(?province_url) || lang(?province_url) = \"\" || langMatches(lang(?province_url), \"EN\"))
                    }
                    ";
//        LIMIT 100
//        ?content
//        ?url dbo:abstract ?content.

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
