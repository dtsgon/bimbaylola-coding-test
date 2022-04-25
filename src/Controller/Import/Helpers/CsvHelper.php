<?php

declare(strict_types=1);

namespace App\Controller\Import\Helpers;

class CsvHelper
{
    public static function createArrayFromRecord ( $records, $class, $field, $validator = NULL, $function = NULL )
    {
        // no me ha dado tiempo a usar el validador $validator

        $array = [ ];

        foreach ( $records->fetchColumnByName($field) as $data) {
            $exploded = explode ( ',', $data );
            
            foreach ( $exploded as $value ) { 
                $value = trim ( $value );
                $array [ $value ] = new $class;
                if ( $function ){
                    $array [ $value ]->$function ( $value );
                }
            }
        }

        return $array;
    }


    public static function addToEntity ( $entity, $function, $field, $arrayData )
    {
        $array = explode ( ',', $field );
        foreach ( $array as $value )
        {
            $value = trim ( $value );
            
            $entity->$function ( $arrayData [ $value ] );
        } 
    }


    public static function saveArray ( $managerRegistry, $repository, $array )
    {
        foreach ( $array as $value )
        {
            $obj = new $repository ( $managerRegistry );

            // if ( ! $value->getGenre() )
            // {
            //     print_r($value->getGenre());
            //     print_r($value->getId());
            //     continue;
            // }

            $obj->add ( $value, true );
        }
    }


    public static function sanitizeRecords ( $record )
    {
        extract ( $record, EXTR_REFS );
        
        $date_published;
        try{
            $date_published = new \DateTime ( $date_published );
        }
        catch ( \Exception $e )
        {
            $date_published = NULL;
        }

        return $record;
    }


}