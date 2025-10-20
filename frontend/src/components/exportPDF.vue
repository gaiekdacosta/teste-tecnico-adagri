<template>
    <button @click="exportPDF"
        class="bg-red-500 text-white px-6 py-3 rounded-xl shadow-lg hover:bg-red-600 transition-all duration-200 flex items-center gap-2 font-semibold hover:shadow-xl">
        <i class="pi pi-file-pdf"></i>
        Exportar PDF
    </button>
</template>

<script>
import jsPDF from "jspdf"
import autoTable from 'jspdf-autotable'

export default {
    name: "ExportPDF",
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
        exportPDF() {
            try {
                // CORREÇÃO: usar this.produtores em vez de this.produtoresFiltrados
                if (!this.produtores || this.produtores.length === 0) {
                    alert("Nenhum dado disponível para exportar.")
                    return
                }

                const doc = new jsPDF({ orientation: "landscape", unit: "pt", format: "a4" })
                doc.setFontSize(16)
                doc.text("Relatório de Produtores Rurais", 40, 40)

                const rows = []
                // CORREÇÃO: usar this.produtores em vez de this.produtoresFiltrados
                this.produtores.forEach(p => {
                    // Adicionar verificações de segurança
                    if (p.propriedades) {
                        p.propriedades.forEach(prop => {
                            if (prop.unidadesProducao && prop.rebanhos) {
                                prop.unidadesProducao.forEach(up => {
                                    prop.rebanhos.forEach(r => {
                                        rows.push([
                                            p.nome || '-',
                                            prop.nome || '-',
                                            prop.municipio || '-',
                                            up.nome_cultura || '-',
                                            `${up.area_total_ha || '0'} ha`,
                                            r.especie || '-',
                                            r.quantidade || '0',
                                            r.finalidade || '-',
                                            r.data_atualizacao || '-',
                                        ])
                                    })
                                })
                            }
                        })
                    }
                })

                // Verificar se há dados após o processamento
                if (rows.length === 0) {
                    alert("Não foi possível gerar o PDF. Estrutura dos dados inválida.")
                    return
                }

                autoTable(doc, {
                    head: [["Produtor", "Propriedade", "Município", "Cultura", "Área", "Espécie", "Qtd", "Finalidade", "Atualização"]],
                    body: rows,
                    startY: 60,
                    styles: {
                        fontSize: 8,
                        cellPadding: 3,
                        overflow: 'linebreak'
                    },
                    headStyles: {
                        fillColor: [34, 197, 94],
                        textColor: 255,
                        fontStyle: 'bold'
                    },
                    alternateRowStyles: {
                        fillColor: [240, 253, 244]
                    },
                    margin: { top: 60 },
                })

                doc.save("relatorio_produtores.pdf")
            } catch (err) {
                console.error("Erro ao gerar PDF:", err)
                alert("Erro ao gerar o PDF. Verifique o console para detalhes.")
            }
        },
    }
}
</script>