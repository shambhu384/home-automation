<?php

// api/src/Handler/ResetPasswordRequestHandler.php

namespace App\MessageHandler;

use App\Entity\Gpio;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class GpioStateHandler implements MessageHandlerInterface
{
    public function __invoke(Gpio $gpio)
    {
        die($gpio->getState());
        // do something with the resource
    }
}
