<?php

// declare(strict_types=1);

// namespace DoctrineMigrations;

// use App\Entity\Movies;
// use App\Entity\People;
// use App\Entity\Genres;

// use Doctrine\DBAL\Schema\Schema;
// use Doctrine\Migrations\AbstractMigration;

// use App\Migrations\Helper;
// use App\Repository\GenresRepository;
// use App\Repository\MoviesRepository;
// use App\Repository\PeopleRepository;
// use League\Csv\Reader;
// use League\Csv\Statement;

// use Doctrine\DBAL\Connection;
// use Psr\Log\LoggerInterface;
// use Symfony\Bridge\Doctrine\ManagerRegistry; 
//         $registry = $this->managerRegistry;
        
//         $csv = Reader::createFromPath('fixtures/IMDb movies.csv', 'r');
//         $csv->setHeaderOffset(0);

//         $records = Statement::create()->process($csv);

//         $arrayMovies    = [];
//         $arrayGenre     = Helper::createArrayFromRecord ( $records, Genres::class, 'genre'    );
//         // $arrayActors    = Helper::createArrayFromRecord ( $records, People::class, 'actors'   );
//         // $arrayDirectors = Helper::createArrayFromRecord ( $records, People::class, 'director' );

//         Helper::saveArray ( $registry, GenresRepository::class, $arrayGenre     );
//         // Helper::saveArray ( $registry, PeopleRepository::class, $arrayActors    );
//         // Helper::saveArray ( $registry, PeopleRepository::class, $arrayDirectors );

// die;
//         $records = $csv->getRecords();
        
//         foreach ( $records as $record )
//         {
//             extract ( $record );

//             $movie = new Movies;
//             $movie
//                 ->setTitle( $title )
//                 ->setReleaseDate ( new \DateTime ( $date_published ) )
//                 ->setDuration ( $duration )
//                 ->setProductora ( $production_company );

//             Helper::addToEntity ( $movie, "AddGenre",    $genre,    $arrayGenre     );
//             Helper::addToEntity ( $movie, "AddActor",    $actors,   $arrayActors    );
//             Helper::addToEntity ( $movie, "AddDirector", $director, $arrayDirectors );
                
//             $arrayMovies [] = $movie;
//         }
        
//         Helper::saveArray ( $registry, MoviesRepository::class, $arrayMovies );


//         //print_r ( $arrayGenre );
//         //print_r ( $arrayGenre );
//         //print_r ( $arrayDirectors );

//         return;

// /**
//  * Auto-generated Migration: Please modify to your needs!
//  */
// final class Version20220327161824 extends AbstractMigration
// {
//     private $managerRegistry;

//     public function __construct(Connection $connection, LoggerInterface $logger, ManagerRegistry $managerRegistry)
//     {
//         $this->managerRegistry = $managerRegistry;
//         parent::__construct($connection, $logger );
//     }


//     public function getDescription(): string
//     {
//         return 'Carga los datos del CSV en la BBDD';
//     }

//     public function up(Schema $schema): void
//     {
       
//     }

//     public function down(Schema $schema): void
//     {
//         // this down() migration is auto-generated, please modify it to your needs

//     }


// }
