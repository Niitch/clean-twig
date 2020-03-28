<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController
{
	/**
	 * @Route("/hello/{name}", name="hello")
	 */
	public function index(Request $req /* string $name // */)
	{
		$user = new class{};
		$user->name = $req->get('name'); // $name
		$user->place = "lens";

		return $this->render("hello/index.html.twig", [
			"user" => $user
		]);
	}
}
