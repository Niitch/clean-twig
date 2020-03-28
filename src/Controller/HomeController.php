<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use DateTime;

class HomeController extends AbstractController
{

	private $articleRepository;
	private const NB_PAR_PAGE = 5;

	public function __construct(ArticleRepository $articleRepository)
	{
		$this->articleRepository = $articleRepository;
	}

	/**
	 * @Route("/", name="root")
	 * @Route("/home/{page}", name="home")
	 */
	public function index(int $page = 1)
	{
		/*
		$article1 = new Article();
		$article1->setTitle('Title 1');
		$article1->setSubtitle('SubTitle 1');
		$article1->setCreatedAt(new DateTime());
		$article1->setAuthor('John Doe');
		$article1->setBody('Lorem ipsum dolor sit amet');
		$article1->setImage('img/post-bg.jpg');
		
		$article2 = new Article();
		$article2->setTitle('Title 2');
		$article2->setSubtitle('SubTitle 2');
		$article2->setCreatedAt(new DateTime());
		$article2->setAuthor('John Doe');
		$article2->setBody('Lorem ipsum dolor sit amet');
		$article2->setImage('img/about-bg.jpg');

		$article3 = new Article();
		*/

		$nbArticles = $this->articleRepository->countAll();

		if ( $page < 1 )
			return $this->redirectToRoute('home', ['page' => 1]);
		if ( $page*4 > $nbArticles )
			return $this->redirectToRoute('home', ['page' => $nbArticles/4]);

		$next = $page*self::NB_PAR_PAGE < $nbArticles;
		$prev = $page != 1;

		return $this->render('home/index.html.twig', [
			'articles' => $this->articleRepository->findLasts(self::NB_PAR_PAGE, ($page-1)*self::NB_PAR_PAGE),
			'page' => $page,
			'next' => $next,
			'prev' => $prev
		]);
	}
}