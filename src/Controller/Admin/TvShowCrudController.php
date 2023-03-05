<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\TvShow;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TvShowCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TvShow::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title');
        yield DateField::new('year')->setFormat('Y');
        yield AssociationField::new('seasons');
    }
}
