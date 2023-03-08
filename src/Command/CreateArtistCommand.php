<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Service\ArtiestService;

#[AsCommand(
    name: "app:artist:create",
    description: "Maak een artiest",
)]
class CreateArtistCommand extends Command
{
    private $as;

    public function __construct(ArtiestService $as) {
        parent::__construct();
            $this->as = $as;      
    }

    protected function configure(): void
    {
        $this
            ->addArgument("naam", InputArgument::REQUIRED, "Naam?")
            ->addArgument("adres", InputArgument::REQUIRED, "adres?")
            ->addArgument("genre", InputArgument::REQUIRED, "genre?")
            ->addArgument("omschrijving", InputArgument::REQUIRED, "omschrijving?")
            ->addArgument("afbeelding_url", InputArgument::REQUIRED, "afbeelding_url?")
            ->addArgument("website", InputArgument::REQUIRED, "website?")

            ->addOption("option1", null, InputOption::VALUE_NONE, "Option description")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $params = [
            "naam" => $input->getArgument("naam"),
            "adres" => $input->getArgument("adres"),
            "genre" => $input->getArgument("genre"),
            "omschrijving" => $input->getArgument("omschrijving"),
            "afbeelding_url" => $input->getArgument("afbeelding_url"),
            "website" => $input->getArgument("website"),
        ];

        $result = $this->as->saveArtiest($params);

        return Command::SUCCESS;
    }

 

    
}