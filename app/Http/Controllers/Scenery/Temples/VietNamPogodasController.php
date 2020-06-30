<?php
//chùa ở việt nam
namespace App\Http\Controllers\Scenery\Temples;

use App\Http\Controllers\Controller;

require_once base_path() . '/library/sparqllib.php';

class VietNamPogodasController extends Controller
{
    public function __construct()
    {

    }


    public function getInforTemple()
    {

        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "PREFIX getit: <http://purl.org/linguistics/gold/>
                    select distinct ?url ?name ?province_url where {
                    ?url dct:subject dbc:Vietnamese_pagodas. 
                    ?url rdfs:label ?name.
                    ?url dct:subject ?province_url.
                    FILTER regex(?province_url, \"province\", \"i\")
                    FILTER(!isLiteral(?name) || lang(?name) = \"\" || langMatches(lang(?name), \"EN\"))
                    }
                    ";
        $data = sparql_get($endPoint, $query_1);
        if (!isset($data)) {
            print "<p>Error: " . sparql_errno() . ": " . sparql_error() . "</p>";
        }

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
