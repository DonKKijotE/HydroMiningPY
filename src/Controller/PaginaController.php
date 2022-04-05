<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use App\Form\Type\ContactoType;
use App\Form\Type\ContactoenType;
use App\Form\Type\ContactoptType;

class PaginaController extends AbstractController
{
   /**
     * @Route("/",  name="inicio_es")
     */
    public function inicioEs(): Response
    {


        return $this->render('inicio_es.html.twig');
    }

    /**
      * @Route("/en",  name="inicio_en")
      */
     public function inicioEn(): Response
     {


         return $this->render('inicio_en.html.twig');
     }

     /**
       * @Route("/pt",  name="inicio_pt")
       */
      public function inicioPt(): Response
      {

          return $this->render('inicio_pt.html.twig');
      }

    /**
      * @Route("/que-ofrecemos",  name="ofrecemos_es")
      */
     public function queOfrecemosEs(): Response
     {

         return $this->render('que_ofrecemos_es.html.twig');
     }

     /**
       * @Route("/what-do-we-offer",  name="ofrecemos_en")
       */
      public function queOfrecemosEn(): Response
      {

          return $this->render('que_ofrecemos_en.html.twig');
      }

      /**
        * @Route("/que-oferecemos",  name="ofrecemos_pt")
        */
       public function queOfrecemosPt(): Response
       {

           return $this->render('que_ofrecemos_pt.html.twig');
       }

     /**
       * @Route("/minar-vs-comprar",  name="minarvscomprar_es")
       */
      public function minarVsComprar(): Response
      {

        return $this->render('minar_vs_comprar_es.html.twig');
      }

      /**
        * @Route("/mining-vs-buying",  name="minarvscomprar_en")
        */
       public function minarVsComprarEn(): Response
       {

         return $this->render('minar_vs_comprar_en.html.twig');
       }

       /**
         * @Route("/minerasao-vs-compra",  name="minarvscomprar_pt")
         */
        public function minarVsComprarPt(): Response
        {

          return $this->render('minar_vs_comprar_pt.html.twig');
        }

      /**
        * @Route("/rentabilidad",  name="rentabilidad_es")
        */
       public function rentabilidadEs(): Response
       {

           return $this->render('rentabilidad_es.html.twig');
       }

       /**
         * @Route("/profitability",  name="rentabilidad_en")
         */
        public function rentabilidadEn(): Response
        {

            return $this->render('rentabilidad_en.html.twig');
        }

        /**
          * @Route("/rentabilidade",  name="rentabilidad_pt")
          */
         public function rentabilidadPt(): Response
         {

             return $this->render('rentabilidad_pt.html.twig');
         }

       /**
         * @Route("/preguntas-frecuentes",  name="faq_es")
         */
        public function faqES(): Response
        {

            return $this->render('faq_es.html.twig');
        }

        /**
          * @Route("/frequent-questions",  name="faq_en")
          */
         public function faqEn(): Response
         {

             return $this->render('faq_en.html.twig');
         }

         /**
           * @Route("/perguntas-frequentes",  name="faq_pt")
           */
          public function faqPt(): Response
          {

              return $this->render('faq_pt.html.twig');
          }

          /**
            * @Route("/contacto-es",  name="contacto_es")
            */
             public function contactoEs(Request $request, MailerInterface $mailer): Response
             {

             $form = $this->createForm(ContactoType::class);

             $form->handleRequest($request);


             if($form->isSubmitted() && $form->isValid()) {

               $contactFormData = $form->getData();

               $message = (new Email())
                   ->from($contactFormData['email'])
                   ->to('info@hydrominingpy.com')
                   ->subject('SOLICITUD WEB')
                   ->text('Sender : '.$contactFormData['email'].\PHP_EOL.
                       'Nombre : '. $contactFormData['nombre'].\PHP_EOL.
                       $contactFormData['mensaje'],
                       'text/plain');
               $mailer->send($message);




               $this->addFlash('success', 'Mensaje enviado.');

               return $this->redirectToRoute('contacto_es');
             }



             return $this->render('contacto_es.html.twig', [
               'our_form' => $form->createView()
             ]);
             }

             /**
               * @Route("/contacto-en",  name="contacto_en")
               */
                public function contactoEn(Request $request, MailerInterface $mailer): Response
                {

                $form = $this->createForm(ContactoenType::class);

                $form->handleRequest($request);


                if($form->isSubmitted() && $form->isValid()) {

                  $contactFormData = $form->getData();

                  $message = (new Email())
                      ->from($contactFormData['email'])
                      ->to('info@hydrominingpy.com')
                      ->subject('SOLICITUD WEB')
                      ->text('Sender : '.$contactFormData['email'].\PHP_EOL.
                          'Nombre : '. $contactFormData['name'].\PHP_EOL.
                          $contactFormData['message'],
                          'text/plain');
                  $mailer->send($message);




                  $this->addFlash('success', 'Message sent.');

                  return $this->redirectToRoute('contacto_en');
                }



                return $this->render('contacto_en.html.twig', [
                  'our_form' => $form->createView()
                ]);
                }

                /**
                  * @Route("/contacto-pt",  name="contacto_pt")
                  */
                   public function contactoPt(Request $request, MailerInterface $mailer): Response
                   {

                   $form = $this->createForm(ContactoptType::class);

                   $form->handleRequest($request);


                   if($form->isSubmitted() && $form->isValid()) {

                     $contactFormData = $form->getData();

                     $message = (new Email())
                         ->from($contactFormData['email'])
                         ->to('info@hydrominingpy.com')
                         ->subject('SOLICITUD WEB')
                         ->text('Sender : '.$contactFormData['email'].\PHP_EOL.
                             'Nombre : '. $contactFormData['nombre'].\PHP_EOL.
                             $contactFormData['mensaje'],
                             'text/plain');
                     $mailer->send($message);




                     $this->addFlash('success', 'Mensaje enviado.');

                     return $this->redirectToRoute('contacto_pt');
                   }



                   return $this->render('contacto_pt.html.twig', [
                     'our_form' => $form->createView()
                   ]);
                   }





           /**
             * @Route("/comprar-terahash",  name="terahash_es")
             */
            public function terahashEs(): Response
            {



                return $this->render('terahash_es.html.twig');
            }



}
