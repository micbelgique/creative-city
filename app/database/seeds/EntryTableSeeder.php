<?php

class EntryTableSeeder extends Seeder {

  public function run() {
    DB::table('entries')->delete();
    $entry = Entry::create([ 'title'        => 'Ta mère',
                             'content'      => "Ta mère est une société montoise qui n'a pas froid aux yeux. C'est pour ça qu'on la met ici.",
                             'author_name'  => 'François Stephany',
                             'author_email' => 'tulipe.moutarde@gmail.com',
                             'kind'         => 'article' ]);

    copy('app/database/seeds/pictures/1.jpg', 'app/database/seeds/pictures/1b.jpg');
    $entry->picture = 'app/database/seeds/pictures/1b.jpg';
    $entry->save();

    $entry = Entry::create([ 'title'        => 'Ta soeur',
                             'content'      => "Et ta soeur ? Disent-ils tous ! Et ils ont bien raison !",
                             'author_name'  => 'Aurélien Malisart',
                             'author_email' => 'aurelien.malisart@gmail.com',
                             'kind'         => 'article' ]);

    copy('app/database/seeds/pictures/2.jpg', 'app/database/seeds/pictures/2b.jpg');
    $entry->picture = 'app/database/seeds/pictures/2b.jpg';
    $entry->save();

    $entry = Entry::create([ 'title'        => 'Ton frère',
                             'content'      => "Frère Jacques, frère Jacques, dormez-vous ? Dormez-vous ? Sonnez les matines, sonnez les matines, ding dang dong",
                             'author_name'  => 'Michaël Hoste',
                             'author_email' => 'michael.hoste@gmail.com',
                             'kind'         => 'article' ]);

    copy('app/database/seeds/pictures/3.jpg', 'app/database/seeds/pictures/3b.jpg');
    $entry->picture = 'app/database/seeds/pictures/3b.jpg';
    $entry->save();
  }

}
