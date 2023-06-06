<?php

namespace GuiChaves;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ResponseListenerBundle extends Bundle
{
    public function getPath()
    {
        return \dirname(__DIR__);
    }
}