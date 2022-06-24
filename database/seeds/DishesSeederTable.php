<?php

use App\Model\Dish;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DishesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            $users_id = User::pluck('id')->toArray();
            $DishOne = new Dish();
            $DishOne -> user_id = 2;
            $DishOne->img = "https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/8AA06477-6011-4004-977C-62EA82FC1E8C/Derivates/DBD6714D-C695-4B4C-8FBD-48F707A8F72D.jpg" ;
            $DishOne->name = "Pasta al forno";
            $DishOne->description= $faker->realText(50);
            $DishOne->ingredients= "Pasta al bronzo, pomodoro, mozzarella di bufala, olive" ;
            $DishOne->price= 6.00;
            $DishOne-> save();

            $DishTwo = new Dish();
            $DishTwo -> user_id = 1;
            $DishTwo->img = "https://wips.plug.it/cips/buonissimo.org/cms/2018/11/penne-arrabbiata.jpg" ;
            $DishTwo->name = "Penne all'arrabbiata" ;
            $DishTwo->description= "Penne all'arrabbiata è tipica della cucina romana ma conosciuto ovunque in Italia e non solo. Infatti anche le penne all'arrabbiata, com'è già successo per gli spaghetti cacio e pepe, la pasta alla puttanesca e alla carbonara è un vero e proprio status symbol. Questa pasta si prepara velocemente e usando pochi e semplici ingredienti " ;
            $DishTwo->ingredients= "Penne lunghe, pomodoro, peperoncino,aglio, olio, sale, pepe" ;
            $DishTwo->price= 12.00;
            $DishTwo-> save();

            $DishThree = new Dish();
            $DishThree -> user_id = 2;
            $DishThree->img = "https://cdn.discordapp.com/attachments/985828242319618108/989897970650591332/unknown.png" ;
            $DishThree->name = "Pizza Margherita" ;
            $DishThree->description= "La pizza Margherita è la tipica pizza napoletana, condita con pomodoro, mozzarella (tradizionalmente è usato il fior di latte, non quella di bufala[1]), basilico fresco, sale e olio; è, assieme alla pizza marinara, la più popolare pizza italiana" ;
            $DishThree->ingredients= "Acqua, farina, pomodoro, mozzarella, basilico, olio, sale" ;
            $DishThree->price= 5.00;
            $DishThree-> save();

            /* $newDish = new Dish();
            $newDish->img = "https://cdn.discordapp.com/attachments/985828242319618108/989898311211319367/unknown.png" ;
            $newDish->name = "Pizza Boscaiola" ;
            $newDish->description= "La pizza alla boscaiola bianca è un soffice e goloso lievitato. E’ uno dei nostri gusti preferiti di pizza, per cui dovevamo assolutamente condividerla con voi. La preparazione è molto semplice e l’assenza del pomodoro rende la pietanza più delicata " ;
            $newDish->ingredients= "Acqua, farina,funghi,mozzarella,pomodoro,olio,sale" ;
            $newDish->price= 7.00;
            $newDish-> save();

            $newDish = new Dish();
            $newDish->img = "https://cdn.discordapp.com/attachments/985828242319618108/989898981242990592/unknown.png" ;
            $newDish->name = "Pizza fritta" ;
            $newDish->description= "Tra le prelibatezze dello street food partenopeo, insieme alle sfogliatelle, regna sovrana la pizza fritta: una versione più grande e più ricca delle tipiche pizzelle fritte " ;
            $newDish->ingredients= "Acqua, farina,pomodoro,mozzarella,olio,sale" ;
            $newDish->price= 15.00;
            $newDish-> save();

            $newDish = new Dish();
            $newDish->img = "https://cdn.discordapp.com/attachments/985828242319618108/989898981242990592/unknown.png" ;
            $newDish->name = "pizza fritta" ;
            $newDish->description= "Tra le prelibatezze dello street food partenopeo, insieme alle sfogliatelle, regna sovrana la pizza fritta: una versione più grande e più ricca delle tipiche pizzelle fritte " ;
            $newDish->ingredients= "Acqua, farina,pomodoro,mozzarella,olio,sale" ;
            $newDish->price= 15.00;
            $newDish-> save() ; */


    }
}
