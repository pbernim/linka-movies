<?php

use Illuminate\Database\Seeder;
use App\Movie;
use Carbon\Carbon ;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = array(
      		  [	
      			'slug' => str_slug("Transformers: The Last Knight"), 
            'poster' => 'public/1.jpg',
      			'title' => "Transformers: The Last Knight", 
      			'synopsis' => "Autobots and Decepticons are at war, with humans on the sidelines. Optimus Prime is gone. The key to saving our future lies buried in the secrets of the past, in the hidden history of Transformers on Earth.",
                  'created_at' => Carbon::now()
      		  ],
            [ 
              'slug' => str_slug("Wonder Woman"),
              'poster' => 'public/2.jpg', 
              'title' => "Wonder Woman", 
              'synopsis' => "Before she was Wonder Woman, she was Diana, princess of the Amazons, trained warrior. When a pilot crashes and tells of conflict in the outside world, she leaves home to fight a war, discovering her full powers and true destiny.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Spider-Man: Homecoming"), 
              'poster' => 'public/3.jpg',
              'title' => "Spider-Man: Homecoming", 
              'synopsis' => "Several months after the events of Captain America: Civil War, Peter Parker, with the help of his mentor Tony Stark, tries to balance his life as an ordinary high school student in Queens, New York City while fighting crime as his superhero alter ego Spider-Man as a new threat, the Vulture, emerges.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Okja"), 
              'poster' => 'public/4.jpg',
              'title' => "Okja", 
              'synopsis' => "Meet Mija, a young girl who risks everything to prevent a powerful, multi-national company from kidnapping her best friend - a fascinating animal named Okja.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Despicable Me 3"), 
              'poster' => 'public/5.jpg',
              'title' => "Despicable Me 3", 
              'synopsis' => "Gru meets his long-lost charming, cheerful, and more successful twin brother Dru who wants to team up with him for one last criminal heist.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("War for the Planet of the Apes"),
              'poster' => 'public/6.jpg', 
              'title' => "War for the Planet of the Apes", 
              'synopsis' => "After the apes suffer unimaginable losses, Caesar wrestles with his darker instincts and begins his own mythic quest to avenge his kind.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Power Rangers"),
              'poster' => 'public/7.jpg', 
              'title' => "Power Rangers", 
              'synopsis' => "A group of high-school students, who are infused with unique superpowers, harness their abilities in order to save the world.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Kong: Skull Island"), 
              'poster' => 'public/8.jpg',
              'title' => "Kong: Skull Island", 
              'synopsis' => "A team of scientists explore an uncharted island in the Pacific, venturing into the domain of the mighty Kong, and must fight to escape a primal Eden.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Justice League"), 
              'poster' => 'public/9.jpg',
              'title' => "Justice League", 
              'synopsis' => "Fueled by his restored faith in humanity and inspired by Superman's selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Life"),
              'poster' => 'public/10.jpg', 
              'title' => "Life", 
              'synopsis' => "A team of scientists aboard the International Space Station discover a rapidly evolving life form, that caused extinction on Mars, and now threatens the crew and all life on Earth.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Logan"), 
              'poster' => 'public/11.jpg',
              'title' => "Logan", 
              'synopsis' => "In the near future, a weary Logan cares for an ailing Professor X somewhere on the Mexican border. However, Logan's attempts to hide from the world and his legacy are upended when a young mutant arrives, pursued by dark forces.",
              'created_at' => Carbon::now()
            ],
            [ 
              'slug' => str_slug("Valerian and the City of a Thousand Planets"),
              'poster' => 'public/12.jpg', 
              'title' => "Valerian and the City of a Thousand Planets", 
              'synopsis' => "A dark force threatens Alpha, a vast metropolis and home to species from a thousand planets. Special operatives Valerian and Laureline must race to identify the marauding menace and safeguard not just Alpha, but the future of the universe.",
              'created_at' => Carbon::now()
            ]

          );

        foreach ($movies as $movie)
        {
            DB::table('movies')->insert($movie);
        }
        
    }
}
