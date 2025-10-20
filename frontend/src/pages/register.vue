<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <Toast />

        <div class="w-full max-w-sm p-8 bg-white rounded-2xl shadow-lg">
            <h1 class="text-2xl font-semibold text-center mb-6">
                Criar Conta
            </h1>

            <form @submit.prevent="register" class="space-y-3">
                <InputText v-model="name" type="text" placeholder="Usuário" autocomplete="off" class="w-full" />

                <InputText v-model="email" type="email" placeholder="E-mail" autocomplete="off" class="w-full" />

                <div class="relative">
                    <InputText v-model="password" :type="showPassword ? 'text' : 'password'" placeholder="Senha"
                        autocomplete="new-password" class="w-full pr-10" />
                    <button type="button"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                        @click="togglePassword">
                        <i :class="showPassword ? 'pi pi-eye' : 'pi pi-eye-slash'"></i>
                    </button>
                </div>

                <div class="relative">
                    <InputText v-model="confirmPassword" :type="showPassword ? 'text' : 'password'"
                        placeholder="Confirmar senha" autocomplete="new-password" class="w-full pr-10" />
                    <button type="button"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                        @click="togglePassword">
                        <i :class="showPassword ? 'pi pi-eye' : 'pi pi-eye-slash'"></i>
                    </button>
                </div>

                <div class="flex flex-col gap-2 text-center">
                    <Button label="Cadastrar" :loading="loading" type="submit" class="w-full" />
                    <p class="font-medium">
                        Já tem uma conta?
                        <button type="button" @click="$router.push('/')" class="text-primary underline">
                            Entrar
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
import Toast from "primevue/toast";

const router = useRouter();
const toast = useToast();

const name = ref("");
const email = ref("");
const password = ref("");
const confirmPassword = ref("");
const loading = ref(false);
const showPassword = ref(false);

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};
const register = async () => {
    if (!name.value || !email.value || !password.value || !confirmPassword.value) {
        toast.add({
            severity: "error",
            summary: "Erro",
            detail: "Por favor, preencha todos os campos!",
            life: 3000,
        });
        return;
    }

    if (password.value !== confirmPassword.value) {
        toast.add({
            severity: "error",
            summary: "Erro",
            detail: "As senhas não coincidem!",
            life: 3000,
        });
        return;
    }

    if (password.value.length < 6) {
        toast.add({
            severity: "warn",
            summary: "Aviso",
            detail: "A senha deve ter pelo menos 6 caracteres!",
            life: 3000,
        });
        return;
    }

    loading.value = true;

    try {
        const csrfResponse = await fetch("http://localhost:8080/sanctum/csrf-cookie", {
            method: 'GET',
            credentials: 'include',
        });

        if (!csrfResponse.ok) {
            throw new Error('Falha ao obter token CSRF');
        }

        const getCsrfToken = () => {
            const cookieValue = document.cookie
                .split('; ')
                .find(row => row.startsWith('XSRF-TOKEN='))
                ?.split('=')[1];
            return cookieValue ? decodeURIComponent(cookieValue) : null;
        };

        const csrfToken = getCsrfToken();

        if (!csrfToken) {
            throw new Error('Token CSRF não encontrado');
        }

        // Agora faça o registro com o token CSRF
        const response = await fetch("http://localhost:8080/register", {
            method: "POST",
            credentials: "include",
            headers: { 
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-XSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({ 
                name: name.value, 
                email: email.value, 
                password: password.value,
                password_confirmation: confirmPassword.value
            }),
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || "Erro ao registrar");
        }

        toast.add({ 
            severity: "success", 
            summary: "Sucesso!", 
            detail: data.message || "Conta criada!", 
            life: 3000 
        });

        // Limpar os campos
        name.value = "";
        email.value = "";
        password.value = "";
        confirmPassword.value = "";

        router.push("/");

    } catch (error) {
        console.error('Erro no registro:', error);
        toast.add({ 
            severity: "error", 
            summary: "Erro", 
            detail: error.message || "Erro ao criar conta.", 
            life: 3000 
        });
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.p-inputtext {
    @apply w-full bg-gray-100 border-0 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary;
}

.p-button {
    @apply w-full py-2 rounded-md font-semibold text-white bg-primary transition-all;
}

.p-button:hover {
    @apply bg-primaryHover text-white !important;
}
</style>