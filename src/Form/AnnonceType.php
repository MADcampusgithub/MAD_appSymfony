<?php
namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Livraison;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("Titre", TextType :: class)
            ->add("Auteur", TextType :: class)
            ->add("Contenu", TextareaType :: class)
            ->add("Categorie", EntityType::class, ['class' => Categorie::class, 'choice_label' => 'libelle'])
            ->add("Livraisons", EntityType::class, ['class' => Livraison::class, 'choice_label' => 'libelle', 'multiple' => true, 'expanded' => true])
            ->add("Sauvegarder", SubmitType :: class);

    }
}
?>