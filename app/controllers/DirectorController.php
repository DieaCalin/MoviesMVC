<?php

use Carbon\Carbon;

class DirectorController extends Controller
{
    public function __construct()
    {
        $directorsPerPage = 100;
        $this->directorsPerPage = 15;
        $this->directors = $this->model('Directors');
        $this->utils = new Utils();
        $this->requestBody = jsonify_reponse(file_get_contents('php://input'));
    }

    public function index()
    {

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $directorID = $_GET['id'];
                $directorData = jsonify_reponse($this->directors->getAll($directorID));
                return $this->view('/templates/DirectorView', $data = $directorData);
            } else {
                $list = jsonify_reponse($this->directors->countDirectors());
                $allDirectors = count($list);
                $totalPages = ceil( $allDirectors / $this->directorsPerPage);
                $this->makeProductPager($allDirectors, $totalPages);
                $pagination = $this->utils->drawPager($allDirectors,$this->directorsPerPage);
                $this->pageData['pagination'] = $pagination;
                if(!isset($_GET['page'])){
                    $pageNumber = 1;
                } else {
                    $pageNumber = intval($_GET['page']);
                }
                $leftLimit = $this->directorsPerPage * ($pageNumber-1); // 5* (2-1) = 6
                $rightLimit = $this->directorsPerPage; // 5 -> (6,7,8,9,10)
                $movieData = jsonify_reponse($this->directors->getDirectors($leftLimit, $rightLimit));
                $movieData['pagination'] = [ 'page' => $pageNumber, 'pagination_body' => $pagination];
                return $this->view('show.directors', $data = $movieData);
            }
        }
    }

    public function makeProductPager($allProducts, $totalPages) {
        if(!isset($_GET['page']) || intval($_GET['page']) == 0 || intval($_GET['page']) == 1 || intval($_GET['page']) < 0) {
            $pageNumber = 1;
            $leftLimit = 0;
            $rightLimit = $this->directorsPerPage; // 0-5
        } elseif (intval($_GET['page']) > $totalPages || intval($_GET['page']) == $totalPages) {
            $pageNumber = $totalPages; // 2
            $leftLimit = $this->directorsPerPage * ($pageNumber - 1); // 5 * (2-1) = 6
            $rightLimit = $allProducts; // 8
        } else {
            $pageNumber = intval($_GET['page']);
            $leftLimit = $this->directorsPerPage * ($pageNumber-1); // 5* (2-1) = 6
            $rightLimit = $this->directorsPerPage; // 5 -> (6,7,8,9,10)
        }
        $this->pageData['productsOnPage'] = $this->directors->getDirectors($leftLimit, $rightLimit);
    }

    public function list()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->directors->insert_details(
                $_GET['id'],
                $_POST['birthday'],
                $_POST['deathday'],
                $_POST['biography'],
                $_POST['color'],
                ''
            );
            if (isset($_GET['id'])) {
                $directorID = $_GET['id'];
                $directorData = jsonify_reponse($this->directors->get($directorID));
                return $this->view('/templates/DirectorView', $data = $directorData);
            } else {
                $movieData = jsonify_reponse($this->directors->get(null));
                return $this->view('show.directors', $data = $movieData);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $directorID = $_GET['id'];
                $directorData = jsonify_reponse($this->directors->getAll($directorID));
                return $this->view('/templates/DirectorView', $data = $directorData);
            } else {
                $movieData = jsonify_reponse($this->directors->get(null));
                return $this->view('show.directors', $data = $movieData);
            }
        }

    }

    public function find()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->directors->insert_details(
                $_GET['id'],
                $_POST['birthday'],
                $_POST['deathday'],
                $_POST['biography'],
                $_POST['color'],
                ''
            );
            if (isset($_GET['id'])) {
                $directorID = $_GET['id'];
                $directorData = jsonify_reponse($this->directors->get($directorID));
                return $this->view('/templates/DirectorView', $data = $directorData);
            } else {
                $movieData = jsonify_reponse($this->directors->get(null));
                return $this->view('show.directors', $data = $movieData);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['id'])) {
                $directorID = $_GET['id'];
                $directorData = jsonify_reponse($this->directors->getAll($directorID));
                if ($directorData) {
                    return $this->view('/templates/DirectorView', $data = $directorData);
                } else {
                    return $this->view('/templates/DirectorView', $data = null);
                }
            } else {
                $movieData = jsonify_reponse($this->directors->get(null));
                return $this->view('show.directors', $data = $movieData);
            }
        }
    }
}