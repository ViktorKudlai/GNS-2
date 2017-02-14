<?php

namespace BaseballBundle\Command;

use BaseballBundle\Document\Schedule;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ParseDataMLBCommand extends ContainerAwareCommand
{
    /**
     * Command configure.
     */
    protected function configure()
    {
        $this
            ->setName('app:ParseDataMLB')
            ->setDescription('Parse MLB data by current year and store into database.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $container = $this->getContainer();

        $client = $container->get('guzzle.client.api_mlb');
        $response = $client->get('/mlb/v2/json/Games/2017');

        $serializer = $container->get('jms_serializer');
        $json = $response->getBody()->getContents();
        $data = $serializer->deserialize($json, 'ArrayCollection<BaseballBundle\Document\Schedule>', 'json');

        $dm = $container->get('doctrine.odm.mongodb.document_manager');

        /** @var Schedule $schedule */
        foreach ($data as $schedule) {
            $dm->persist($schedule);
        }
        $dm->flush();

        $output->writeln('Successfully parsed.');
    }
}
