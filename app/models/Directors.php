<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Directors extends Eloquent
{
    public $movieID;
    public $DirectorID;
    public $DirectorName;
    public $timestamps = [];
    protected $fillable = ['DirectorID', 'DirectorName'];
    protected $table = 'directors';

    public function insert($directorName)
    {
        $existent_director = Directors::where('DirectorName', '=', $directorName)->first();
        if ($existent_director !== null) {
            $existent_director;
            return Directors::where('DirectorName', '=', $directorName)->pluck('directorID')->toArray()[0];
        } else {
            $new = Directors::create(
                [
                    'DirectorName' => $directorName,
                ]
            );
            $new->id;
            return $new->id;
        }
    }

    public function insert_details($directorID, $birthday, $deathday, $biography, $color, $image)
    {
        Directors::where('DirectorID', $directorID)->update(
            array(
                'birthday' => $birthday,
                'deathday' => $deathday,
                'biography' => $biography,
                'color' => $color,
                'image' => 'asdasd',
            )
        );
    }

    public function get($directorID)
    {
        if (!isset($directorID)) {
            return $this
            ->join(
                'movies',
                'directors.DirectorID',
                '=',
                'movies.DirectorID'
            )
            ->groupBy('directors.DirectorID')
            ->get();
        } else {
            $result = Directors::where('DirectorID', '=', $directorID)->first();
            return $result;
        }
    }

    public function countDirectors()
    {
        return $this
        ->join(
            'movies',
            'directors.DirectorID',
            '=',
            'movies.DirectorID'
        )
        ->distinct()
        ->groupBy('directors.DirectorID')
        ->get();
    }

    public function getDirectors($left,$right) {
        return $this->skip($left)->take($right)->get();
    }

    public function getall($directorID)
    {
        if (!isset($directorID)) {
            return $this->all();
        } else {
            // Join tables in a single Object.
            // Here I need movie details about all movies recorded by a director
            // I join Directors with Movies where I get ID of all movies and I get details by joining MovieDetails
            // To get just an object I use setAttribute()
            try {
                $result = Directors::where('DirectorID', '=', $directorID)
                    ->first(
                    )
                    ->join(
                        'movies',
                        'movies.DirectorID',
                        '=',
                        'directors.DirectorID'
                    )
                    ->join(
                        'moviedetails',
                        'moviedetails.MovieID',
                        '=',
                        'movies.MovieID'
                    )
                    ->where(
                        'movies.directorID',
                        '=',
                        $directorID
                    )
                    ->get()->first()
                    ->setAttribute(
                        'AllMovies', Directors::where('DirectorID', '=', $directorID)
                            ->first()
                            ->join(
                                'movies',
                                'movies.DirectorID',
                                '=',
                                'directors.DirectorID'
                            )
                            ->join(
                                'moviedetails',
                                'moviedetails.MovieID',
                                '=',
                                'movies.MovieID'
                            )
                            ->where(
                                'movies.directorID',
                                '=',
                                $directorID
                            )->get(
                            )->all(
                            )
                    );
                if (!$result) {
                    throw new Exception('Movie not found');
                }
            } catch (Exception $e) {
                return null;
            }
            return $result;
        }
    }
}

?>