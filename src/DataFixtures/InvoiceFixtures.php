<?php

namespace App\DataFixtures;

use App\Entity\Invoice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class InvoiceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // création facture 1
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \Datetime())
            ->setInvoiceNumber("0001")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);


        // création facture 2
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \Datetime())
            ->setInvoiceNumber("0002")
            ->setClient($this->getReference("client_1"));
        $manager->persist($invoice);


        // création facture 3
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \Datetime())
            ->setInvoiceNumber("0003")
            ->setClient($this->getReference("client_2"));
        $manager->persist($invoice);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ClientFixtures::class
        ];
    }
}
