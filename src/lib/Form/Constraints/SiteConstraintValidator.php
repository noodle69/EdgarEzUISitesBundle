<?php

namespace Edgar\EzUISites\Form\Constraints;

use Edgar\EzUISites\Data\SiteData;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SiteConstraintValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!empty($value) && preg_match_all('|[a-z0-9_\-]+|', $value) === 0) {
            $this->context->addViolation(
                $constraint->message,
                ['%string%' => $value]
            );
        }
    }
}
