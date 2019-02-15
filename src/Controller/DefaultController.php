<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    const TYPE_DAMAGE = 'damage';
    const TYPE_HEAL = 'heal';
    const TYPE_TANK = 'tank';
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $heroes = [
            [
                'name' => 'cra',
                'type' => [self::TYPE_DAMAGE]
            ],
            [
                'name' => 'cra2',
                'type' => [self::TYPE_DAMAGE]
            ],
            [
                'name' => 'eniripsa',
                'type' => [self::TYPE_HEAL]
            ],
            [
                'name' => 'osamodas',
                'type' => [self::TYPE_DAMAGE]
            ],
            [
                'name' => 'osamodas2',
                'type' => [self::TYPE_TANK]
            ],
            [
                'name' => 'osamodas3',
                'type' => [self::TYPE_HEAL]
            ],
            [
                'name' => 'sacrieur',
                'type' => [self::TYPE_DAMAGE, self::TYPE_TANK]
            ],
            [
                'name' => 'sacrieur2',
                'type' => [self::TYPE_TANK, self::TYPE_HEAL]
            ],
            [
                'name' => 'scram',
                'type' => [self::TYPE_DAMAGE]
            ],
            [
                'name' => 'scram2',
                'type' => [self::TYPE_TANK]
            ],
            [
                'name' => 'scram3',
                'type' => [self::TYPE_DAMAGE]
            ]
        ];

        shuffle($heroes);

        return $this->render('default/index.html.twig', [
            'heroes' => $heroes,
            'types' => [self::TYPE_DAMAGE, self::TYPE_TANK, self::TYPE_HEAL]
        ]);
    }
}
