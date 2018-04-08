<?php

namespace Edgar\EzUISites\Form\Type;

use Edgar\EzUISites\Data\SiteData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterSitesType extends AbstractType
{
    /** @var array $sites */
    protected $sites;

    public function __construct(array $sites)
    {
        $this->sites = $sites;
    }

    public function getParent()
    {
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'choice_loader' => new CallbackChoiceLoader(function () {
                    $sites = [];
                    foreach ($this->sites as $group => $sitesGroup) {
                        $sites[$group] = [];
                        foreach ($sitesGroup as $site) {
                            $siteData = new SiteData();
                            $siteData->setIdentifier($site);
                            $siteData->setName($site);
                            $sites[$group][] = $siteData;
                        }
                    }

                    return $sites;
                }),
                'choice_label' => 'site',
                'choice_name' => 'identifier',
                'choice_value' => 'identifier',
            ]);
    }
}
