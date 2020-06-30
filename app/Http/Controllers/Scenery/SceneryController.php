<?php

namespace App\Http\Controllers\Scenery;

use App\Http\Controllers\Controller;

require_once base_path() . '/library/sparqllib.php';

class SceneryController extends Controller
{
    public function __construct()
    {

    }


    public function getInforScenery()
    {

        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "select distinct ?province_url ?province_name ?province_areatotal ?province_population ?province_infor ?province_lat ?province_long
                    where{ 
                    ?province_url rdf:type schema:Place.
                    ?province_url dbo:country dbr:Vietnam.
                    ?province_url dbp:subdivisionType dbr:Provinces_of_Vietnam.
                    ?province_url rdfs:label ?province_name.
                    ?province_url dbo:areaTotal ?province_areatotal.
                    ?province_url dbo:populationDensity ?province_population.
                    ?province_url dbo:abstract ?province_infor.
                    ?province_url geo:lat ?province_lat.
                    ?province_url geo:long ?province_long.
                    FILTER(!isLiteral(?province_name) || lang(?province_name) = \"\" || langMatches(lang(?province_name), \"EN\"))
                    FILTER(!isLiteral(?province_url) || lang(?province_url) = \"\" || langMatches(lang(?province_url), \"EN\"))
                    FILTER(!isLiteral(?province_infor) || lang(?province_infor) = \"\" || langMatches(lang(?province_infor), \"EN\"))
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
