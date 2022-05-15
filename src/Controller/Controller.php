<?php 

namespace App\Controller;

use App\Dto\Response\Transformer\SumResponseDtoTransformer;
use App\Entity\Sum;
use App\Form\SumFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class Controller extends AbstractController
{
    public function __construct(SumResponseDtoTransformer $sumResponseDtoTransformer)
    {
        $this->sumResponseDtoTransformer = $sumResponseDtoTransformer;
    }
    /**
     * @Route("/")
     */
    public function index(): Response
    {
        $sum = new Sum();
        $form = $this->createForm(SumFormType::class, $sum);
        return $this->render('index.html.twig',[
            'sum_form' => $form->createView()
        ]);
    }

    /**
     * @Route("/sum", methods={"POST"})
     */
    public function sum(Request $request, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(SumFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sum = $form->getData();
            $sum->setSum($sum->getFirst() + $sum->getSecond());
            
            $data = $this->sumResponseDtoTransformer->transformFromObject($sum);
            
            $em = $doctrine->getManager();
            $em->persist($data);
            $em->flush();

            //TODO RABBITMQ
            return $this->json($data);
        }
        

        return $this->json(['Failed']);
    }
}