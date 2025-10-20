export const Produtores = [
    {
        id: 1,
        nome: "João da Silva",
        cpf_cnpj: "123.456.789-00",
        telefone: "(88) 99999-1234",
        email: "joao.silva@email.com",
        endereco: "Fazenda Boa Esperança, Zona Rural, Sobral - CE",
        data_cadastro: "2024-01-15",
        propriedades: [
            {
                id: 1,
                nome: "Fazenda Esperança",
                municipio: "Sobral",
                uf: "CE",
                inscricao_estadual: "123456789",
                area_total: 150,
                unidadesProducao: [
                    {
                        nome_cultura: "Laranja Pera",
                        area_total_ha: 50,
                        coordenadas_geograficas: "-3.687, -40.350",
                    },
                    {
                        nome_cultura: "Melancia Crimson Sweet",
                        area_total_ha: 30,
                        coordenadas_geograficas: "-3.690, -40.355",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 20,
                        coordenadas_geograficas: "-3.692, -40.352",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Bovinos",
                        quantidade: 80,
                        finalidade: "Leite",
                        data_atualizacao: "2025-02-10",
                    },
                    {
                        especie: "Caprinos",
                        quantidade: 30,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-18",
                    },
                    {
                        especie: "Suínos",
                        quantidade: 50,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-20",
                    },
                ],
            },
        ],
    },
    {
        id: 2,
        nome: "Maria Santos Oliveira",
        cpf_cnpj: "987.654.321-00",
        telefone: "(85) 98888-5678",
        email: "maria.oliveira@email.com",
        endereco: "Sítio São José, Distrito de Pajeú, Crato - CE",
        data_cadastro: "2023-11-20",
        propriedades: [
            {
                id: 2,
                nome: "Sítio São José",
                municipio: "Crato",
                uf: "CE",
                inscricao_estadual: "987654321",
                area_total: 85,
                unidadesProducao: [
                    {
                        nome_cultura: "Laranja Pera",
                        area_total_ha: 30,
                        coordenadas_geograficas: "-7.234, -39.409",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 15,
                        coordenadas_geograficas: "-7.236, -39.412",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Suínos",
                        quantidade: 120,
                        finalidade: "Corte",
                        data_atualizacao: "2025-01-15",
                    },
                    {
                        especie: "Caprinos",
                        quantidade: 40,
                        finalidade: "Leite",
                        data_atualizacao: "2025-02-20",
                    },
                ],
            },
        ],
    },
    {
        id: 3,
        nome: "Antônio Ferreira Lima",
        cpf_cnpj: "12.345.678/0001-90",
        telefone: "(88) 97777-4321",
        email: "antonio.lima@email.com",
        endereco: "Fazenda Verde Vale, Zona Rural, Juazeiro do Norte - CE",
        data_cadastro: "2024-03-10",
        propriedades: [
            {
                id: 3,
                nome: "Fazenda Verde Vale",
                municipio: "Juazeiro do Norte",
                uf: "CE",
                inscricao_estadual: "456789123",
                area_total: 200,
                unidadesProducao: [
                    {
                        nome_cultura: "Melancia Crimson Sweet",
                        area_total_ha: 80,
                        coordenadas_geograficas: "-7.210, -39.315",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 35,
                        coordenadas_geograficas: "-7.215, -39.320",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Bovinos",
                        quantidade: 150,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-05",
                    },
                    {
                        especie: "Suínos",
                        quantidade: 60,
                        finalidade: "Corte",
                        data_atualizacao: "2025-01-30",
                    },
                ],
            },
        ],
    },
    {
        id: 4,
        nome: "Francisco Almeida Costa",
        cpf_cnpj: "456.789.123-00",
        telefone: "(88) 96666-7890",
        email: "francisco.costa@email.com",
        endereco: "Chácara Bom Jesus, Povoado Caldeirão, Barbalha - CE",
        data_cadastro: "2023-08-05",
        propriedades: [
            {
                id: 4,
                nome: "Chácara Bom Jesus",
                municipio: "Barbalha",
                uf: "CE",
                inscricao_estadual: "321654987",
                area_total: 60,
                unidadesProducao: [
                    {
                        nome_cultura: "Laranja Pera",
                        area_total_ha: 15,
                        coordenadas_geograficas: "-7.311, -39.304",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 10,
                        coordenadas_geograficas: "-7.313, -39.306",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Caprinos",
                        quantidade: 65,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-12",
                    },
                    {
                        especie: "Bovinos",
                        quantidade: 45,
                        finalidade: "Leite",
                        data_atualizacao: "2025-02-25",
                    },
                ],
            },
        ],
    },
    {
        id: 5,
        nome: "Ana Paula Rodrigues",
        cpf_cnpj: "789.123.456-00",
        telefone: "(85) 95555-2468",
        email: "ana.rodrigues@email.com",
        endereco: "Fazenda Nova Aliança, Zona Rural, Quixadá - CE",
        data_cadastro: "2024-02-28",
        propriedades: [
            {
                id: 5,
                nome: "Fazenda Nova Aliança",
                municipio: "Quixadá",
                uf: "CE",
                inscricao_estadual: "654987321",
                area_total: 180,
                unidadesProducao: [
                    {
                        nome_cultura: "Melancia Crimson Sweet",
                        area_total_ha: 100,
                        coordenadas_geograficas: "-4.978, -39.015",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 45,
                        coordenadas_geograficas: "-4.981, -39.018",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Bovinos",
                        quantidade: 200,
                        finalidade: "Leite",
                        data_atualizacao: "2025-02-08",
                    },
                    {
                        especie: "Suínos",
                        quantidade: 80,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-15",
                    },
                ],
            },
        ],
    },
    {
        id: 6,
        nome: "Carlos Eduardo Martins",
        cpf_cnpj: "23.456.789/0001-50",
        telefone: "(88) 94444-1357",
        email: "carlos.martins@email.com",
        endereco: "Sítio Esperança, Distrito de Aracatiaçu, Sobral - CE",
        data_cadastro: "2023-12-12",
        propriedades: [
            {
                id: 6,
                nome: "Sítio Esperança",
                municipio: "Sobral",
                uf: "CE",
                inscricao_estadual: "789123456",
                area_total: 95,
                unidadesProducao: [
                    {
                        nome_cultura: "Laranja Pera",
                        area_total_ha: 30,
                        coordenadas_geograficas: "-3.695, -40.360",
                    },
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 25,
                        coordenadas_geograficas: "-3.698, -40.362",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Caprinos",
                        quantidade: 85,
                        finalidade: "Leite",
                        data_atualizacao: "2025-02-22",
                    },
                    {
                        especie: "Suínos",
                        quantidade: 100,
                        finalidade: "Corte",
                        data_atualizacao: "2025-02-28",
                    },
                ],
            },
            {
                id: 7,
                nome: "Fazenda São José",
                municipio: "Massapê",
                uf: "CE",
                inscricao_estadual: "987654321",
                area_total: 200,
                unidadesProducao: [
                    {
                        nome_cultura: "Goiaba Paluma",
                        area_total_ha: 70,
                        coordenadas_geograficas: "-3.525, -40.342",
                    },
                    {
                        nome_cultura: "Laranja Pera",
                        area_total_ha: 40,
                        coordenadas_geograficas: "-3.530, -40.345",
                    },
                ],
                rebanhos: [
                    {
                        especie: "Bovinos",
                        quantidade: 120,
                        finalidade: "Corte",
                        data_atualizacao: "2025-03-01",
                    },
                ],
            },
        ],
    },
];