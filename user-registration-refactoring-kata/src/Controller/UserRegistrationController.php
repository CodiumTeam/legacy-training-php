<?php

namespace App\Controller;

use App\Infrastructure\DoctrineUserRepository;
use App\Model\InvalidPasswordException;
use App\Model\User;
use App\Model\UserAlreadyExistsException;
use App\UseCase\PHPMailerEmailSender;
use App\UseCase\RegisterUser;
use App\UseCase\UserOrmRepositoyAdapter;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserRegistrationController
{
    public static ?DoctrineUserRepository $orm;
    private RegisterUser $registerUser;

    public function __construct()
    {
    }

    /** @Route("/users", methods={"POST"}, name="register_user") */
    public function registerUser(Request $request): Response
    {
        $this->registerUser = new RegisterUser(new PHPMailerEmailSender(), new UserOrmRepositoyAdapter(self::orm()));
        try {
            $user = $this->registerUser->extracted(
                $request->get('password'),
                $request->get('email'),
                $request->get('name')
            );

            return new JsonResponse($user, Response::HTTP_CREATED);
        } catch (InvalidPasswordException $e) {

            return new Response('Password is not valid', Response::HTTP_BAD_REQUEST);
        } catch (UserAlreadyExistsException $e) {
            return new Response("The email is already in use", Response::HTTP_BAD_REQUEST);
        } catch (Exception $e) {
        }
    }

    public static function orm(): DoctrineUserRepository
    {
        if (self::$orm === null) {
            self::$orm = new DoctrineUserRepository();
        }
        return self::$orm;
    }
}
