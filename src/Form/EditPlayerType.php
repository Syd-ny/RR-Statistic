<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Status;
use App\Entity\Country;



class EditPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('ability', NumberType::class,[
                'scale'=>1
            ])
            ->add('strenght',NumberType::class,[
                'scale'=>1
            ])
            ->add('serve',NumberType::class,[
                'scale'=>1
            ])
            ->add('speed',NumberType::class,[
                'scale'=>1
            ])
            ->add('endurance',NumberType::class,[
                'scale'=>1
            ])
            ->add('mentality',NumberType::class,[
                'scale'=>1
            ])
            ->add('doubles',NumberType::class,[
                'scale'=>1
            ])
            ->add('talent',NumberType::class,[
                'scale'=>1
            ])
            ->add('hard',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('clay',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('grass',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('indoor',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('age',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('globalAgeFactor',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('actualAgeFactor',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('bestRankingSingle',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('bestRankingDouble',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('weeksN1Single',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('weeksN1Double',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpSingleLow',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpDoubleLow',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpSingleMid',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpDoubleMid',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpSingleHigh',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('atpDoubleHigh',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('tmcSingle',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('tmcDouble',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('gsSingle',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('gsDouble',NumberType::class,[
                'attr'=>['type'=>'number'],
            ])
            ->add('statuses', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
                'placeholder' => 'Choose a status',
                'multiple' => false,
                'expanded' => false,
            ])
            //->add('statuses',ChoiceType::class, [
            //    'label' => 'Status',
            //    'choices' => [
            //        'Junior' => 'Junior',
            //        'Senior' => 'Senior',
            //        'Trainer' => 'Trainer',
            //        'Retreated' => 'Retreated'
            //    ],
            //    // $reactions est un tableau, on doit donc configurer
            //    // ce ChoiceType à multiple = true
            //    'multiple' => false,
            //    // un widget HTML par choix "étendu"
            //    'expanded' => true,
            //    'attr' => [
            //        'class' => 'form-check-label my-3'
            //    ]
            //
            //])
            
            
            ->add('countries', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name',
            ])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
