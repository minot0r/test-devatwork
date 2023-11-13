<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(
        Request $request,
        UserRepository $userRepository,
        SerializerInterface $serializer
    ): JsonResponse {
        $limit = 10;
        $offset = $request->query->getInt('offset', 0);

        $users = $userRepository->findAllLimitOffset($limit, $offset);

        $count = $userRepository->count([]);
        $response = $serializer->serialize([
            'total' => $count,
            'shown' => $limit,
            'hasMore' => $count > $offset + $limit,
            'users' => $users,
        ], 'json');


        return new JsonResponse($response, Response::HTTP_OK, [], true);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ): JsonResponse {
        $newUser = $serializer->deserialize($request->getContent(), User::class, 'json');

        $entityManager->persist($newUser);
        $entityManager->flush();

        $response = [
            'message' => 'User created',
        ];

        return new JsonResponse($response, Response::HTTP_CREATED);;
    }

    #[Route('/csv', name: 'app_user_new_from_csv', methods: ['POST'])]
    public function newFromCsv(
        Request $request,
        EntityManagerInterface $entityManager,
    ): JsonResponse {
        $users = User::fromCSV($request->getContent());

        foreach ($users as $user) {
            $entityManager->persist($user);
        }
        $entityManager->flush();

        $response = [
            'message' => 'Users created',
        ];

        return new JsonResponse($response, Response::HTTP_CREATED);;
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user, SerializerInterface $serializer): JsonResponse
    {
        $jsonUser = $serializer->serialize($user, 'json');

        return new JsonResponse($jsonUser, Response::HTTP_OK, [], true);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        User $user,
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer
    ): JsonResponse {
        $serializer->deserialize($request->getContent(), User::class, 'json', ['object_to_populate' => $user]);

        $entityManager->flush();

        $response = [
            'message' => 'User updated',
        ];

        return new JsonResponse($response, Response::HTTP_OK);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['DELETE'])]
    public function delete(
        User $user,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        $entityManager->remove($user);
        $entityManager->flush();

        $response = [
            'message' => 'User deleted',
        ];

        return new JsonResponse($response, Response::HTTP_OK);
    }
}
