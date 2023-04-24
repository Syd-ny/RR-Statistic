<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Status;
use App\Entity\Country;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;



class SimulateMatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          ->add('player1', EntityType::class, [
              'class' => Player::class,
              'choice_label' => function(Player $player) {
                return $player->getFirstName() . ' ' . $player->getLastName();
            },
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('p')
                    ->orderBy('p.firstname', 'ASC');
            },
              'choices' => $options['player1_choices'],
          ])

          ->add('player2', EntityType::class, [
            'class' => Player::class,
            'choice_label' => function(Player $player) {
              return $player->getFirstName() . ' ' . $player->getLastName();
          },
          'query_builder' => function (EntityRepository $er) {
              return $er->createQueryBuilder('p')
                  ->orderBy('p.firstname', 'ASC');
          },
            'choices' => $options['player2_choices'],
          ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
            'player1_choices' => [],
            'player2_choices' => []
        ]);
    }
}
            
            
            
            
