<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Parser;
use AppBundle\Entity\videos as videos;

class VideoCommand extends Command
{
    protected $defaultName;

    public function __construct($defaultName)
    {
        $this->defaultName = $defaultName;

        parent::__construct();
    }

    protected function configure()
    {
        $defaultName = $this->defaultName;

        $this
            ->setName('App:VideoCommand')
            ->setDescription('Video command')
            ->addOption('directory', '-d', InputOption::VALUE_REQUIRED, 'From which directory extract data?', $defaultName)
            ->addOption('site', '-S', InputOption::VALUE_REQUIRED, 'From which site would you like to import?');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $directory = $input->getOption('directory');
        $site = $input->getOption('site');
        $file = getcwd().'/'.$directory.'/'.$site;
        $ext = $this->getExtension ($site);
        $fileName = $file.'.'.$ext;
        if ($ext && file_exists ($fileName) && !is_dir($fileName)) {
            //$output->writeln($fileName . " OK ");
            $data = $this->formatData($ext, $fileName);
            $output->writeln(($data)?'saved OK':'problems saving');
        } else {
            $output->writeln($fileName . " doesn't exist!");
        }
        
    }
    
    private function formatData ($ext, $fileName) {
        $value = [];
        switch ($ext) {
                case "yaml":
                    $yaml = new Parser();
                    $value = $yaml->parse(file_get_contents($fileName));
                    break;
                case "json":
                    $value = json_decode(file_get_contents($fileName), 1);
                    $value = $value['videos'];
                    break;
            }
            $videoEntity = new videos();
            $saved = $videoEntity->saveData($value); 
            $values = (count($saved) == count($value))?true:false;
        return $value;
    }
    
    private function getExtension ($site) {
        switch (strtolower($site)) {
            case 'glorf':
                $ext ='json';
                break;
            case 'flub':
                $ext ='yaml';
                break;
            default:
                $ext = false;
        }
        return $ext;
    }
}
