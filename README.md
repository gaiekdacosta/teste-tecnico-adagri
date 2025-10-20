# Sistema Agropecuário - Teste Técnico

Sistema completo de gestão agropecuária desenvolvido com Laravel (backend) e Vue 3 (frontend).

## 🚀 Tecnologias

- **Backend**: Laravel 10+, API RESTful
- **Frontend**: Vue 3 + TypeScript + Vite
- **Banco de Dados**: PostgreSQL
- **UI Framework**: PrimeVue + Tailwind CSS
- **Exportação**: Excel (.xlsx) e PDF

## 📋 Funcionalidades

### CRUD Completo
- ✅ Produtor Rural
- ✅ Propriedade
- ✅ Unidade de Produção
- ✅ Rebanho

### Relatórios e Exportações
- ✅ Exportar propriedades em Excel
- ✅ Exportar rebanhos por produtor em PDF
- ✅ Relatórios consolidados:
  - Total de propriedades por município
  - Animais por espécie
  - Hectares por cultura

### Filtros e Listagens
- ✅ Listagens com paginação
- ✅ Filtros avançados
- ✅ Dashboard com gráficos

## 🛠️ Instalação e Execução

### Pré-requisitos
- Docker e Docker Compose
- Git

### Passos para execução

1. **Clone o repositório**
```bash
git clone <url-do-repositorio>
cd sistema-agropecuario
```

2. **Configure o ambiente**
```bash
cp .env.example .env
```

3. **Execute com Docker**
```bash
docker-compose up -d
```

4. **Instale as dependências**
```bash
# Backend
docker-compose exec app composer install

# Frontend  
docker-compose exec app npm install
```

5. **Configure a aplicação**
```bash
# Gerar chave da aplicação
docker-compose exec app php artisan key:generate

# Executar migrations e seeders
docker-compose exec app php artisan migrate --seed

# Compilar assets do frontend
docker-compose exec app npm run build
```

6. **Acesse a aplicação**
```
Frontend: http://localhost:5173
Backend API: http://localhost:8080
```

## 📊 Estrutura do Banco

### Entidades Principais
- **Produtor Rural**: nome, cpf_cnpj, telefone, email, endereço, data_cadastro
- **Propriedade**: nome, município, UF, inscrição estadual, área total
- **Unidade de Produção**: nome_cultura, area_total_ha, coordenadas_geograficas  
- **Rebanho**: espécie, quantidade, finalidade, data_atualizacao

### Relacionamentos
- 1 Produtor → N Propriedades
- 1 Propriedade → N Unidades de Produção
- 1 Propriedade → N Rebanhos

## 🧪 Dados de Exemplo

O sistema inclui dados de exemplo para:

**Espécies**: Suínos, Caprinos, Bovinos  
**Culturas**: Laranja Pera, Melancia Crimson Sweet, Goiaba Paluma


### Itens Incluídos
- ✅ Código fonte completo
- ✅ Instruções de instalação
- ✅ Exemplos de relatórios exportados

## 👨‍💻 Observações do Projeto

- Sistema desenvolvido seguindo boas práticas de desenvolvimento
- API RESTful com documentação completa
- Interface responsiva e intuitiva
- Performance otimizada para grandes volumes de dados

## 📃
[relatorio_produtores.pdf](https://github.com/user-attachments/files/22994625/relatorio_produtores.pdf)
[relatorio_produtores.xlsx](https://github.com/user-attachments/files/22994617/relatorio_produtores.xlsx)

## Disclaimer
**Peço perdão pela demora e falta de alguns requisitos do projeto, o meu PC teve problema no SSD no dia 17/10, acabei perdendo todo o meu progesso e fiz praticamente tudo do zero em 2 dias.**