<?php

class EntryTableSeeder extends Seeder {

  public function run() {
    DB::table('entries')->delete();

    copy('app/database/seeds/pictures/1.jpg', 'app/database/seeds/pictures/1b.jpg');
    copy('app/database/seeds/pictures/2.jpg', 'app/database/seeds/pictures/2b.jpg');
    copy('app/database/seeds/pictures/3.jpg', 'app/database/seeds/pictures/3b.jpg');
    copy('app/database/seeds/pictures/4.jpg', 'app/database/seeds/pictures/4b.jpg');

    Entry::create([ 'title'        => 'Ta mère',
                    'content'      => "Ta mère est une société montoise qui n'a pas froid aux yeux. C'est pour ça qu'on la met ici.",
                    'author_name'  => 'François Stephany',
                    'author_email' => 'tulipe.moutarde@gmail.com',
                    'kind'         => 'article',
                    'picture'      => 'app/database/seeds/pictures/1b.jpg' ]);

    Entry::create([ 'title'        => 'Ta soeur',
                    'content'      => "Et ta soeur ? Disent-ils tous ! Et ils ont bien raison !",
                    'author_name'  => 'Aurélien Malisart',
                    'author_email' => 'aurelien.malisart@gmail.com',
                    'kind'         => 'article',
                    'picture'      => 'app/database/seeds/pictures/2b.jpg' ]);

    Entry::create([ 'title'        => 'Un événement',
                    'content'      => "Super pechakucha créatif à Mons avec l'aide de CreativeMons et des Rendez-vous des pixelsfestival!",
                    'author_name'  => 'Romain Carlier',
                    'author_email' => 'romain.carlier@gmail.com',
                    'kind'         => 'event',
                    'picture'      => 'app/database/seeds/pictures/3b.jpg' ]);

    Entry::create([ 'title'        => 'Ton frère',
                    'content'      => "Frère Jacques, frère Jacques, dormez-vous ? Dormez-vous ? Sonnez les matines, sonnez les matines, ding dang dong",
                    'author_name'  => 'Michaël Hoste',
                    'author_email' => 'michael.hoste@gmail.com',
                    'kind'         => 'article',
                    'picture'      => 'app/database/seeds/pictures/4b.jpg' ]);
  }

}
