<?php
require_once '../vendor/autoload.php';
use Elastic\Elasticsearch\ClientBuilder;

class Elastic {
    private $client;
    private $index;
    private $type;
    private $host;
    private $port;
    private $username;
    private $password;

    public function __construct() {
        $this->index = 'movies';
        $this->host = 'localhost';
        $this->port = '9200';
        $this->username = 'george';
        $this->password = '123456';
        $this->client = ClientBuilder::create()
            ->setHosts([$this->host . ':' . $this->port])
            ->setBasicAuthentication($this->username, $this->password)
            ->build();
    }
    // return connection
    public function getClient() {
        return $this->client;
    }

    // search movie by title
    public function get($query = '') {
        $params = [
            'index' => $this->index,
            'type' => $this->type,
            'body' => [
                'query' => [
                    'match' => [
                        'MovieTitle' => $query,
                    ]
                ]
            ]
        ];
        $response = $this->client->search($params);
        return $response;
    }
}