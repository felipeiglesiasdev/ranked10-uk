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
            \Database\Seeders\Lists\PortableFansSeeder::class, // LISTA DE VENTILADORES PORTATEIS (HOME)
            \Database\Seeders\Lists\WorkoutTankTopsSeeder::class, // LISTA DE REGATAS DE TREINO FEMININAS (FITNESS)
            \Database\Seeders\Lists\AndroidPhonesSeeder::class, // LISTA DE SMARTPHONES ANDROID (TECH)
            \Database\Seeders\Lists\SpinMopsSeeder::class, // LISTA DE SPIN MOPS (HOME)
            \Database\Seeders\Lists\MicroSDCardsSeeder::class, // LISTA DE CARTOES MICROSD 256GB (TECH)
            \Database\Seeders\Lists\PcSpeakersSeeder::class, // LISTA DE CAIXAS DE SOM PARA PC (HOME & OFFICE)
            \Database\Seeders\Lists\RetractableGardenHoseSeeder::class, // LISTA DE MANGUEIRAS RETRATEIS DE JARDIM (GARDEN)
            \Database\Seeders\Lists\CatToysSeeder::class, // LISTA DE BRINQUEDOS PARA GATOS (PET SUPPLIES)
            \Database\Seeders\Lists\SolarPoolIonizerSeeder::class, // LISTA DE IONIZADORES SOLARES PARA PISCINA (GARDEN)
            \Database\Seeders\Lists\Smart4kProjectorSeeder::class, // LISTA DE PROJETORES SMART 4K (TECH)
            \Database\Seeders\Lists\GamingMonitors27Seeder::class, // LISTA DE MONITORES GAMER DE 27 POLEGADAS (TECH)
            \Database\Seeders\Lists\GamingKeyboardsSeeder::class, // LISTA DE TECLADOS GAMER (TECH)
            \Database\Seeders\Lists\MicroSD128Seeder::class, // LISTA DE CARTOES MICROSD 128GB (TECH)
            \Database\Seeders\Lists\MicroSD64Seeder::class, // LISTA DE CARTOES MICROSD 64GB (TECH)
            \Database\Seeders\Lists\PS5SsdSeeder::class, // LISTA DE SSDs NVMe 2TB PARA PS5 (TECH)
            \Database\Seeders\Lists\DehumidifiersSeeder::class, // LISTA DE DESUMIDIFICADORES (HOME)
            \Database\Seeders\Lists\HeatedClothesAirersSeeder::class, // LISTA DE VARAIS AQUECIDOS (HOME)
            \Database\Seeders\Lists\CordlessLeafBlowersSeeder::class, // LISTA DE SOPRADORES DE FOLHAS A BATERIA (GARDEN)
            \Database\Seeders\Lists\SelfCleaningLitterBoxesSeeder::class, // LISTA DE CAIXAS DE AREIA AUTOLIMPANTES (PET SUPPLIES)
            \Database\Seeders\Lists\StandingDesksSeeder::class, // LISTA DE MESAS DE ALTURA REGULAVEL (HOME & OFFICE)
            \Database\Seeders\Lists\GamingMiceSeeder::class, // LISTA DE MOUSES GAMER (TECH)
            \Database\Seeders\Lists\ElectricBlanketsSeeder::class, // LISTA DE COBERTORES ELETRICOS (HOME)
            \Database\Seeders\Lists\AdjustableDumbbellsSeeder::class, // LISTA DE HALTERES AJUSTAVEIS (FITNESS)
            \Database\Seeders\Lists\AutomaticCatFeedersSeeder::class, // LISTA DE ALIMENTADORES AUTOMATICOS (PET SUPPLIES)
            \Database\Seeders\Lists\PaperShreddersSeeder::class, // LISTA DE FRAGMENTADORAS DE PAPEL (HOME & OFFICE)
            \Database\Seeders\Lists\WaterFilterJugsSeeder::class, // LISTA DE JARRAS COM FILTRO (KITCHEN)
            \Database\Seeders\Lists\MassageGunsSeeder::class, // LISTA DE PISTOLAS DE MASSAGEM (FITNESS)
            \Database\Seeders\Lists\OilFilledRadiatorsSeeder::class, // LISTA DE RADIADORES A OLEO (HOME)
            \Database\Seeders\Lists\VacuumSealersSeeder::class, // LISTA DE SELADORAS A VACUO (KITCHEN)
            \Database\Seeders\Lists\PowerBanksSeeder::class, // LISTA DE POWER BANKS (TECH)
            \Database\Seeders\Lists\HumidifiersSeeder::class, // LISTA DE UMIDIFICADORES (HOME)
            \Database\Seeders\Lists\FoodDehydratorsSeeder::class, // LISTA DE DESIDRATADORES DE ALIMENTOS (KITCHEN)
            \Database\Seeders\Lists\MonitorArmsSeeder::class, // LISTA DE BRACOS DE MONITOR (HOME & OFFICE)
            \Database\Seeders\Lists\DashCamsSeeder::class, // LISTA DE DASH CAMS (TECH)
            \Database\Seeders\Lists\SousVideCookersSeeder::class, // LISTA DE CIRCULADORES SOUS VIDE (KITCHEN)
            \Database\Seeders\Lists\CatWaterFountainsSeeder::class, // LISTA DE FONTES DE AGUA PARA GATO (PET SUPPLIES)
            \Database\Seeders\Lists\PressureWashersSeeder::class, // LISTA DE LAVADORAS DE ALTA PRESSAO (GARDEN)
            \Database\Seeders\Lists\SmartScalesSeeder::class, // LISTA DE BALANCAS INTELIGENTES (FITNESS)
            \Database\Seeders\Lists\SteamMopsSeeder::class, // LISTA DE MOPS A VAPOR (HOME)
            \Database\Seeders\Lists\CoffeeGrindersSeeder::class, // LISTA DE MOEDORES DE CAFE (KITCHEN)
            // ADICIONE NOVAS LISTAS AQUI, UMA POR LINHA, CONFORME FOREM CRIADAS
        ]);
    }
}
