<?php

namespace App\Validator\Constraints;

use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * @Annotation
 */
class SizeLimitReached extends ConstraintValidator
{

    public function validate($classe, Constraint $constraint)
    {
        if (!$constraint instanceof SizeLimit) {
            throw new UnexpectedTypeException($constraint, SizeLimit::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $classe || '' === $classe) {
            return;
        }

        if (!is_string($classe)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($classe, 'string');

            // separate multiple types using pipes
            // throw new UnexpectedValueException($classe, 'string|int');
        }
    }
    public $message = 'The student limit has been reached. Please fire the student from the school or find an available class.';
}