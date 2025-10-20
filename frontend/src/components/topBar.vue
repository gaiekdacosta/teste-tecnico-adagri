<template>
    <div class="nav-header bg-green-600">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-green-800 rounded-lg flex items-center justify-center mr-3">
                <span class="text-white font-bold text-lg">🌽</span>
            </div>
            <p class="font-bold text-white text-lg md:text-xl">
                GESTÃO AGROPECUÁRIA
            </p>
        </div>
        <nav class="flex font-semibold items-center cursor-pointer gap-6">
            <a class="nav-link text-white hover:text-green-100 transition-colors duration-200"
                @click="$router.push('/home')">
                INÍCIO
            </a>
            <a class="nav-link text-white hover:text-green-100 transition-colors duration-200"
                @click="$router.push('/dashboard')">
                DASHBOARD
            </a>
            <button @click="$router.push('/')" class="p-2 rounded-lg hover:bg-green-700 transition-colors duration-200">
                <i class="pi pi-sign-out text-white text-lg"></i>
            </button>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'TopBar'
}
</script>

<style>
.nav-header {
    @apply fixed top-0 left-0 right-0 z-[1000] h-16 text-white flex items-center justify-between px-6 border-b border-green-700 shadow-lg;
}

.nav-link {
    @apply relative px-3 py-2 rounded-lg transition-all duration-200 hover:bg-green-700;
}
</style>