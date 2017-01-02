<?php

namespace ByThePixel\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

class PullRequestTitle extends Constraint
{
    public $message = 'The Pull Request title "%string%" does not match the necessary pattern.';
}
