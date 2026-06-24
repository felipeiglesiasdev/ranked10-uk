<?php

// PARA RESETAR E REPOVOAR O BANCO INTEIRO: php artisan migrate:fresh --seed
// PARA RODAR UMA LISTA ESPECIFICA SEM DROPAR O BANCO:
//   php artisan db:seed --class="Database\Seeders\Lists\PortableBlendersSeeder"

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents; // DESATIVA EVENTOS DE MODEL DURANTE O SEED
use Illuminate\Database\Seeder; // IMPORTA A CLASSE BASE DOS SEEDERS

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents; // EVITA DISPARAR OBSERVERS/EVENTOS DURANTE O SEED

    public function run(): void // APENAS REGISTRA OS SEEDERS DE LISTA (SEM DADOS HARDCODED)
    {
        $this->call([ // CHAMA CADA SEEDER DE LISTA EM ORDEM
            \Database\Seeders\Lists\PortableBlendersSeeder::class, // LISTA DE LIQUIDIFICADORES PORTATEIS (KITCHEN)
            // ADICIONE NOVAS LISTAS AQUI, UMA POR LINHA, CONFORME FOREM CRIADAS
        ]);
    }
}
