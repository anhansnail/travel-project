<?php


require_once 'E:\Xampp\htdocs\last_project\vendor\autoload.php';

use GraphAware\Neo4j\Client\ClientBuilder;

//require_once __DIR__ .'/vendor/autoload.php';

$client = \GraphAware\Neo4j\Client\ClientBuilder::create()
    ->addConnection('default', 'bolt://neo4j:password@localhost:7687')
    ->build();

//$query = 'MATCH (user:User {name:"john"})
//CREATE (friend:User {name:"Judith"})
//MERGE (user)-[r:FRIEND]->(friend)
//RETURN user, friend, r';

//$result = $client->sendCypherQuery($query)->getResult();

//$john = $result->get('user');
//$judith = $result->get('judith');

// What john has for relationships
//
//print_r($john->getRelationships()); // returns relationships objects
//
//// Get a node connected to john
//
//print_r($john->getConnectedNode());
$result = $client->run('MATCH (n:Person) RETURN n');
$records = $result->records();
dd($records);