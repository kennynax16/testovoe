<template>
<div>
   qqqqqq
</div>
</template>

<script>

export default {
    name: "ShowComponent"
    ,
    data() {
        return {
            product: null, // Здесь будут данные о товаре
        };
    },
    mounted() {
        console.log(this.$route.params);
    },
    methods:{
        getProduct() {
            axios.get(`/api/card/` + this.$route.params.id) // Запрос к API для получения данных
                .then(res => {
                    this.product = res.data; // Сохраняем данные о товаре
                });
    }
}
}
</script>

<style scoped>

</style>
