<?php

namespace App\Controller;

use App\Infrastructure\DoctrineUserRepository;
use App\Model\User;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserRegistrationController
{
    public static ?DoctrineUserRepository $orm;

    #[Route('/users', name: 'register_user', methods: ["POST"])]
    public function registerUser(Request $request): JsonResponse
    {
        if (strlen($request->get('password')) <= 8 || strpos($request->get('password'), '_') === false) {
            return new JsonResponse('Password is not valid', Response::HTTP_BAD_REQUEST);
        }
        if (self::orm()->findByEmail($request->get('email')) !== null) {
            return new JsonResponse("The email is already in use", Response::HTTP_BAD_REQUEST);
        }

        $user = new User((string) rand(0, 10000), $request->get('name'), $request->get('email'), $request->get('password'));
        self::orm()->save($user);

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp1.example.com;smtp2.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = 'secret';

        $mail->setFrom("noreply@codium.team");
        $mail->addAddress($request->get('email'));

        $mail->isHTML(true);
        $mail->Subject = "Welcome to Codium, " . $request->get('name');
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
//        $mail->send();

        $response = ['email' => $user->email(), 'name' => $user->name()];
        return new JsonResponse($response, Response::HTTP_CREATED);
    }

    public static function orm(): DoctrineUserRepository
    {
        if (self::$orm === null) {
            self::$orm = new DoctrineUserRepository();
        }
        return self::$orm;
    }
}
