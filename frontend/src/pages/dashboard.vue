<template>
    <div id="app">
        <TopBar />
        <DashboardProdutores />
    </div>
</template>

<script>
import DashboardProdutores from '../components/dashboardProdutores.vue'
import TopBar from '../components/topBar.vue'

export default {
    name: 'App',
    components: {
        DashboardProdutores,
        TopBar
    }
}
</script>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f7fa;
    color: #333;
}
</style>