<template>
    <div class="min-h-screen p-4 md:p-6">
        <div class="pt-20 mb-8 text-center">
            <h1 class="text-2xl md:text-3xl font-bold">
                Dashboard de Produtores Rurais
            </h1>
            <p>Monitoramento e análise da produção agrícola</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
            <div
                class="cursor-pointer bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-green-100 mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-green-600 mb-1">Total de Produtores</h3>
                        <p class="text-2xl font-bold text-green-800">{{ totalProdutores }}</p>
                    </div>
                </div>
            </div>

            <div
                class="cursor-pointer bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-yellow-100 mr-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-yellow-600 mb-1">Total de Propriedades</h3>
                        <p class="text-2xl font-bold text-yellow-800">{{ totalPropriedades }}</p>
                    </div>
                </div>
            </div>

            <div
                class="cursor-pointer bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-blue-100 mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-blue-600 mb-1">Área Total Cultivada</h3>
                        <p class="text-2xl font-bold text-blue-800">{{ areaTotal }} ha</p>
                    </div>
                </div>
            </div>

            <div
                class="cursor-pointer bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-lg bg-red-100 mr-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-red-600 mb-1">Total de Animais</h3>
                        <p class="text-2xl font-bold text-red-800">{{ totalAnimais }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-lg font-semibold text-green-800 mb-4 text-center">Área por Cultura (ha)</h3>
                <div class="h-64">
                    <Bar v-if="areaCulturaData.labels.length > 0" :data="areaCulturaData"
                        :options="areaCulturaOptions" />
                    <div v-else class="h-full flex items-center justify-center text-gray-500">
                        Nenhum dado disponível
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-lg font-semibold text-green-800 mb-4 text-center">Distribuição de Rebanhos</h3>
                <div class="h-64">
                    <Doughnut v-if="rebanhosData.labels.length > 0" :data="rebanhosData" :options="rebanhosOptions" />
                    <div v-else class="h-full flex items-center justify-center text-gray-500">
                        Nenhum dado disponível
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                <h3 class="text-lg font-semibold text-green-800 mb-4 text-center">Produtores por Município</h3>
                <div class="h-64">
                    <Pie v-if="municipioData.labels.length > 0" :data="municipioData" :options="municipioOptions" />
                    <div v-else class="h-full flex items-center justify-center text-gray-500">
                        Nenhum dado disponível
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Bar, Doughnut, Pie } from 'vue-chartjs'
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    ArcElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import { Produtores } from '../service/produtores';

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    ArcElement,
    CategoryScale,
    LinearScale
)

export default {
    name: 'DashboardProdutores',
    components: {
        Bar,
        Doughnut,
        Pie
    },
    data() {
        return {
            produtores: Produtores
        }
    },
    computed: {
        totalProdutores() {
            return this.produtores.length
        },
        totalPropriedades() {
            return this.produtores.reduce((total, produtor) =>
                total + produtor.propriedades.length, 0
            )
        },
        areaTotal() {
            let total = 0
            this.produtores.forEach(produtor => {
                produtor.propriedades.forEach(propriedade => {
                    propriedade.unidadesProducao.forEach(unidade => {
                        total += unidade.area_total_ha
                    })
                })
            })
            return total
        },
        totalAnimais() {
            let total = 0
            this.produtores.forEach(produtor => {
                produtor.propriedades.forEach(propriedade => {
                    propriedade.rebanhos.forEach(rebanho => {
                        total += rebanho.quantidade
                    })
                })
            })
            return total
        },

        // Dados para Gráfico 1: Área por Cultura
        areaCulturaData() {
            const culturas = {}

            this.produtores.forEach(produtor => {
                produtor.propriedades.forEach(propriedade => {
                    propriedade.unidadesProducao.forEach(unidade => {
                        if (culturas[unidade.nome_cultura]) {
                            culturas[unidade.nome_cultura] += unidade.area_total_ha
                        } else {
                            culturas[unidade.nome_cultura] = unidade.area_total_ha
                        }
                    })
                })
            })

            return {
                labels: Object.keys(culturas),
                datasets: [
                    {
                        label: 'Área (ha)',
                        data: Object.values(culturas),
                        backgroundColor: [
                            '#16a34a', '#22c55e', '#4ade80', '#86efac',
                            '#15803d', '#166534', '#14532d', '#22d3ee',
                            '#0d9488', '#059669'
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }
                ]
            }
        },
        areaCulturaOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f0fdf4'
                        }
                    },
                    x: {
                        grid: {
                            color: '#f0fdf4'
                        }
                    }
                }
            }
        },

        // Dados para Gráfico 2: Distribuição de Rebanhos
        rebanhosData() {
            const especies = {}

            this.produtores.forEach(produtor => {
                produtor.propriedades.forEach(propriedade => {
                    propriedade.rebanhos.forEach(rebanho => {
                        if (especies[rebanho.especie]) {
                            especies[rebanho.especie] += rebanho.quantidade
                        } else {
                            especies[rebanho.especie] = rebanho.quantidade
                        }
                    })
                })
            })

            return {
                labels: Object.keys(especies),
                datasets: [
                    {
                        data: Object.values(especies),
                        backgroundColor: [
                            '#16a34a', '#22c55e', '#4ade80', '#86efac',
                            '#15803d', '#166534', '#14532d', '#22d3ee'
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }
                ]
            }
        },
        rebanhosOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 15,
                            color: '#166534'
                        }
                    }
                }
            }
        },

        municipioData() {
            const municipios = {}

            this.produtores.forEach(produtor => {
                produtor.propriedades.forEach(propriedade => {
                    if (municipios[propriedade.municipio]) {
                        municipios[propriedade.municipio]++
                    } else {
                        municipios[propriedade.municipio] = 1
                    }
                })
            })

            return {
                labels: Object.keys(municipios),
                datasets: [
                    {
                        data: Object.values(municipios),
                        backgroundColor: [
                            '#16a34a', '#22c55e', '#4ade80', '#86efac',
                            '#15803d', '#166534', '#14532d', '#22d3ee'
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }
                ]
            }
        },
        municipioOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            padding: 15,
                            color: '#166534'
                        }
                    }
                }
            }
        }
    },
    mounted() {
        console.log('Dashboard carregado:', {
            produtores: this.produtores,
            areaCulturaData: this.areaCulturaData,
            rebanhosData: this.rebanhosData,
            municipioData: this.municipioData
        })
    }
}
</script>