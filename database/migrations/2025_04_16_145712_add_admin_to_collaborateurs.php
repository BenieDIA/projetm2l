<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddAdminToCollaborateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ajout de l'administrateur
        DB::table('collaborateurs')->insert([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'mail' => 'jean.dupont@m2l.com',
            'poste' => 'Administrateur',
            'mot_de_passe' => bcrypt('adminpassword'),  // Le mot de passe crypté
            'pays' => 'France',
            'telephone' => '0123456789',
            'ville' => 'Paris',
            'civilite' => 'Monsieur',
            'date_naissance' => '1985-05-10',
            'photo' => NULL,
            'isadmin' => true, // L'utilisateur est un admin
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Suppression de l'utilisateur admin
        DB::table('collaborateurs')->where('mail', 'jean.dupont@m2l.com')->delete();
    }
}
