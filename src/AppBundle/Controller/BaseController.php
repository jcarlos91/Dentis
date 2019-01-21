<?php
/**
 * Created by PhpStorm.
 * User: charly
 * Date: 11/12/18
 * Time: 09:43 AM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    /**
     * Agrega un evento al calendario
     * @param $startDate
     * @param $endDate
     * @param $data
     * @param $description
     */
    public function addEventCalendar($startDate,$endDate,$data,$description){
        $googleCalendar = $this->get('fungio.google_calendar');
        $calendarId = $this->getParameter('calendar_id');
        $googleCalendar->addEvent(
            $calendarId,
            $startDate,
            $endDate,
            $data,
            $description
        );
    }

    /**
     * Elimina un evento del calendario
     * @param $eventId
     */
    public function deleteEventCalendar($eventId){
        $googleCalendar = $this->get('fungio.google_calendar');
        $calendarId = $this->getParameter('calendar_id');
        $googleCalendar->deleteEvent(
            $calendarId,
            $eventId
        );
    }

    public function updateEvent($eventId, $eventStart, $eventEnd, $eventSummary, $eventDescription){
        $googleCalendar = $this->get('fungio.google_calendar');
        $calendarId = $this->getParameter('calendar_id');
        $googleCalendar->updateEvent(
            $calendarId,
            $eventId,
            $eventStart,
            $eventEnd,
            $eventSummary,
            $eventDescription
        );

    }

}