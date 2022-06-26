<?php

use App\User;
use App\Model\Dish;
use App\Model\Type;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TotalSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Faker $faker)
    {
        {
            $types = [
                "Italiano",
                "Cinese",
                "Sushi",
                "Messicano",
                "Ristorante",
                "Agriturismo",
                "Pizzeria",
                "Giapponese",
                "Tailandese",
                "Vegano",
                "Steakhouse",
                "Hamburgeria",
                "Pub"
            ];

            foreach($types as $type){
                $newType = new Type();
                $newType->name_type = $type;
                $newType-> save();
            };

        }
        //ristoranti
        $newUserOne = new User();
        $newUserOne->image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnwfhQ8v3-pNPzCKAASEWGb4NOmBtjs4wTYQ&usqp=CAU";
        $newUserOne->name_restaurant = "Da Gigi";
        $newUserOne->address='Via delle stelle, 1';
        $newUserOne->vat_number=$faker->vat();
        $newUserOne->email=$faker->email();
        $newUserOne->password = Hash::make("deliveboo");
        $newUserOne->save();
        $newUserOne->types()->sync(([1,6,13]));

        $newUserTwo = new User();
        $newUserTwo-> image_url =  "https://www.ristorantedapaoloolbia.it/wp-content/uploads/ristorante-da-paolo-ingresso-esterno.jpeg";
        $newUserTwo->name_restaurant = "Da Paolo";
        $newUserTwo->address='Viale Marconi,3';
        $newUserTwo->vat_number=$faker->vat();
        $newUserTwo->email=$faker->email();
        $newUserTwo->password = Hash::make("deliveboo");
        $newUserTwo->save();
        $newUserTwo->types()->sync(([1,6,7]));

        $newUserThree = new User();
        $newUserThree-> image_url =  "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/PIZZERIA_1830.jpg/1200px-PIZZERIA_1830.jpg";
        $newUserThree->name_restaurant = "Pizzeria";
        $newUserThree->address='Via Aldo Moro,9';
        $newUserThree->vat_number=$faker->vat();
        $newUserThree->email=$faker->email();
        $newUserThree->password = Hash::make("deliveboo");
        $newUserThree->save();
        $newUserThree->types()->sync(([1,5,7]));

        $newUserFour = new User();
        $newUserFour-> image_url =  "https://img.restaurantguru.com/w550/h367/rc1f-Jin-Feng-exterior.jpg";
        $newUserFour->name_restaurant = "Da Jing Feng";
        $newUserFour->address='Via dei quarti, 125';
        $newUserFour->vat_number=$faker->vat();
        $newUserFour->email=$faker->email();
        $newUserFour->password = Hash::make("deliveboo");
        $newUserFour->save();
        $newUserFour->types()->sync(([2,3]));

        $newUserFive = new User();
        $newUserFive-> image_url =  "https://www.shinto.it/wp-content/uploads/2017/09/shinto0.jpg";
        $newUserFive->name_restaurant = "Shinto";
        $newUserFive->address=$faker->address();
        $newUserFive->vat_number=$faker->vat();
        $newUserFive->email=$faker->email();
        $newUserFive->password = Hash::make("deliveboo");
        $newUserFive->save();
        $newUserFive->types()->sync(([5,8]));

        $newUserSix = new User();
        $newUserSix-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9UnntZ2P2HQ2X012J7fZ4I9LTKJT6IS8GhA&usqp=CAU";
        $newUserSix->name_restaurant = "Taste Good Hamburgeria Italiana";
        $newUserSix->address=$faker->address();
        $newUserSix->vat_number=$faker->vat();
        $newUserSix->email=$faker->email();
        $newUserSix->password = Hash::make("deliveboo");
        $newUserSix->save();
        $newUserSix->types()->sync(([12,11]));

        $newUserSeven = new User();
        $newUserSeven-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjKKXjRYp8CYPqnlXWRJCEYGS4vTJ9iieAyg&usqp=CAU";
        $newUserSeven->name_restaurant = "Romeow Cat Bistrot";
        $newUserSeven->address=$faker->address();
        $newUserSeven->vat_number=$faker->vat();
        $newUserSeven->email=$faker->email();
        $newUserSeven->password = Hash::make("deliveboo");
        $newUserSeven->save();
        $newUserSeven->types()->sync(([5,10]));

        $newUserEight = new User();
        $newUserEight-> image_url =  "https://www.zarla.com/images/zarla-appetithai-1x1-2400x2400-20210607-7rxrrvyjqpyhtxwh4kfx.png?crop=1:1,smart&width=250&dpr=2";
        $newUserEight->name_restaurant = "Appetithai";
        $newUserEight->address=$faker->address();
        $newUserEight->vat_number=$faker->vat();
        $newUserEight->email=$faker->email();
        $newUserEight->password = Hash::make("deliveboo");
        $newUserEight->save();
        $newUserEight->types()->sync(([9,5]));

        $newUsernNine = new User();
        $newUsernNine-> image_url =  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPnoVsZxvBpNdxZoXdjAfVJKhkVSKn-QsFtw&usqp=CAU";
        $newUsernNine->name_restaurant = "Puerto Mexico";
        $newUsernNine->address=$faker->address();
        $newUsernNine->vat_number=$faker->vat();
        $newUsernNine->email=$faker->email();
        $newUsernNine->password = Hash::make("deliveboo");
        $newUsernNine->save();
        $newUsernNine->types()->sync(([9,5]));

        $newUserTen = new User();
        $newUserTen-> image_url =  "https://zurusushi.it/wp-content/uploads/2021/08/5-512x683.jpg";
        $newUserTen->name_restaurant = "Zuru sushi";
        $newUserTen->address=$faker->address();
        $newUserTen->vat_number=$faker->vat();
        $newUserTen->email=$faker->email();
        $newUserTen->password = Hash::make("deliveboo");
        $newUserTen->save();
        $newUserTen->types()->sync(([8,5]));



        //piatti
        $users_id = User::pluck('id')->toArray();
        $DishOne = new Dish();
        $DishOne->user_id = 2;
        $DishOne->img_url = "https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/ras/Assets/8AA06477-6011-4004-977C-62EA82FC1E8C/Derivates/DBD6714D-C695-4B4C-8FBD-48F707A8F72D.jpg" ;
        $DishOne->name = "Pasta al forno";
        $DishOne->description= $faker->realText(50);
        $DishOne->ingredients= "Pasta al bronzo, pomodoro, mozzarella di bufala, olive" ;
        $DishOne->price= 6.00;
        $DishOne-> save();

        $DishTwo = new Dish();
        $DishTwo->user_id = 1;
        $DishTwo->img_url  = "https://wips.plug.it/cips/buonissimo.org/cms/2018/11/penne-arrabbiata.jpg" ;
        $DishTwo->name = "Penne all'arrabbiata" ;
        $DishTwo->description= "Penne all'arrabbiata è tipica della cucina romana ma conosciuto ovunque in Italia e non solo. Infatti anche le penne all'arrabbiata, com'è già successo per gli spaghetti cacio e pepe, la pasta alla puttanesca e alla carbonara è un vero e proprio status symbol. Questa pasta si prepara velocemente e usando pochi e semplici ingredienti " ;
        $DishTwo->ingredients= "Penne lunghe, pomodoro, peperoncino,aglio, olio, sale, pepe" ;
        $DishTwo->price= 12.00;
        $DishTwo-> save();

        $DishThree = new Dish();
        $DishThree->user_id = 2;
        $DishThree->img_url  = "https://cdn.discordapp.com/attachments/985828242319618108/989897970650591332/unknown.png" ;
        $DishThree->name = "Pizza Margherita" ;
        $DishThree->description= "La pizza Margherita è la tipica pizza napoletana, condita con pomodoro, mozzarella (tradizionalmente è usato il fior di latte, non quella di bufala[1]), basilico fresco, sale e olio; è, assieme alla pizza marinara, la più popolare pizza italiana" ;
        $DishThree->ingredients= "Acqua, farina, pomodoro, mozzarella, basilico, olio, sale" ;
        $DishThree->price= 5.00;
        $DishThree-> save();

        $newDishFour = new Dish();
        $newDishFour->user_id = 3;
        $newDishFour->img_url  = "https://cdn.discordapp.com/attachments/985828242319618108/989898311211319367/unknown.jpg" ;
        $newDishFour->name = "Pizza Boscaiola" ;
        $newDishFour->description= "La pizza alla boscaiola bianca è un soffice e goloso lievitato. E’ uno dei nostri gusti preferiti di pizza, per cui dovevamo assolutamente condividerla con voi. La preparazione è molto semplice e l’assenza del pomodoro rende la pietanza più delicata " ;
        $newDishFour->ingredients= "Acqua, farina,funghi,mozzarella,pomodoro,olio,sale" ;
        $newDishFour->price= 7.00;
        $newDishFour-> save();

        $newDishFive = new Dish();
        $newDishFive->user_id = 1;
        $newDishFive->img_url  = "https://bit.ly/3tTJSDb";
        $newDishFive->name = 'Carciofi e patate in padella';
        $newDishFive->description = 'I carciofi e patate in padella portano in tavola un contorno tanto semplice quanto gustoso che promette di piacere proprio a tutti';
        $newDishFive->ingredients = 'carciofi, patate, aglio, prezzemolo, olio extravergine di oliva, pepe';
        $newDishFive->price = 8.00;
        $newDishFive-> save();


        $newDishSix = new Dish();
        $newDishSix->user_id = 2;
        $newDishSix->img_url  = "https://bit.ly/3enxWTp";
        $newDishSix->name = 'Tortellini alla panna';
        $newDishSix->description = 'Piatto molto goloso, che piace a grandi e piccini';
        $newDishSix->ingredients = 'tortellini, panna fresca, olio di oliva, noce moscata, pepe nero, parmigiano grattugiato';
        $newDishSix->price = 7.50;
        $newDishSix-> save();


        $newDishSeven = new Dish();
        $newDishSeven->user_id = 5;
        $newDishSeven->img_url  = "https://bit.ly/3avN4wY";
        $newDishSeven->name = 'Spaghetti con pesce e zucchine';
        $newDishSeven->description = 'Gli spaghetti con pesce e zucchine presentano una combinazione “mare e monti” per nulla scontata: gamberi, merluzzo, pesce spada e zucchine';
        $newDishSeven->ingredients = 'spaghetti, zucchine, gamberi, merluzzo, pesce spada, cipolla, aglio, vino bianco, olio d\'oliva, erbe aromatiche, pepe';
        $newDishSeven->price = 10.50;
        $newDishSeven-> save();

        $newDishEight = new Dish();
        $newDishEight->user_id = 4;
        $newDishEight->img_url  = "https://bit.ly/2PeAZ80";
        $newDishEight->name = 'Wanton fritti';
        $newDishEight->description = 'I wanton fritti o wonton nella versione italianizzata, sono dei fagottini ripieni di origine cinese che hanno conquistato gli amanti della cucina orientale';
        $newDishEight->ingredients = 'macinato di maiale, gamberi, cipollotti, zenzero, aceto di riso, salsa di soia, amido di mais, olio di semi';
        $newDishEight->price = 13.90;
        $newDishEight-> save();

        $newDishNine = new Dish();
        $newDishNine->user_id = 7;
        $newDishNine->img_url  = "https://images.fidhouse.com/fidelitynews/wp-content/uploads/sites/6/2017/02/1487583797_ba19374375abc0d4ed0c015012a29b699d64444f-351429806.jpg?w=580";
        $newDishNine->name = 'Riso rosso al mango cocco con verdure saltate al peperoncino e lime';
        $newDishNine->description = $faker->realText(50);;
        $newDishNine->ingredients = 'Riso rosso, mango, cocco, verdure saltate, peperoncino, lime';
        $newDishNine->price = 20.90;
        $newDishNine-> save();

        $newDishTen = new Dish();
        $newDishTen->user_id = 6;
        $newDishTen->img_url  = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsBj0XDvY4rXFdYv4rWzopKtcgrA-ICJOIag&usqp=CAU";
        $newDishTen->name = 'Hamburger di Chianina';
        $newDishTen->description = $faker->realText(50);;
        $newDishTen->ingredients = 'hamburger di carne preparati con polpa di manzo, mollica di pane e pochi altri ingredienti, per un secondo piatto cotto in padella sano e veloce.';
        $newDishTen->price = 11.00;
        $newDishTen-> save();

        $newDishEleven = new Dish();
        $newDishEleven->user_id = 8;
        $newDishEleven->img_url  = "https://viaggimondo.it/wp-content/uploads/2020/02/Khao-Soi-e1580842899532.jpg";
        $newDishEleven->name = 'Pad Thai';
        $newDishEleven->description = "l Pad Thai è il numero uno dei piatti thailandesi nel mondo. Somiglia soltanto in apparenza a un piatto classico giapponese: stesse tagliatelle di riso, stesso condimento a base di salsa di pesce, ma tutto finisce lì.";
        $newDishEleven->ingredients = 'riso, pesce vario, sale, pepe, peperoncino, aglio';
        $newDishEleven->price = 11.00;
        $newDishEleven-> save();

        $newDishTwelve = new Dish();
        $newDishTwelve->user_id = 9;
        $newDishTwelve->img_url  = "https://cdn.discordapp.com/attachments/985828242319618108/989902682598809670/unknown.png";
        $newDishTwelve->name = 'Rotolini di tortillas farciti con pollo, sugo di pomodoro, formaggio, peperoncini e panna acida';
        $newDishTwelve->description = "Le enchiladas sono un piatto tradizionale, le prime tracce di questa ricetta  risalgono alla prima metà dell’800 e tutt’ora è una preparazioni diffusa non solo in Messico ma in tutta l’America Latina.";
        $newDishTwelve->ingredients = 'pollo, sugo di pomodoro, formaggio, peperoncini e panna acida';
        $newDishTwelve->price = 19.80;
        $newDishTwelve-> save();

        $newDishThirteen = new Dish();
        $newDishThirteen->user_id = 10;
        $newDishThirteen->img_url  = "https://d2vwsr3mua7yp8.cloudfront.net/81ef9b8d-8749-4f9c-bb72-90a40e6c73c8.jpg";
        $newDishThirteen->name = 'GYOZA AL VAPORE';
        $newDishThirteen->description = "Ravioli di farina di grano ripieno con verdure e carne";
        $newDishThirteen->ingredients = 'pomodoro, peperoncino, aglio, sale, carne mista,farina di grano macinata a freddo';
        $newDishThirteen->price = 7.50;
        $newDishThirteen-> save();
    }
}




