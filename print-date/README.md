# Goal
Be able to test printCurrentDate function without changing the method signature.

1. Decouple the code
2. Test the code with doubles using a library.
3. Test the code with doubles created by you.
# Code to test
    public function printCurrentDate()
    {
        $now = $this->calendar->now();
        $this->printer->printLine($now);
    }
    
## Run the kata
On Linux and Mac

    make

in Windows using docker

    docker run -v ${PWD}:/opt/project php-docker-bootstrap make

# Learnings
How to use Prophecy to generate the doubles.

How to build a Mock and Stub manually.

## Tools
[Prophecy](https://github.com/phpspec/prophecy)
### Example of stub with prophecy

    /** @test */
    function should_success_when_password_is_valid()
    {
        $prophecy = $this->prophesize(PasswordValidator:class);
        $prophecy->isValid(‘aPassword’)->willReturn(true);
        /** @var PasswordValidator $passwordValidator */
        $passwordValidator = $prophecy->reveal();
        $userRegistration = new UserRegistration($passwordValidator);
    
        $success = $userRegistration->run();
    
        $this->assertTrue($success);
    }

	
### Example of spy with prophecy
    /** @test */
    function should_send_an_email()
    {
        $prophecy = $this->prophesize(EmailSender:class);
        /** @var EmailSender $emailSender */
        $emailSender = $prophecy->reveal();
        $userRegistration = new UserRegistration($emailSender);
    
    
        $userRegistration->register();
    
    
        $prophecy->send()->shouldHaveBeenCalled();
    }

## Authors
Luis Rovirosa [@luisrovirosa](https://www.twitter.com/luisrovirosa)

Jordi Anguela [@jordianguela](https://www.twitter.com/jordianguela)
