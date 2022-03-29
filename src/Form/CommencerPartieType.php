<?php

namespace App\Form;

use App\Entity\Contest, App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class CommencerPartieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start_date', DateType::class, [
                'widget' => 'single_text',  // le champ sera affiché dans un input de type date
                'label' => 'Début de la partie',
                'constraints' => [
                    new GreaterThanOrEqual([
                        'value' => 'today',
                        'message' => 'La partie ne peut pas se dérouler dans le passé !'
                    ])
                ],
                'help' => 'La date doit être postérieure ou égale à aujourd\'hui'
            ])
            ->add('players', EntityType::class, [
                'class'         => Player::class,
                'choice_label'  => 'nickname',
                'multiple'      => true,
                'expanded'      => true,
                'label'         => 'Joueurs participants'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contest::class,
        ]);
    }
}
