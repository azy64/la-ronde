<?php

namespace App\Test\Controller;

use App\Entity\LaRonde;
use App\Repository\LaRondeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LaRondeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private LaRondeRepository $repository;
    private string $path = '/la/ronde/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(LaRonde::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LaRonde index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'la_ronde[date_fin]' => 'Testing',
            'la_ronde[date_debut]' => 'Testing',
            'la_ronde[observation]' => 'Testing',
            'la_ronde[detail]' => 'Testing',
            'la_ronde[agent]' => 'Testing',
            'la_ronde[site]' => 'Testing',
            'la_ronde[materiel]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new LaRonde();
        $fixture->setDate_fin('My Title');
        $fixture->setDate_debut('My Title');
        $fixture->setObservation('My Title');
        $fixture->setDetail('My Title');
        $fixture->setAgent('My Title');
        $fixture->setSite('My Title');
        $fixture->setMateriel('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('LaRonde');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new LaRonde();
        $fixture->setDate_fin('My Title');
        $fixture->setDate_debut('My Title');
        $fixture->setObservation('My Title');
        $fixture->setDetail('My Title');
        $fixture->setAgent('My Title');
        $fixture->setSite('My Title');
        $fixture->setMateriel('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'la_ronde[date_fin]' => 'Something New',
            'la_ronde[date_debut]' => 'Something New',
            'la_ronde[observation]' => 'Something New',
            'la_ronde[detail]' => 'Something New',
            'la_ronde[agent]' => 'Something New',
            'la_ronde[site]' => 'Something New',
            'la_ronde[materiel]' => 'Something New',
        ]);

        self::assertResponseRedirects('/la/ronde/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDate_fin());
        self::assertSame('Something New', $fixture[0]->getDate_debut());
        self::assertSame('Something New', $fixture[0]->getObservation());
        self::assertSame('Something New', $fixture[0]->getDetail());
        self::assertSame('Something New', $fixture[0]->getAgent());
        self::assertSame('Something New', $fixture[0]->getSite());
        self::assertSame('Something New', $fixture[0]->getMateriel());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new LaRonde();
        $fixture->setDate_fin('My Title');
        $fixture->setDate_debut('My Title');
        $fixture->setObservation('My Title');
        $fixture->setDetail('My Title');
        $fixture->setAgent('My Title');
        $fixture->setSite('My Title');
        $fixture->setMateriel('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/la/ronde/');
        self::assertSame(0, $this->repository->count([]));
    }
}
