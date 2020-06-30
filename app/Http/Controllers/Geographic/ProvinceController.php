<?php

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Controller;
use GraphAware\Bolt\Protocol\V1\Session;

require_once base_path() . '/library/sparqllib.php';

class ProvinceController extends Controller
{
    //để dùng lệnh php artisan province_vn debug for command


    public $client;
    public $url_country = "http://dbpedia.org/page/Vietnam";

    public function __construct(Session $client)
    {
        $this->client = $client;

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

    public function getProvince()
    {

        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "PREFIX getit: <http://purl.org/linguistics/gold/>
                        select distinct ?province_url ?province_name ?country_url where {
                      ?province_url rdf:type schema:Place.
                    ?province_url dbo:country dbr:Vietnam.
                    ?province_url getit:hypernym dbr:Province.
                    ?province_url dbo:country ?country_url.
                    ?province_url dbp:type dbr:Provinces_of_Vietnam. ?province_url  rdfs:label ?province_name.
                    FILTER(!isLiteral(?province_name) || lang(?province_name) = \"\" || langMatches(lang(?province_name), \"EN\"))
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
        foreach ($data as $key => $row) {
//            create node province
            $this->createProvince($key, $row);
            print "<tr style='text-align: center'>";
            foreach ($data->fields() as $field) {
                print "<td  style='text-align: center'>$row[$field]</td>";
            }
            print "</tr>";
        }
        $create_reala = $this->client->run('MATCH (a:COUNTRY),(b:PROVINCE) 
    CREATE (b)-[:BELONGTO]->(a)');
        print "</table>";

        foreach ($data as $row) {

        }
    }

    public function createProvince($key, $row)
    {
        // Insert into Eloquent and get ID
//        $id = Person::create(['name' => $name])->id;
        // Insert into neo4j and link to eloquent
        $create_node = "CREATE (province" . $key . ":PROVINCE {province_url:'" . $row['province_url'] . "',province_name:'" . $row['province_name'] . "',country_url:'" . $row['country_url'] . "'})";
//        $create_realation = "MATCH (a:COUNTRY),(b:PROVINCE)
//        WHERE b.country_url = 'http://dbpedia.org/page/Vietnam'
//        AND a.country_url = 'http://dbpedia.org/page/Vietnam'
//         CREATE (b)-[r:BELONGTO]->(a)";
        $nodes = $this->client->run($create_node);
//        $rel = $this->client->run($create_realation);
    }

    public function getInforProvince()
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
