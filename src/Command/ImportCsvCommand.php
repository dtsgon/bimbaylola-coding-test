<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\Import\CsvController;
use Doctrine\Persistence\ManagerRegistry;

#[AsCommand(
    name: 'import:csv',
    description: 'Add a short description for your command',
)]
class ImportCsvCommand extends Command
{
    public function __construct( protected ManagerRegistry $managerRegistry ) // PHP 8.1 POWAAA!
    {
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        //
        // Sería preferible ejecutar este proceso por partes para no ahogar RAM/CPU
        //

        // recogerlo por parámetro
        $file = 'fixtures/IMDb movies-part.csv';

        $controller = new CsvController();
        $ok =  $controller->execute( $this->managerRegistry, $file );

        if ( ! $ok ) {
            throw new \Exception ( 'Importación fallida.' );
        }
        

        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
