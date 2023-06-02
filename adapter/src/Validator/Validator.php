<?php

namespace Adapter\Validator;

use App\Infrastructure\Exception\Status400\BadRequestHttpException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator implements ValidatorAdapterInterface
{
    public function __construct(private ValidatorInterface $validator) {}

    /**
     * @throws BadRequestHttpException
     */
    public function validate(object $object)
    {
        $errors = $this->validator->validate($object);

        if (count($errors) > 0) {
            throw new BadRequestHttpException((string)$errors);
        }
    }
}