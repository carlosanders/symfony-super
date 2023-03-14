<?php

namespace App\Controller;

use App\Entity\Documento;
use App\Entity\TipoDocumento;
use App\Form\DocumentoType;
use App\Repository\DocumentoRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/documento', name: 'app_documento')]
class DocumentoController extends AbstractController
{

    /**
     * @var ManagerRegistry
     */
    protected $doc;

    #[Route('/', name: 'documento_index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $documento = new Documento();
        $documento->setDescricao('desc 10');
        $documento->setNumero(12345);
        $documento->setAutor('autor 10');
        $documento->setObservacao('obs 10');

        $tipoDocumento = new TipoDocumento();
        $tipoDocumento->setNome('tipo nome 3');
        $tipoDocumento->setDescricao('tipo desc 3');

        $documento->setTipoDocumento($tipoDocumento);


        $entityManager = $doctrine->getManager();
        $entityManager->persist($tipoDocumento);
        $entityManager->persist($documento);
        $entityManager->flush();

        return $this->render('documento/index.html.twig', [
            'controller_name' => 'DocumentoController',
            'documento' => $documento,
            // 'documento' => $documento,
        ]);
    }

    #[Route('/all', name: 'documento_all')]
    public function getAll(DocumentoRepository $documentoRepository)
    {
        $all = $documentoRepository->findAll();

        return $this->render('documento/getAll.html.twig', [
            'controller_name' => 'DocumentoController',
            'documentos' => $all,
        ]);
    }


    #[Route('/documentoTeste/{id}')]
    public function show(DocumentoRepository $documentoRepository, int $id): Response
    {

        $documento = $documentoRepository->find($id);

        return $this->render('documento/show.html.twig', [
            'documento' => $documento,
        ]);
    }


    #[Route('/delete/{id}', name: 'documento_delete')]
    public function delete(DocumentoRepository $documentoRepository, int $id): Response
    {

        $documento = $documentoRepository->find($id);
        $documentoRepository->remove($documento, true);

        return $this->redirect('/documento/all');
    }

    #[Route('/edit/{id}', name: 'documento_edit')]
    public function edit(
        Request $request,
        int $id,
        DocumentoRepository $documentoRepository
    ): Response
    {


        $documento = $documentoRepository->find($id);
        $form = $this->createForm(DocumentoType::class, $documento);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $documentoRepository->save($documento, true);

            return $this->redirect('/documento/all');


        }

        return $this->render(
            'documento/_form.html.twig',
            ['form' => $form]
        );

    }

    #[Route('/novo', name: 'novo', methods: ['GET', 'POST'])]
    public function novo(Request $request, DocumentoRepository $documentoRepository): Response
    {

        $documento = new Documento();
        $form = $this->createForm(DocumentoType::class, $documento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $documentoRepository->save($documento, true);
            return $this->redirect('/documento/novo');
        }

        return $this->render('documento/_form.html.twig', [
            'form' => $form,
        ]);
    }

}