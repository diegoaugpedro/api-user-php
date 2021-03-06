<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GetUsers
{
    public function __construct(
        //private EntityManagerInterface $entityManager,
        //private SerializerInterface $serializer
    )
    {
    }

    #[Route("/users/{id}", methods: ["GET"])]
    public function __invoke(int $id): Response
    {
        $repository = $this->entityManager->getRepository(User::class);
        $users = $repository->find($id);

        if (null === $users) {
            return new JsonResponse([
                'error' => 'Dados não encontrados!'
            ], Response::HTTP_NOT_FOUND);
        }

        return JsonResponse::fromJsonString($this->serializer->serialize($users, 'json', [
            'circular_reference_handler' => function($object){
              return $object->getId();
            }
          ]));
    }
}
