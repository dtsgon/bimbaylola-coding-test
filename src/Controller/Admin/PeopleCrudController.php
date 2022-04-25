<?php

namespace App\Controller\Admin;

use App\Entity\People;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PeopleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return People::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
