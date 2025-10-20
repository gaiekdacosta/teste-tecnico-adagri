<template>
    <div class="min-h-screen p-4 md:p-6">
        <TopBar />
        <div class="pt-20">
            <div class="max-w-6xl mx-auto mb-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                    <h2 class="text-xl font-bold text-green-800 mb-4 flex items-center gap-2">
                        <i class="pi pi-filter"></i>
                        Filtros de Busca
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-2">Produtor</label>
                            <input v-model="filtros.produtor" type="text" placeholder="Buscar por nome..."
                                class="w-full border border-green-200 rounded-xl p-3 focus:ring-2 focus:ring-green-400 focus:border-green-400 focus:outline-none transition-all duration-200 bg-green-50" />
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-2">Município</label>
                            <select v-model="filtros.municipio"
                                class="w-full border border-green-200 rounded-xl p-3 focus:ring-2 focus:ring-green-400 focus:border-green-400 focus:outline-none transition-all duration-200 bg-green-50">
                                <option value="">Todos os municípios</option>
                                <option v-for="m in municipiosUnicos" :key="m" :value="m">{{ m }}</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-green-700 mb-2">Espécie</label>
                            <select v-model="filtros.especie"
                                class="w-full border border-green-200 rounded-xl p-3 focus:ring-2 focus:ring-green-400 focus:border-green-400 focus:outline-none transition-all duration-200 bg-green-50">
                                <option value="">Todas as espécies</option>
                                <option v-for="e in especiesUnicas" :key="e" :value="e">{{ e }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap justify-end gap-3 mb-6">
                    <ExportExcel :produtores="produtoresFiltrados" />
                    <ExportPDF :produtores="produtoresFiltrados" />
                </div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="bg-green-100 border border-green-200 rounded-2xl p-4 mb-6">
                    <div class="flex flex-wrap items-center justify-between">
                        <p class="text-green-800 font-semibold">
                            📊 {{ produtoresFiltrados.length }} produtor(es) encontrado(s)
                        </p>
                        <div class="flex gap-4 text-sm text-green-700">
                            <span>{{ totalPropriedades }} propriedades</span>
                            <span>{{ totalHectares }} ha cultivados</span>
                            <span>{{ totalAnimais }} animais</span>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden">
                    <div class="space-y-4">
                        <div v-for="(produtor, pIndex) in produtoresFiltrados" :key="produtor.id || pIndex"
                            class="border border-green-200 rounded-xl overflow-hidden transition-all duration-200 hover:shadow-md">
                            <div class="bg-white p-5 cursor-pointer transition-colors duration-200 hover:bg-green-50"
                                @click="toggleProdutor(pIndex)">
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="pi pi-user text-green-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-green-900">{{ produtor.nome || 'Nome não informado' }}</div>
                                            <div class="text-xs text-green-600">
                                                {{ (produtor.propriedades && produtor.propriedades.length) || 0 }}
                                                propriedade(s)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-green-600 transition-transform duration-300"
                                        :class="{ 'rotate-180': activeProdutor.includes(pIndex) }">
                                        <i class="pi pi-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div v-if="activeProdutor.includes(pIndex)" class="bg-white border-t border-green-100 p-6">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                                    <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                                        <h4 class="font-semibold text-green-800 mb-3 flex items-center gap-2">
                                            <i class="pi pi-id-card"></i>
                                            Informações Pessoais
                                        </h4>
                                        <div class="space-y-2 text-sm">
                                            <p class="flex justify-between">
                                                <span class="text-green-700 font-medium">CPF/CNPJ:</span>
                                                <span class="text-green-900">{{ produtor.cpf_cnpj || 'Não informado'
                                                }}</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="text-green-700 font-medium">Telefone:</span>
                                                <span class="text-green-900">{{ produtor.telefone || 'Não informado'
                                                }}</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="text-green-700 font-medium">Email:</span>
                                                <span class="text-green-900">{{ produtor.email || 'Não informado'
                                                }}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                                        <h4 class="font-semibold text-green-800 mb-3 flex items-center gap-2">
                                            <i class="pi pi-map-marker"></i>
                                            Localização
                                        </h4>
                                        <div class="space-y-2 text-sm">
                                            <p class="flex justify-between">
                                                <span class="text-green-700 font-medium">Endereço:</span>
                                                <span class="text-green-900">{{ produtor.endereco || 'Não informado'}}</span>
                                            </p>
                                            <p class="flex justify-between">
                                                <span class="text-green-700 font-medium">Data de cadastro:</span>
                                                <span class="text-green-900">{{ produtor.data_cadastro || 'Não informada' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div v-if="produtor.propriedades && produtor.propriedades.length > 0">
                                    <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center gap-2">
                                        <i class="pi pi-home"></i>
                                        Propriedades ({{ produtor.propriedades.length }})
                                    </h3>

                                    <div class="space-y-4">
                                        <div v-for="(prop, propIndex) in produtor.propriedades"
                                            :key="prop.id || propIndex"
                                            class="border border-gray-200 rounded-xl overflow-hidden">
                                            <div class="bg-white p-4 cursor-pointer transition-colors duration-200 hover:bg-gray-50"
                                                @click.stop="togglePropriedade(pIndex, propIndex)">
                                                <div class="flex items-center justify-between w-full">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                                            <i class="pi pi-home text-blue-600 text-xs"></i>
                                                        </div>
                                                        <div>
                                                            <div class="font-semibold text-gray-900">{{ prop.nome || 'Propriedade sem nome' }}
                                                            </div>
                                                            <div class="text-xs text-gray-600">
                                                                {{ prop.municipio || 'Município não informado' }}/{{prop.uf || 'UF' }} •
                                                                {{ prop.area_total || 0 }} ha
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-gray-400 transition-transform duration-300"
                                                        :class="{ 'rotate-180': isPropriedadeActive(pIndex, propIndex) }">
                                                        <i class="pi pi-chevron-down"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div v-if="isPropriedadeActive(pIndex, propIndex)"
                                                class="bg-white border-t border-gray-100 p-6">
                                                <!-- Informações da Propriedade -->
                                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 mb-4">
                                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                                        <div>
                                                            <p class="font-semibold text-green-700">Município/UF</p>
                                                            <p class="text-green-900">{{ prop.municipio || 'Nãoinformado' }} - {{ prop.uf || 'N/I' }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-green-700">Inscrição estadual
                                                            </p>
                                                            <p class="text-green-900">{{ prop.inscricao_estadual || 'Não informada' }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold text-green-700">Área total</p>
                                                            <p class="text-green-900">{{ prop.area_total || 0 }} ha</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Culturas e Rebanhos -->
                                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                                    <!-- Culturas -->
                                                    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200">
                                                        <h4
                                                            class="font-semibold text-yellow-800 mb-3 flex items-center gap-2">
                                                            <i class="pi pi-leaf"></i>
                                                            Culturas ({{ (prop.unidadesProducao && prop.unidadesProducao.length) || 0 }})
                                                        </h4>
                                                        <div v-if="prop.unidadesProducao && prop.unidadesProducao.length > 0"
                                                            class="space-y-3">
                                                            <div v-for="(up, upIndex) in prop.unidadesProducao"
                                                                :key="upIndex"
                                                                class="bg-white rounded-lg p-3 border border-yellow-100">
                                                                <div class="flex justify-between items-start">
                                                                    <div>
                                                                        <p class="font-semibold text-yellow-700">
                                                                            {{ up.nome_cultura || 'Cultura não informada'}}</p>
                                                                        <p class="text-sm text-yellow-600">
                                                                            {{ up.coordenadas_geograficas || 'Coordenadas não informadas' }}</p>
                                                                    </div>
                                                                    <span
                                                                        class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm font-semibold">
                                                                        {{ up.area_total_ha || 0 }} ha
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-else class="text-center py-4 text-yellow-600">
                                                            <p>Nenhuma cultura cadastrada</p>
                                                        </div>
                                                    </div>

                                                    <!-- Rebanhos -->
                                                    <div class="bg-red-50 rounded-xl p-4 border border-red-200">
                                                        <h4
                                                            class="font-semibold text-red-800 mb-3 flex items-center gap-2">
                                                            <i class="pi pi-heart"></i>
                                                            Rebanhos ({{ (prop.rebanhos && prop.rebanhos.length) || 0 }})
                                                        </h4>
                                                        <div v-if="prop.rebanhos && prop.rebanhos.length > 0"
                                                            class="space-y-3">
                                                            <div v-for="(r, rIndex) in prop.rebanhos" :key="rIndex"
                                                                class="bg-white rounded-lg p-3 border border-red-100">
                                                                <div class="flex justify-between items-start">
                                                                    <div>
                                                                        <p class="font-semibold text-red-700">{{r.especie || 'Espécie não informada' }}</p>
                                                                        <p class="text-sm text-red-600">{{ r.finalidade || 'Finalidade não informada' }}</p>
                                                                    </div>
                                                                    <span
                                                                        class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-semibold">
                                                                        {{ r.quantidade || 0 }} cabeças
                                                                    </span>
                                                                </div>
                                                                <p class="text-xs text-red-500 mt-2">
                                                                    Atualizado em: {{ r.data_atualizacao || 'Data não informada' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div v-else class="text-center py-4 text-red-600">
                                                            <p>Nenhum rebanho cadastrado</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="text-center py-6 text-gray-500">
                                    <p>Nenhuma propriedade cadastrada para este produtor</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="!produtoresFiltrados.length" class="text-center py-12 text-gray-500">
                        <div class="text-6xl mb-4">🌱</div>
                        <p class="text-lg font-semibold mb-2">Nenhum produtor encontrado</p>
                        <p class="text-gray-600">Tente ajustar os filtros de busca</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TopBar from '../components/topbar.vue';
import ExportExcel from "../components/exportExcel.vue";
import ExportPDF from "../components/exportPDF.vue";
import api from "../service/api";

export default {
    name: "Home",
    components: {
        TopBar,
        ExportExcel,
        ExportPDF
    },
    data() {
        return {
            produtores: [],
            filtros: { produtor: "", municipio: "", especie: "" },
            activeProdutor: [],
            activePropriedades: {},
            loading: false,
            error: null
        }
    },
    computed: {
        municipiosUnicos() {
            const set = new Set()
            this.produtores.forEach(p => {
                if (p.propriedades) {
                    p.propriedades.forEach(prop => {
                        if (prop.municipio) set.add(prop.municipio)
                    })
                }
            })
            return [...set].sort()
        },
        especiesUnicas() {
            const set = new Set()
            this.produtores.forEach(p => {
                if (p.propriedades) {
                    p.propriedades.forEach(prop => {
                        if (prop.rebanhos) {
                            prop.rebanhos.forEach(r => {
                                if (r.especie) set.add(r.especie)
                            })
                        }
                    })
                }
            })
            return [...set].sort()
        },
        produtoresFiltrados() {
            return this.produtores.filter(p => {
                const matchProdutor = !this.filtros.produtor ||
                    (p.nome && p.nome.toLowerCase().includes(this.filtros.produtor.toLowerCase()))

                const matchMunicipio = !this.filtros.municipio ||
                    (p.propriedades && p.propriedades.some(
                        prop => prop.municipio === this.filtros.municipio
                    ))

                const matchEspecie = !this.filtros.especie ||
                    (p.propriedades && p.propriedades.some(prop =>
                        prop.rebanhos && prop.rebanhos.some(r => r.especie === this.filtros.especie)
                    ))

                return matchProdutor && matchMunicipio && matchEspecie
            })
        },
        totalPropriedades() {
            return this.produtoresFiltrados.reduce((total, produtor) =>
                total + (produtor.propriedades ? produtor.propriedades.length : 0), 0
            )
        },
        totalHectares() {
            let total = 0
            this.produtoresFiltrados.forEach(produtor => {
                if (produtor.propriedades) {
                    produtor.propriedades.forEach(propriedade => {
                        if (propriedade.unidades_producao) { // Note a mudança aqui
                            propriedade.unidades_producao.forEach(unidade => {
                                total += unidade.area_total_ha || 0
                            })
                        }
                    })
                }
            })
            return total
        },
        totalAnimais() {
            let total = 0
            this.produtoresFiltrados.forEach(produtor => {
                if (produtor.propriedades) {
                    produtor.propriedades.forEach(propriedade => {
                        if (propriedade.rebanhos) {
                            propriedade.rebanhos.forEach(rebanho => {
                                total += rebanho.quantidade || 0
                            })
                        }
                    })
                }
            })
            return total
        }
    },
    methods: {
        async fetchProdutores() {
            this.loading = true;
            this.error = null;
            try {
                const response = await api.get('/produtores');
                this.produtores = Array.isArray(response) ? response : [];
                console.log('Dados carregados da API:', this.produtores);
            } catch (error) {
                console.error('Erro ao carregar produtores:', error);
                this.error = 'Erro ao carregar dados. Tente novamente.';
                this.produtores = [];
            } finally {
                this.loading = false;
            }
        },

        toggleProdutor(index) {
            const currentIndex = this.activeProdutor.indexOf(index)
            if (currentIndex > -1) {
                this.activeProdutor.splice(currentIndex, 1)
                delete this.activePropriedades[index]
            } else {
                this.activeProdutor.push(index)
            }
        },

        togglePropriedade(produtorIndex, propriedadeIndex) {
            if (!this.activePropriedades[produtorIndex]) {
                this.activePropriedades[produtorIndex] = []
            }

            const currentIndex = this.activePropriedades[produtorIndex].indexOf(propriedadeIndex)
            if (currentIndex > -1) {
                this.activePropriedades[produtorIndex].splice(currentIndex, 1)
            } else {
                this.activePropriedades[produtorIndex].push(propriedadeIndex)
            }
        },

        isPropriedadeActive(produtorIndex, propriedadeIndex) {
            return this.activePropriedades[produtorIndex]?.includes(propriedadeIndex) || false
        },
    },
    async mounted() {
        await this.fetchProdutores();
    }
}
</script>

<style scoped>
.nav-header {
    @apply fixed top-0 left-0 right-0 z-[1000] h-16 text-white flex items-center justify-between px-6 border-b border-green-700 shadow-lg;
}

.nav-link {
    @apply relative px-3 py-2 rounded-lg transition-all duration-200 hover:bg-green-700;
}

.rotate-180 {
    transform: rotate(180deg);
}
</style>