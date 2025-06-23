<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Collaborateur;

class CollaborateurSeeder extends Seeder
{
    public function run()
    {
        // 5 collaborateurs non-admins
        Collaborateur::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'mail' => 'george.dupont@m2l.com',
            'poste' => 'Développeur',
            'mot_de_passe' => Hash::make('password123'),
            'pays' => 'France',
            'telephone' => '0102030405',
            'ville' => 'Paris',
            'civilite' => 'Monsieur',
            'date_naissance' => '1990-02-15',
            'photo' => null,
            'isadmin' => false,
        ]);

        Collaborateur::create([
            'nom' => 'Martin',
            'prenom' => 'Lucie',
            'mail' => 'lucie.martin@m2l.com',
            'poste' => 'Responsable marketing',
            'mot_de_passe' => Hash::make('password123'),
            'pays' => 'Belgique',
            'telephone' => '0203040506',
            'ville' => 'Bruxelles',
            'civilite' => 'Madame',
            'date_naissance' => '1985-08-25',
            'photo' => null,
            'isadmin' => false,
        ]);

        Collaborateur::create([
            'nom' => 'Durand',
            'prenom' => 'Pierre',
            'mail' => 'pierre.durand@m2l.com',
            'poste' => 'Chef de projet',
            'mot_de_passe' => Hash::make('password123'),
            'pays' => 'France',
            'telephone' => '0304050607',
            'ville' => 'Lyon',
            'civilite' => 'Monsieur',
            'date_naissance' => '1982-11-30',
            'photo' => null,
            'isadmin' => false,
        ]);

        Collaborateur::create([
            'nom' => 'Lemoine',
            'prenom' => 'Sophie',
            'mail' => 'sophie.lemoine@m2l.com',
            'poste' => 'Assistante',
            'mot_de_passe' => Hash::make('password123'),
            'pays' => 'Suisse',
            'telephone' => '0405060708',
            'ville' => 'Genève',
            'civilite' => 'Madame',
            'date_naissance' => '1992-05-10',
            'photo' => null,
            'isadmin' => false,
        ]);

        Collaborateur::create([
            'nom' => 'Bernard',
            'prenom' => 'Marc',
            'mail' => 'marc.bernard@m2l.com',
            'poste' => 'Comptable',
            'mot_de_passe' => Hash::make('password123'),
            'pays' => 'France',
            'telephone' => '0506070809',
            'ville' => 'Marseille',
            'civilite' => 'Monsieur',
            'date_naissance' => '1978-12-05',
            'photo' => null,
            'isadmin' => false,
        ]);
    }
}
