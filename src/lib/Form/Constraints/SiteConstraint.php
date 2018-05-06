<?php

namespace Edgar\EzUISites\Form\Constraints;

use Symfony\Component\Validator\Constraint;

class SiteConstraint extends Constraint
{
    public $message = 'The string "%string%" is not a valid siteaccess identified.';

    /**
     * @return string
     */
    public function validatedBy(): string
    {
        return SiteConstraintValidator::class;
    }

    /**
     * @return string
     */
    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
