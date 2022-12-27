<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Movie extends Eloquent
{

    protected $primaryKey = 'MovieID';
    public $movieID;
    public $genreID;
    public $DirectorID;
    public $timestamps = [];
    protected $fillable = ['MovieID', 'GenreID', 'DirectorID'];
    protected $table = 'movies';

    public function insert($detailsID, $genreID, $directorID)
    {
        $new = movie::create(
            [
                'MovieID' => $detailsID,
                'GenreID' => $genreID,
                'DirectorID' => $directorID,
            ]
        );
    }

    public function moviedetails()
    {
        return $this->hasOne(moviedetail::class, 'MovieID', 'MovieID');
    }

    public function get($movieID)
    {

        $result = $this->join('directors', 'directors.DirectorID', '=', 'movies.DirectorID')
            ->join(
                'moviedetails',
                'moviedetails.MovieID',
                '=',
                'movies.MovieID'
            )
            ->join(
                'genres',
                'genres.GenreID',
                '=',
                'movies.GenreID'
            )
            ->where(
                'movies.MovieID',
                '=',
                $movieID
            )
            ->get(
            );


        return $result;
    }
    // $this->hasOne('Model', 'foreign_key', 'local_key');

    // public function getMovies()
    // {
    //     $movie = $this->join(
    //             'moviedetails',
    //             'moviedetails.MovieID',
    //             '=',
    //             'movies.MovieID'
    //         )
    //         ->join(
    //             'directors',
    //             'directors.DirectorID',
    //             '=',
    //             'movies.DirectorID'
    //         )
    //         ->join(
    //             'genres',
    //             'genres.GenreID',
    //             '=',
    //             'movies.GenreID'
    //         )
    //         ->get(
    //         );
    //     return $movie;
    // }

    public function countMovies()
    {
        $movie = $this->join(
                'moviedetails',
                'moviedetails.MovieID',
                '=',
                'movies.MovieID'
            )
            ->join(
                'directors',
                'directors.DirectorID',
                '=',
                'movies.DirectorID'
            )
            ->join(
                'genres',
                'genres.GenreID',
                '=',
                'movies.GenreID'
            )
            ->get();
        return $movie;
    }

    public function getMovies($left=0,$right=10)
    {
        $movie = $this->join(
                'moviedetails',
                'moviedetails.MovieID',
                '=',
                'movies.MovieID'
            )
            ->join(
                'directors',
                'directors.DirectorID',
                '=',
                'movies.DirectorID'
            )
            ->join(
                'genres',
                'genres.GenreID',
                '=',
                'movies.GenreID'
            )
            ->skip($left)->take($right)
            ->get(
            );
        return $movie;
    }
}

?>