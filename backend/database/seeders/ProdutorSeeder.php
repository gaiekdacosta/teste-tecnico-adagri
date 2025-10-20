<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produtor;
use App\Models\Propriedade;
use App\Models\UnidadeProducao;
use App\Models\Rebanho;

class ProdutorSeeder extends Seeder
{
    public function run(): void
    {
        $produtores = [
            [
                'nome' => 'João da Silva',
                'cpf_cnpj' => '123.456.789-00',
                'telefone' => '(88) 99999-1234',
                'email' => 'joao.silva@email.com',
                'endereco' => 'Fazenda Boa Esperança, Zona Rural, Sobral - CE',
                'data_cadastro' => '2024-01-15',
                'propriedades' => [
                    [
                        'nome' => 'Fazenda Esperança',
                        'municipio' => 'Sobral',
                        'uf' => 'CE',
                        'inscricao_estadual' => '123456789',
                        'area_total' => 150,
                        'unidadesProducao' => [
                            [
                                'nome_cultura' => 'Laranja Pera',
                                'area_total_ha' => 50,
                                'coordenadas_geograficas' => '-3.687, -40.350',
                            ],
                            [
                                'nome_cultura' => 'Melancia Crimson Sweet',
                                'area_total_ha' => 30,
                                'coordenadas_geograficas' => '-3.690, -40.355',
                            ],
                            [
                                'nome_cultura' => 'Goiaba Paluma',
                                'area_total_ha' => 20,
                                'coordenadas_geograficas' => '-3.692, -40.352',
                            ],
                        ],
                        'rebanhos' => [
                            [
                                'especie' => 'Bovinos',
                                'quantidade' => 80,
                                'finalidade' => 'Leite',
                                'data_atualizacao' => '2025-02-10',
                            ],
                            [
                                'especie' => 'Caprinos',
                                'quantidade' => 30,
                                'finalidade' => 'Corte',
                                'data_atualizacao' => '2025-02-18',
                            ],
                            [
                                'especie' => 'Suínos',
                                'quantidade' => 50,
                                'finalidade' => 'Corte',
                                'data_atualizacao' => '2025-02-20',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'nome' => 'Maria Oliveira',
                'cpf_cnpj' => '987.654.321-00',
                'telefone' => '(88) 98888-5678',
                'email' => 'maria.oliveira@email.com',
                'endereco' => 'Sítio São José, Zona Rural, Massapê - CE',
                'data_cadastro' => '2024-02-10',
                'propriedades' => [
                    [
                        'nome' => 'Sítio São José',
                        'municipio' => 'Massapê',
                        'uf' => 'CE',
                        'inscricao_estadual' => '987654321',
                        'area_total' => 100,
                        'unidadesProducao' => [
                            [
                                'nome_cultura' => 'Feijão Carioca',
                                'area_total_ha' => 20,
                                'coordenadas_geograficas' => '-3.700, -40.400',
                            ],
                            [
                                'nome_cultura' => 'Milho Híbrido',
                                'area_total_ha' => 40,
                                'coordenadas_geograficas' => '-3.702, -40.402',
                            ],
                        ],
                        'rebanhos' => [
                            [
                                'especie' => 'Ovinos',
                                'quantidade' => 60,
                                'finalidade' => 'Corte',
                                'data_atualizacao' => '2025-03-01',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($produtores as $produtorData) {
            $produtor = Produtor::create([
                'nome' => $produtorData['nome'],
                'cpf_cnpj' => $produtorData['cpf_cnpj'],
                'telefone' => $produtorData['telefone'],
                'email' => $produtorData['email'],
                'endereco' => $produtorData['endereco'],
                'data_cadastro' => $produtorData['data_cadastro'],
            ]);

            foreach ($produtorData['propriedades'] as $propData) {
                $propriedade = Propriedade::create([
                    'nome' => $propData['nome'],
                    'municipio' => $propData['municipio'],
                    'uf' => $propData['uf'],
                    'inscricao_estadual' => $propData['inscricao_estadual'],
                    'area_total' => $propData['area_total'],
                    'produtor_id' => $produtor->id,
                ]);

                foreach ($propData['unidadesProducao'] as $upData) {
                    UnidadeProducao::create([
                        'nome_cultura' => $upData['nome_cultura'],
                        'area_total_ha' => $upData['area_total_ha'],
                        'coordenadas_geograficas' => $upData['coordenadas_geograficas'],
                        'propriedade_id' => $propriedade->id,
                    ]);
                }

                foreach ($propData['rebanhos'] as $rebData) {
                    Rebanho::create([
                        'especie' => $rebData['especie'],
                        'quantidade' => $rebData['quantidade'],
                        'finalidade' => $rebData['finalidade'],
                        'data_atualizacao' => $rebData['data_atualizacao'],
                        'propriedade_id' => $propriedade->id,
                    ]);
                }
            }
        }
    }
}
