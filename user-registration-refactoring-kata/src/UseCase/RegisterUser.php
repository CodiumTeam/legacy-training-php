<?php

namespace App\UseCase;

use App\Controller\UserRegistrationController;
use App\Infrastructure\DoctrineUserRepository;
use App\Model\Email;
use App\Model\EmailsSender;
use App\Model\InvalidPasswordException;
use App\Model\User;
use App\Model\UserAlreadyExistsException;
use App\Model\UserNotFoundException;
use App\Model\UserRepository;

class RegisterUser
{
    private EmailsSender $emailsSender;
    private UserRepository $userRepository;

    public function __construct(EmailsSender $emailSender, UserRepository $userRepository)
    {
        $this->emailsSender = $emailSender;
        $this->userRepository = $userRepository;
    }

    /**
     * @throws \PHPMailer\PHPMailer\Exception
     * @throws UserAlreadyExistsException
     */
    public function extracted($password, $email, $name): array
    {
        if (strlen($password) <= 8 || strpos($password, '_') === false) {
            throw new InvalidPasswordException();
        }
        $this->ensureEmailExists($email);

        $user = new User((string) rand(0, 10000), $name, $email, $password);
        $this->userRepository->save($user);

        $theEmail = new Email("noreply@codium.team", $email, "Welcome to Codium, " . $name, 'This is the HTML message body <b>in bold!</b>');
        $this->send($theEmail);

        $response = ['email' => $user->email(), 'name' => $user->name()];

        return $response;
    }

    /**
     * @param Email $theEmail
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    private function send(Email $theEmail): void
    {
        $this->emailsSender->send($theEmail);
    }

    /**
     * @param $email
     * @return void
     * @throws UserAlreadyExistsException
     */
    private function ensureEmailExists(string $email): void
    {
        try {
            $this->userRepository->searchByPk($email);
            throw  new UserAlreadyExistsException();
        } catch (UserNotFoundException $e) {
        }
    }
}
