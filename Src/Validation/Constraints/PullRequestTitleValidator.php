<?php

namespace ByThePixel\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PullRequestTitleValidator extends ConstraintValidator
{
    public function validate( $value, Constraint $constraint )
    {
        if(!preg_match( "/^\d+-.+/", $value, $matches )) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }
}
