<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ClientFixtures extends Fixture
{

    private UserPasswordEncoderInterface $encoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }



    public function load(ObjectManager $manager)
    {
        // création du client 1
        $client = new Client();
        $client->setName("IBM")
               ->setReference('0001')
               ->setPassword($this->encoder->encodePassword(
                $client, "123"
    ));

        $manager->persist($client);
        $this->addReference("client_1", $client);



        // création du client 2
        $client = new Client();
        $client->setName("Sybase")
               ->setReference('0002')
               ->setPassword($this->encoder->encodePassword(
                $client, "123"
            ));

        $manager->persist($client);
        $this->addReference("client_2", $client);



        // création du client 3
        $client = new Client();
        $client->setName("Bull")
               ->setReference('0003')
               ->setPassword($this->encoder->encodePassword(
                $client, "123"
            ));

        $manager->persist($client);
        $this->addReference("client_3", $client);


        $manager->flush();
    }
}
