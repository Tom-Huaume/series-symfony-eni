<?php

namespace App\Controller;

use App\Entity\Serie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/series", name="serie_")
 */
class SerieController extends AbstractController
{
    /**
     * @Route("", name="list")
     */
    public function list(): Response
    {
        //todo: aller chercher les séries en bdd

        return $this->render('serie/list.html.twig');
    }

    /**
     * @Route("/details/{id}", name="details")
     */
    public function details(int $id): Response
    {
        //todo: aller chercher la série en bdd

        return $this->render('serie/details.html.twig');
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request): Response
    {
        dump($request);
        return $this->render('serie/create.html.twig');
    }

    /**
     * @Route("/demo", name="em-demo")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function demo(EntityManagerInterface $entityManager): Response
    {
        // Façon alternative de récupérer l'entityManager :
        //$entityManager = $this->getDoctrine()->getManager();

        //créé une instance
        $serie = new Serie();

        //hydrate toutes les propriétés
        $serie->setName('Altered Carbon');
        $serie->setBackdrop('altered-carbon-68421.jpg');
        $serie->setPoster('altered-carbon-68421.jpg');
        $serie->setDateCreated(new \DateTime());
        $serie->setFirstAirDate(new \DateTime("- 1 year"));
        $serie->setLastAirDate(new \DateTime("- 6 month"));
        $serie->setGenres('Sci-Fi');
        $serie->setOverview('Altered Carbon is set in the 23rd 
        century when the human mind has been digitized and the soul it 
        self is transferable from one body to the next. Takeshi Kovacs, 
        a former elite interstellar warrior known as an Envoy who has been 
        imprisoned for 250 years, is downloaded into a future he\'d tried to stop.');
        $serie->setPopularity(123.00);
        $serie->setVote(8.2);
        $serie->setStatus('returning');
        $serie->setTmdbId(68421);

        dump($serie);

        //ENREGISTRER UNE SERIE
        $entityManager->persist($serie);
        $entityManager->flush();

        //MODIFIER UNE SERIE
        //$serie->setGenres('comedy');
        //$entityManager->flush();

        //SUPPRIMER UNE SERIE
        //$entityManager->remove($serie);
        //$entityManager->flush();

        return $this->render('serie/create.html.twig');
    }
}