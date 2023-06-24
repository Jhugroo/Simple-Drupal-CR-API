<?php

namespace Drupal\crud_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CrudApiController extends ControllerBase {
    private $crudService;

    public function __construct() {
        $this->crudService =  \Drupal::service('crud_api.CrudApi');
    }

    public function fetchData(Request $request) {
        try {
            return new JsonResponse($this->crudService->fetchData($request));
        } catch (\Exception $error) {
            return new JsonResponse(['ErrMsg' =>  $error->getMessage()], 400);
        }
    }

    public function createNode(Request $request) {
        try {
            return new JsonResponse($this->crudService->createNode($request));
        } catch (\Exception $error) {
            return new JsonResponse(['ErrMsg' =>  $error->getMessage()], 400);
        }
    }
}
