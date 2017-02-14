<?php

namespace BaseballBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View as RestView;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ApiController extends FOSRestController
{
    /**
     * @Route("/api/matches", name="api_matches")
     *
     * Access URI /api/matches
     *
     * @ApiDoc(
     *  method="GET",
     *  parameters={
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page to show."},
     *      {"name"="onPage", "dataType"="integer", "required"=false, "description"="Numbers of records on page."}
     *  },
     *  description="Returns array of baseball matches.",
     *  output="BaseballBundle\Document\Schedule",
     *  section="Baseball API",
     *  statusCodes={
     *      200="Returned when request was handled with success",
     *      500="Returned when there is a server side error",
     *  }
     * )
     *
     * @RestView
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getScheduleAction(Request $request)
    {
        return $this->handleView(
            $this->view(
                $this->getMatchesData($request),
                200
            )
        );
    }

    /**
     * @Route("/", name="matches")
     *
     * Access URI /
     *
     * @ApiDoc(
     *  method="GET",
     *  parameters={
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page to show."},
     *      {"name"="onPage", "dataType"="integer", "required"=false, "description"="Numbers of records on page."}
     *  },
     *  description="Render table with baseball matches schedule.",
     *  output="BaseballBundle\Document\Schedule",
     *  section="Baseball API",
     *  statusCodes={
     *      200="Returned when request was handled with success",
     *      500="Returned when there is a server side error",
     *  }
     * )
     *
     * @RestView
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getScheduleViewAction(Request $request)
    {
        return $this->render(
            'BaseballBundle::table.html.twig',
            [
                'pagination' => $this->getMatchesData($request)
            ]
        );
    }

    /**
     * Get matches data.
     *
     * @param Request $request
     *
     * @return PaginationInterface
     */
    protected function getMatchesData(Request $request)
    {
        $query = $this->get('baseball.schedule.repository')->findAll();
        $paginator = $this->get('knp_paginator');

        return $paginator->paginate(
            $query,
            $request->query->getInt('page', $this->getParameter('knp_default_page')),
            $request->query->getInt('onPage', $this->getParameter('knp_default_on_page'))
        );
    }
}
