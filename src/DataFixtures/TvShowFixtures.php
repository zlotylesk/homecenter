<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use App\Entity\TvShow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TvShowFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tvShow = new TvShow();
        $tvShow->setTitle('Game of Thrones');
        $tvShow->setYear(\DateTimeImmutable::createFromFormat('Y', '2011'));

        $manager->persist($tvShow);
        $manager->flush();

        $seasons = $this->dataProvider();
        foreach ($seasons as $seasonData) {
            $season = new Season();
            $season->setTvShow($tvShow);
            $season->setNumber($seasonData['number']);

            $manager->persist($season);
            $manager->flush();

            foreach ($seasonData['episodes'] as $episodeData) {
                $episode = new Episode();
                $episode->setSeason($season);
                $episode->setNumber($episodeData['number']);
                $episode->setTitle($episodeData['title']);

                $manager->persist($episode);
                $manager->flush();
            }
        }
    }

    private function dataProvider(): array
    {
        return [
            [
                'number' => 1,
                'episodes' => [
                    [
                        'number' => 1,
                        'title' => 'Winter Is Coming',
                    ],
                    [
                        'number' => 2,
                        'title' => 'The Kingsroad',
                    ],
                    [
                        'number' => 3,
                        'title' => 'Lord Snow',
                    ],
                    [
                        'number' => 4,
                        'title' => 'Cripples, Bastards, and Broken Things',
                    ],
                    [
                        'number' => 5,
                        'title' => 'The Wolf and the Lion',
                    ],
                ],
            ],
            [
                'number' => 2,
                'episodes' => [],
            ],
            [
                'number' => 3,
                'episodes' => [],
            ],
            [
                'number' => 4,
                'episodes' => [],
            ],
            [
                'number' => 5,
                'episodes' => [],
            ],
            [
                'number' => 6,
                'episodes' => [],
            ],
            [
                'number' => 7,
                'episodes' => [],
            ],
            [
                'number' => 8,
                'episodes' => [],
            ],
        ];
    }
}
