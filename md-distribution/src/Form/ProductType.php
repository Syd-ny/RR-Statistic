<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Categorie;
use App\Entity\Marque;
use App\Entity\Statut;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('name',TextType::class,[
                "label" => "Nom du produit",
                "attr" => [
                    "placeholder" => "Saisissez le nom du produit"
                ]
            ])

            ->add('description',TextareaType::class,[
                "label" => "Description du produit",
                "attr" => [
                    "placeholder" => "Saisissez la dexription du produit"
                ]
            ])

            ->add('categories', EntityType::class, [
                'label' => 'Catégorie(s) du produit',
                'class' => Categorie::class,
                'choice_label' => 'name',
                'multiple' => true, // Changez à true si vous souhaitez permettre plusieurs catégories par produit
                'expanded' => true, // Changez à true si vous souhaitez afficher les catégories sous forme de cases à cocher
                'placeholder' => 'Sélectionnez une catégorie',
            ])

            ->add('price', MoneyType::class, [
                'label' => 'Prix du produit',
                'currency' => 'EUR', // Changez la devise si nécessaire
                'attr' => [
                    'placeholder' => 'Saisissez le prix du produit'
                ]
            ])

            ->add('marques', EntityType::class, [
                'label' => 'Marque du produit',
                'class' => Marque::class, // L'entité Marque à utiliser
                'choice_label' => 'nom', // Le champ de l'entité à afficher dans le formulaire
                'multiple' => false, // Permet à un produit d'être lié à une seule marque
                'expanded' => false, // Changez à true si vous souhaitez afficher les marques sous forme de cases à cocher
                'placeholder' => 'Sélectionnez une marque',
            ])

            ->add('reference', TextType::class, [
                'label' => 'Référence du produit',
                'attr' => [
                    'placeholder' => 'Saisissez la référence du produit'
                ]
            ])

            ->add('statuts', EntityType::class, [
                'label' => 'Statut du produit',
                'class' => Statut::class, // L'entité Statut à utiliser
                'choice_label' => 'name', // Le champ de l'entité à afficher dans le formulaire
                'multiple' => false, // Permet à un produit d'être lié à un seul statut
                'expanded' => false, // Changez à true si vous souhaitez afficher les statuts sous forme de cases à cocher
                'placeholder' => 'Sélectionnez un statut',
            ])
            // Custom form options to display conditionnally, if I'm updating a user I can't change their password
            /*if($options["custom_option"] !== "edit"){
                $builder
                    ->add('password',RepeatedType::class,[
                        "type" => PasswordType::class,
                        'invalid_message' => 'Les deux champs doivent être identiques',
                        'required' => true,
                        'first_options'  => ['label' => 'Le mot de passe',"attr" => ["placeholder" => "*****"]],
                        'second_options' => ['label' => 'Répétez le mot de passe',"attr" => ["placeholder" => "*****"]],
                    ]);
            }*/
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'custom_option' => "default"
        ]);

        $resolver->setRequired([
            'categories', // Déclarez les options nécessaires ici
            'marques',
            'statuts',
        ]);
    }
}