<?php

namespace Drupal\crud_api\Service;

use Drupal\node\Entity\Node;

class CrudApi {

    public function fetchData($request) {
        foreach ($request->get('query')['parameters'] as  $data) {
            foreach ($data as $dataName => $value) {
                foreach (\Drupal::entityTypeManager()->getStorage($request->get('query')['type'])->loadByProperties(reset($value)) as $key => $name) {
                    foreach ($request->get('query')['return'] as $returnField) {
                        $response[$dataName][$returnField][$key] = $name->get($returnField)->getValue()[0]['value'];
                    }
                }
            }
        }

        return $response;
    }

    public function createNode($request) {
        $node = Node::create(array_filter($request->get('node'), fn ($value) => !is_null($value) && $value !== ''));
        $node->save();

        return $node->nid->value;
    }
}
