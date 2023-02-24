<?php
// import elastic search class

class ElasticController extends Controller {

    public function __construct()
    {
        $this->ESclient = $this->elastic();
    }
    public function index()
    {
        $response = $this->ESclient->get(['MovieTitle' => '2001']);
        // echo MovieTitle from response
        foreach ($response['hits']['hits'] as $hit) {
            echo $hit['_source']['MovieTitle'];
        }
        return $response;
    }

    // function for search
    public function search($query = [])
    {
        $response = $this->ESclient->get($query);
        // echo MovieTitle from response
        foreach ($response['hits']['hits'] as $hit) {
            echo $hit['_source']['MovieTitle'];
        }
        return $response;
    }
}