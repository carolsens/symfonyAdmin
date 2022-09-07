<?php

namespace App\Controller;

use App\Entity\Banner;
use App\Form\BannerType;
use App\Repository\BannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/banner')]
class BannerController extends AbstractController
{
    #[Route('/', name: 'app_banner_index', methods: ['GET'])]
    public function index(BannerRepository $bannerRepository): Response
    {
        return $this->render('admin/banner/index.html.twig', [
            'banners' => $bannerRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_banner_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BannerRepository $bannerRepository): Response
    {
        $banner = new Banner();
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bannerRepository->add($banner, true);

            return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/banner/new.html.twig', [
            'banner' => $banner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_banner_show', methods: ['GET'])]
    public function show(Banner $banner): Response
    {
        return $this->render('admin/banner/show.html.twig', [
            'banner' => $banner,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_banner_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Banner $banner, BannerRepository $bannerRepository): Response
    {
        $form = $this->createForm(BannerType::class, $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bannerRepository->add($banner, true);

            return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/banner/edit.html.twig', [
            'banner' => $banner,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_banner_delete', methods: ['POST'])]
    public function delete(Request $request, Banner $banner, BannerRepository $bannerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banner->getId(), $request->request->get('_token'))) {
            $bannerRepository->remove($banner, true);
        }

        return $this->redirectToRoute('app_banner_index', [], Response::HTTP_SEE_OTHER);
    }
}
