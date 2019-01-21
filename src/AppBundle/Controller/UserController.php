<?php
/**
 * Created by PhpStorm.
 * User: charly
 * Date: 10/12/18
 * Time: 04:37 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\UserDetail;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends BaseController
{
    /**
     * @Route("/get/patient", name="get_patients")
     * @param Request $request
     * @return JsonResponse
     */
    public function getPacientesAction(Request $request){
        $postData = $request->query->all();
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:UserDetail')->getUserByName($postData['name']);

        $data = [];
        /** @var UserDetail $user */
        foreach ($users as $user){
            $data [] = [
                'id' => $user->getId(),
                'name' =>  $user->__toString()
            ];
        }

        return new JsonResponse($data);
    }

}