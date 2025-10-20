<template>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-sm p-8 bg-white rounded-2xl shadow-lg">
            <h1 class="text-2xl font-semibold text-center mb-6">
                🌽 Gestão Agropecuária
            </h1>

            <form @submit.prevent="login" class="space-y-3">
                <InputText v-model="email" type="email" placeholder="E-mail" autocomplete="email" class="w-full" />

                <div class="relative">
                    <InputText v-model="password" :type="showPassword ? 'text' : 'password'" placeholder="Senha"
                        autocomplete="current-password" class="pr-10 w-full" />
                    <button type="button"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                        @click="togglePassword">
                        <i :class="showPassword ? 'pi pi-eye' : 'pi pi-eye-slash'"></i>
                    </button>
                </div>

                <div class="flex flex-col gap-2 text-center">
                    <Button label="Entrar" :loading="loading" @click="$router.push('/home')" class="w-full" />
                    <p class="font-medium">
                        Não tem uma conta?
                        <button type="button" @click="$router.push('/register')" class="text-primary underline">
                            Cadastre-se
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useToast } from "primevue/usetoast";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import api from "../service/api"; // Use o axios configurado

const router = useRouter();
const toast = useToast();

const email = ref("");
const password = ref("");
const loading = ref(false);
const showPassword = ref(false);

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};

const login = async () => {
    if (!email.value || !password.value) {
        toast.add({
            severity: "error",
            summary: "Erro",
            detail: "Por favor, preencha todos os campos!",
            life: 3000,
        });
        return;
    }

    loading.value = true;

    try {
        const response = await api.post('/login', {
            email: email.value,
            password: password.value
        });

        if (response.data.token) {
            localStorage.setItem('auth_token', response.data.token);
            api.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;
        }

        toast.add({
            severity: "success",
            summary: "Sucesso!",
            detail: "Login realizado com sucesso!",
            life: 3000
        });

        email.value = "";
        password.value = "";

        router.push("/home");

    } catch (error) {
        console.error('Erro no login:', error);

        const errorMessage = error.response?.data?.message ||
            error.response?.data?.errors?.email?.[0] ||
            "Erro ao fazer login.";

        toast.add({
            severity: "error",
            summary: "Erro",
            detail: errorMessage,
            life: 3000
        });
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.p-inputtext {
    @apply w-full bg-gray-100 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary;
}

.p-button {
    @apply w-full py-2 rounded-md font-semibold text-white bg-primary transition-all !important;
}

.p-button:hover {
    @apply bg-primaryHover !important;
}
</style>