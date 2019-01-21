<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Citas;
use AppBundle\Form\Type\EventType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $request = $this->get('request_stack')->getMasterRequest();

        $redirectUri = 'http://localhost/dentist/web/app_dev.php/';
        $googleCalendar = $this->get('fungio.google_calendar');
        $googleCalendar->setRedirectUri($redirectUri);

        if ($request->query->has('code') && $request->get('code')) {
            $client = $googleCalendar->getClient($request->get('code'));
        } else {
            $client = $googleCalendar->getClient();
        }

        if (is_string($client)) {
            return new RedirectResponse($client);
        }

        $events = $googleCalendar->getEventsForDate('primary', new \DateTime('now'));
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'events' => $events
        ]);
    }

    /**
     * @Route("/new/event", name="new_event")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function newEventAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $meeting = new Citas();
        $form = $this->createForm(EventType::class);

        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            if ($form->isValid() && $form->isSubmitted()) {
                $save = $form->get('save')->isClicked();
                if ($save) {
                    $em->getConnection()->beginTransaction();
                    try {
                        $associate = $em->getRepository('AppBundle:UserDetail')->findOneBy(['id' => $form->get('userHidden')->getData()]);
                        $meeting->setUser($associate->getUserId());
                        $meeting->setStartDateTime($form->get('startDateTime')->getData());
                        $meeting->setEndDateTime($form->get('endDateTime')->getData());
                        $meeting->setObservations($form->get('observations')->getData());
                        $meeting->setEstatus(1);
                        $meeting->setDelete(0);
                        $em->persist($meeting);
                        $em->flush();
                        $this->addEventCalendar(
                            $form->get('startDateTime')->getData(),
                            $form->get('endDateTime')->getData(),
                            $associate->__toString(),
                            $meeting->getId() . "-" . $form->get('observations')->getData()
                        );

                        $em->getConnection()->commit();
                        $this->addFlash(
                            'success', 'Cita agendada correctamente'
                        );
                        return $this->redirectToRoute('homepage');
                    } catch (\Exception $e) {
                        $em->getConnection()->rollBack();
                        $this->addFlash(
                            'danger', $e->getMessage()
                        );
                    }
                }
            } else {
                $errors = [];
                foreach ($form->getErrors() as $error) {
                    $errors[] = $error;
                }
                $this->addFlash(
                    'danger', $errors
                );
            }
        }

        return $this->render('default/new_event.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{event}/event/{meeting}", name="delete_event")
     * @param $event
     * @param $meeting
     * @return RedirectResponse
     */
    public function deleteEventAction($event, $meeting)
    {
        $em = $this->getDoctrine()->getManager();
        $cita = $em->getRepository('AppBundle:Citas')->find($meeting);
        try {
            $em->getConnection()->beginTransaction();
            if ($cita) {
                $cita->setDelete(1);
                $this->deleteEventCalendar($event);
                $em->flush();
                $em->getConnection()->commit();
                $this->addFlash('success', 'Evento eliminado correctamente');
            }
        } catch (\Exception $e) {
            $em->getConnection()->rollBack();
            $this->addFlash(
                'danger', $e->getMessage()
            );
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/update/{event}/event/{meeting}", name="update_event")
     * @param Request $request
     * @param $event
     * @param $meeting
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateEventAction(Request $request, $event, $meeting){
        $em = $this->getDoctrine()->getManager();
        $cita = $em->getRepository('AppBundle:Citas')->find($meeting);

        $form = $this->createForm(EventType::class,$cita);
        $form->remove('user');
        $form->remove('userHidden');

        $form->handleRequest($request);

        if($request->getMethod() == 'POST'){
            if($form->isValid() && $form->isSubmitted()){
                $save = $form->get('save')->isClicked();
                if($save){
                    try{
                        $em->getConnection()->beginTransaction();
                        $eventStart = $cita->getStartDateTime();
                        $eventEnd = $cita->getEndDateTime();
                        $eventSummary = $cita->getUser()->getUserdetail()->__toString();
                        $eventDescription = $cita->getId(). "-" . $form->get('observations')->getData();
                        $em->flush();
                        $em->getConnection()->commit();
                        $this->updateEvent(
                            $event,
                            $eventStart,
                            $eventEnd,
                            $eventSummary,
                            $eventDescription
                        );
                        $this->addFlash('success','Cita actualizada correctamente');
                        return $this->redirectToRoute('homepage');
                    }catch (\Exception $e){
                        $this->addFlash(
                            'danger', $e->getMessage()
                        );
                    }
                }
            }
        }

        return $this->render('default/update_event.html.twig',[
            'patient' => $cita->getUser(),
            'form' => $form->createView()
        ]);
    }
}
