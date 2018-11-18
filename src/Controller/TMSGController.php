<?php /** @noinspection SpellCheckingInspection */
declare(strict_types=1);

namespace App\Controller;

use App\Entity\TMSG;
use App\Repository\TMSGRepository;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TMSGController extends AbstractController
{
    /**
     * @Route("/tmsg", name="tmsg_get", methods={"GET"})
     *
     * @param TMSGRepository      $repository
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function index(TMSGRepository $repository, SerializerInterface $serializer)
    {
        return JsonResponse::fromJsonString($serializer->serialize($repository->findAll(), 'json'));
    }

    /**
     * @Route("/tmsg", name="tmsg_post", methods={"POST"})
     *
     * @param Request             $request
     * @param ValidatorInterface  $validator
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function post(Request $request, ValidatorInterface $validator, SerializerInterface $serializer)
    {
        $tmsg = $serializer->deserialize($request->getContent(), TMSG::class, 'json');

        $errors = $validator->validate($tmsg);
        if (0 < count($errors)) {
            return JsonResponse::fromJsonString($serializer->serialize($errors, 'json'), Response::HTTP_BAD_REQUEST);
        }

        try {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tmsg);
            $entityManager->flush();
        } /* @noinspection PhpRedundantCatchClauseInspection */ catch (ORMException $e) {
            return $this->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        return $this->json(['message' => 'Success']);
    }
}
