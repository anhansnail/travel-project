<?php

namespace App\Http\Controllers\Geographic;

use App\Http\Controllers\Controller;
use App\Person;
use GraphAware\Bolt\Protocol\V1\Session;
use Illuminate\Console\Command;

require_once base_path() . '/library/sparqllib.php';

class DistrictController extends Controller
{    public $client;

    protected $signature = 'district_vn';

    public function __construct(Session $client)
    {
        $this->client = $client;

    }

    public function getAnyThingByName()
    {
        $name = "";
        $name = "Bắc Ninh";
        $endPoint =  config('constants.END_POINT') ;
        $query_1 = "select distinct ?a where {?a rdfs:label \"" . $name . "\"@en }                   ";
//        dd($query_1);
        $data = sparql_get($endPoint, $query_1);
        dd($data);
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

    public function getInforDistrict()
    {
        $endPoint = "http://dbpedia.org/sparql";
        $query_1 = "PREFIX getit: <http://purl.org/linguistics/gold/>
                    select distinct ?district_url ?district_name ?province_url where {
                    ?district_url getit:hypernym dbr:District. 
                    ?district_url dbo:country dbr:Vietnam.
                    ?district_url rdfs:label ?district_name.
                    ?district_url dbo:isPartOf ?province_url.
                    FILTER regex(?province_url, \"province\", \"i\").
                    FILTER(!isLiteral(?district_name) || lang(?district_name) = \"\" || langMatches(lang(?district_name), \"EN\"))
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
        foreach ($data as $key=>$row) {
            $this->createDistrict($key, $row);
            print "<tr style='text-align: center'>";
            foreach ($data->fields() as $field) {
                print "<td  style='text-align: center'>$row[$field]</td>";
            }
            print "</tr>";
        }
        print "</table>";
    }

    public function createDistrict($key, $row)
    {
        // Insert into Eloquent and get ID
//        $id = Person::create(['name' => $name])->id;
        // Insert into neo4j and link to eloquent
        $create_node = 'CREATE (DISTRICT' . $key . ':DISTRICT {district_url	:"' . $row['district_url'] . '",district_name:"'. $row['district_name'] . '",province_url:"' . $row['province_url'] . '"})';
////        dd($create_node);
        $create_realation = 'MATCH (a:DISTRICT),(b:PROVINCE)
        WHERE b.province_url = "'.$row['province_url'].'"
        AND a.province_url = "'.$row['province_url'].'"
         CREATE (b)-[:BELONGTO]->(a)';
        $nodes = $this->client->run($create_node);
        $rel = $this->client->run($create_realation);
    }

}
