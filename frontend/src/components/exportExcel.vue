<template>
    <button @click="exportExcel"
        class="bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg hover:bg-green-700 transition-all duration-200 flex items-center gap-2 font-semibold hover:shadow-xl">
        <i class="pi pi-file-excel"></i>
        Exportar Excel
    </button>
</template>

<script>
import * as XLSX from "xlsx"

export default {
    name: "ExportExcel",
    props: {
        produtores: {
            type: Array,
            required: true,
            default: () => [] 
        }
    },
    data() {
        return {

        }
    },
    computed: {},
    methods: {
        exportExcel() {
            if (!this.produtores || this.produtores.length === 0) {
                alert('Não há dados para exportar!')
                return
            }

            const data = []
            this.produtores.forEach(p => {
                p.propriedades.forEach(prop => {
                    prop.unidadesProducao.forEach(up => {
                        prop.rebanhos.forEach(r => {
                            data.push({
                                Produtor: p.nome,
                                CPF_CNPJ: p.cpf_cnpj,
                                Telefone: p.telefone,
                                Email: p.email,
                                Endereço: p.endereco,
                                Propriedade: prop.nome,
                                Município: prop.municipio,
                                UF: prop.uf,
                                Área_Total_ha: prop.area_total,
                                Cultura: up.nome_cultura,
                                Área_Cultura_ha: up.area_total_ha,
                                Coordenadas: up.coordenadas_geograficas,
                                Espécie: r.especie,
                                Quantidade: r.quantidade,
                                Finalidade: r.finalidade,
                                Atualização: r.data_atualizacao,
                            })
                        })
                    })
                })
            })

            if (data.length === 0) {
                alert('Não há dados válidos para exportar!')
                return
            }

            const ws = XLSX.utils.json_to_sheet(data)
            const wb = XLSX.utils.book_new()
            XLSX.utils.book_append_sheet(wb, ws, "Relatório Produtores")
            XLSX.writeFile(wb, "relatorio_produtores.xlsx")
        },
    }
}
</script>