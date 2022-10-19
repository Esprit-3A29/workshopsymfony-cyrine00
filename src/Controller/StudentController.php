<?php

namespace App\Controller;

namespace App\Controller;
use App\Entity\Student;
use App\Form\StudentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository ;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

  #[Route('/listStud', name: 'list_student')]
    public function listStudent(StudentRepository $repository)
    {
        $student= $repository->findAll();
       // $students= $this->getDoctrine()->getRepository(StudentRepository::class)->findAll();
       return $this->render("student/list.html.twig",array("tabStudent"=>$student));
    }


  
    #[Route('/addStud', name: 'add3')]
    public function addStudent(ManagerRegistry $doctrine,Request $request)
    {
        $student= new Student();
        $form= $this->createForm(StudentType::class,$student);
        $form->handleRequest($request) ;
        if ($form->isSubmitted()){
             $em= $doctrine->getManager();
             $em->persist($student);
             $em->flush();
             return  $this->redirectToRoute("add3");
         }
        return $this->renderForm("student/add.html.twig",array("formStudent"=>$form));
    }


    
}
