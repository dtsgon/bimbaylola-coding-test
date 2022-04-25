<?php

namespace App\Controller\Import;

use App\Entity\Movies;
use App\Entity\People;
use App\Entity\Genres;
use App\Repository\GenresRepository;
use App\Repository\MoviesRepository;
use App\Repository\PeopleRepository;
use App\Controller\Import\Helpers\CsvHelper as Helper;
use Doctrine\Persistence\ManagerRegistry;
use League\Csv\Reader;
use League\Csv\Statement;
use Symfony\Component\Validator\Constraints\TypeValidator;


class CsvController 
{
    public function execute ( ManagerRegistry $managerRegistry, $file ): bool
    {
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);

        $records = Statement::create()->process($csv);

        $arrayMovies    = [];
        $arrayGenres    = Helper::createArrayFromRecord ( $records, Genres::class, 'genre',    new TypeValidator, "setGenre" );
        $arrayActors    = Helper::createArrayFromRecord ( $records, People::class, 'actors',   new TypeValidator, "setName" );
        $arrayDirectors = Helper::createArrayFromRecord ( $records, People::class, 'director', new TypeValidator, "setName"  );
        
        Helper::saveArray ( $managerRegistry, GenresRepository::class, $arrayGenres    );
        Helper::saveArray ( $managerRegistry, PeopleRepository::class, $arrayActors     );
        Helper::saveArray ( $managerRegistry, PeopleRepository::class, $arrayDirectors );

        

        $records = $csv->getRecords();
        
        foreach ( $records as $record )
        {
            $record = Helper::sanitizeRecords ( $record );
            extract ( $record );

            $movie = new Movies;
            $movie
                ->setTitle( $title )
                ->setDuration ( (int) $duration )
                ->setProductora ( $production_company );

            if ( $date_published ){
                $movie->setReleaseDate ( $date_published );
            }


            Helper::addToEntity ( $movie, "AddGenre",    $genre,    $arrayGenres    );
            Helper::addToEntity ( $movie, "AddActor",    $actors,   $arrayActors    );
            Helper::addToEntity ( $movie, "AddDirector", $director, $arrayDirectors );
                
            $arrayMovies [] = $movie;
        }
        
        Helper::saveArray ( $managerRegistry, MoviesRepository::class, $arrayMovies );

        return true;
    }
}
