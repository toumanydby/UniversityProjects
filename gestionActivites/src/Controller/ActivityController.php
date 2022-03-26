<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\User;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use cebe\markdown\Markdown;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/activity')]
class ActivityController extends AbstractController
{
    #[Route('/', name: 'activity_index', methods: ['GET'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function index(ActivityRepository $activityRepository, Markdown $markdown): Response
    {
        $activities = $activityRepository->findAll();
        $parsedActivities = [];

        foreach ($activities as $activity) {
            $parsedActivities[] = [
                'id' => $activity->getId(),
                'name' => $activity->getName(),
                'description' => $markdown->parse($activity->getDescription())
            ];
        }

        return $this->render('activity/index.html.twig', [
            'activities' => $parsedActivities,
        ]);
    }

    #[Route('/child', name: 'activity_index_child', methods: ['GET'])]
    #[IsGranted('ROLE_ENFANT')]
    public function indexChild(ActivityRepository $activityRepository, Markdown $markdown): Response
    {
        $activities = $activityRepository->findAll();
        $parsedActivities = [];

        foreach ($activities as $activity) {
            $parsedActivities[] = [
                'id' => $activity->getId(),
                'name' => $activity->getName(),
                'description' => $markdown->parse($activity->getDescription())
            ];
        }

        return $this->render('enfant/index.html.twig', [
            'activities' => $parsedActivities,
        ]);
    }

    #[Route('/inscrit/{user_id}', name: 'activity_inscrit', methods: ['GET'])]
    #[Entity('user', options: [ 'id' => 'user_id'])]
    #[IsGranted('ROLE_ENFANT')]
    public function activityInscrit(User $user, Markdown $markdown): Response
    {
        $activities = $user->getActivityInscrit();
        $parsedActivities = [];

        foreach ($activities as $activity) {
            $parsedActivities[] = [
                'id' => $activity->getId(),
                'name' => $activity->getName(),
                'description' => $markdown->parse($activity->getDescription())
            ];
        }

        return $this->render('enfant/activityInscrit.html.twig', [
            'activities' => $parsedActivities,
        ]);
    }


    #[Route('/myActivity', name: 'myActivity_index', methods: ['GET'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function index_myActivity(ActivityRepository $activityRepository, Markdown $markdown): Response
    {
        $activities = $activityRepository->findAll();
        $activitiesOK = new \ArrayObject();
        foreach ($activities as $activity) {
            if ($activity->getUser()->getUserIdentifier() == $this->getUser()->getUserIdentifier()){
                $activitiesOK->append($activity);
            }
        }
        $activities = $activitiesOK;
        $parsedActivities = [];

        foreach ($activities as $activity) {
            $parsedActivities[] = [
                'id' => $activity->getId(),
                'name' => $activity->getName(),
                'description' => $markdown->parse($activity->getDescription())
            ];
        }

        return $this->render('activity/index_myActivity.html.twig', [
            'activities' => $parsedActivities,
        ]);
    }

    #[Route('/new', name: 'activity_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $activity->setUser($this->getUser());
            $entityManager->persist($activity);
            $entityManager->flush();

            return $this->redirectToRoute('activity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('activity/new.html.twig', [
            'activity' => $activity,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'activity_show', methods: ['GET'])]
    public function show(Activity $activity, Markdown $markdown): Response
    {
        $activity->setDescription($markdown->parse($activity->getDescription()));
        return $this->render('activity/show.html.twig', [
            'activity' => $activity,
        ]);
    }

    #[Route('/child/{id}', name: 'activity_show_child', methods: ['GET'])]
    public function showChild(Activity $activity, Markdown $markdown): Response
    {
        $activity->setDescription($markdown->parse($activity->getDescription()));
        return $this->render('enfant/show.html.twig', [
            'activity' => $activity,
        ]);
    }

    #[Route('/myActivity/{id}', name: 'myActivity_show', methods: ['GET'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function showMyActivity(Activity $activity, Markdown $markdown): Response
    {
        $activity->setDescription($markdown->parse($activity->getDescription()));
        return $this->render('activity/showMyActivity.html.twig', [
            'activity' => $activity,
        ]);
    }


    #[Route('/{id}/edit', name: 'activity_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function edit(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        $userAct = $activity->getUser();
        $userCurrent = $this->getUser();
        if( $userAct->getUserIdentifier() != $userCurrent->getUserIdentifier()){
            return $this->render('activity/notAllowed.html.twig');
        }
        else{
            $form = $this->createForm(ActivityType::class, $activity);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('activity_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('activity/edit.html.twig', [
                'activity' => $activity,
                'form' => $form,
            ]);
        }

    }


    #[Route('/{id}', name: 'activity_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ANIMATEUR')]
    public function delete(Request $request, Activity $activity, EntityManagerInterface $entityManager): Response
    {
        $userAct = $activity->getUser();
        $userCurrent = $this->getUser();
        if( $userAct->getUserIdentifier() != $userCurrent->getUserIdentifier()){
            return $this->render('activity/notAllowed.html.twig');
        }
        else{
            if ($this->isCsrfTokenValid('delete'.$activity->getId(), $request->request->get('_token'))) {
                $entityManager->remove($activity);
                $entityManager->flush();
            }

            return $this->redirectToRoute('activity_index', [], Response::HTTP_SEE_OTHER);
        }
    }
}
